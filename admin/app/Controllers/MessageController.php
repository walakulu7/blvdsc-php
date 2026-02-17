<?php

require_once __DIR__ . '/../Models/MessageModel.php';
require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../../core/Session.php';

class MessageController extends Controller
{
    private $messageModel;
    
    public function __construct()
    {
        $this->messageModel = new MessageModel();
    }
    
    /**
     * Display messages list with filters and stats
     */
    public function index()
    {
        // Get filter parameters
        $filters = [
            'status' => $_GET['status'] ?? '',
            'date_from' => $_GET['date_from'] ?? '',
            'date_to' => $_GET['date_to'] ?? '',
            'search' => $_GET['search'] ?? ''
        ];
        
        // Get messages with filters
        $messages = $this->messageModel->getAll($filters);
        
        // Get statistics
        $stats = $this->messageModel->getStats();
        
        $this->view('messages/index', [
            'messages' => $messages,
            'stats' => $stats,
            'filters' => $filters,
            'current_page' => 'messages'
        ]);
    }
    
    /**
     * Show single message detail
     */
    public function show($id)
    {
        $message = $this->messageModel->getById($id);
        
        if (!$message) {
            Session::flash('error', 'Message not found');
            $this->redirect('/messages');
            return;
        }
        
        // Mark as read if not already read
        if ($message['is_read'] == 0) {
            $this->messageModel->markAsRead($id);
            $message['is_read'] = 1; // Update local copy
        }
        
        $this->view('messages/show', [
            'message' => $message,
            'current_page' => 'messages'
        ]);
    }
    
    /**
     * Handle reply to message
     */
    public function reply($id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/messages');
            return;
        }
        
        // CSRF validation
        if (!isset($_POST['_csrf_token']) || $_POST['_csrf_token'] !== Session::get('csrf_token')) {
            Session::flash('error', 'Invalid request');
            $this->redirect('/messages/' . $id);
            return;
        }
        
        $message = $this->messageModel->getById($id);
        if (!$message) {
            Session::flash('error', 'Message not found');
            $this->redirect('/messages');
            return;
        }
        
        // Validate reply content
        $replyContent = trim($_POST['reply_message'] ?? '');
        if (empty($replyContent)) {
            Session::flash('error', 'Reply message cannot be empty');
            $this->redirect('/messages/' . $id);
            return;
        }
        
        // Send email reply
        $emailSent = $this->sendReplyEmail($message, $replyContent);
        
        if ($emailSent) {
            // Mark as replied
            $this->messageModel->markAsReplied($id);
            
            Session::flash('success', 'Reply sent successfully');
        } else {
            Session::flash('error', 'Failed to send reply email');
        }
        
        $this->redirect('/messages/' . $id);
    }
    
    /**
     * Delete message
     */
    public function destroy($id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/messages');
            return;
        }
        
        // CSRF validation
        if (!isset($_POST['_csrf_token']) || $_POST['_csrf_token'] !== Session::get('csrf_token')) {
            Session::flash('error', 'Invalid request');
            $this->redirect('/messages');
            return;
        }
        
        $message = $this->messageModel->getById($id);
        if (!$message) {
            Session::flash('error', 'Message not found');
            $this->redirect('/messages');
            return;
        }
        
        if ($this->messageModel->delete($id)) {
            Session::flash('success', 'Message deleted successfully');
        } else {
            Session::flash('error', 'Failed to delete message');
        }
        
        $this->redirect('/messages');
    }
    
    /**
     * Send reply email to message sender
     */
    private function sendReplyEmail($message, $replyContent)
    {
        $to = $message['email'];
        $subject = 'Re: ' . ($message['subject'] ?? 'Your message to BLVD Specialty Coffee');
        
        // Create HTML email
        $htmlMessage = '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background-color: #6B5744; color: white; padding: 20px; text-align: center; }
                .content { background-color: #f9f9f9; padding: 20px; margin: 20px 0; border-radius: 5px; }
                .original-message { background-color: #e9e9e9; padding: 15px; margin-top: 20px; border-left: 4px solid #6B5744; }
                .footer { text-align: center; color: #666; font-size: 12px; margin-top: 20px; }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h2>BLVD Specialty Coffee</h2>
                </div>
                
                <div class="content">
                    <p>Hello ' . htmlspecialchars($message['name']) . ',</p>
                    
                    <p>' . nl2br(htmlspecialchars($replyContent)) . '</p>
                    
                    <div class="original-message">
                        <strong>Your original message:</strong><br>
                        <p>' . nl2br(htmlspecialchars($message['message'])) . '</p>
                        <small>Sent on: ' . date('F j, Y g:i A', strtotime($message['created_at'])) . '</small>
                    </div>
                </div>
                
                <div class="footer">
                    <p>
                        <strong>BLVD Specialty Coffee</strong><br>
                        96 Waratah Boulevard, Canning Vale WA 6155<br>
                        Phone: +61 401 201 536<br>
                        Email: lankawebnets@gmail.com
                    </p>
                </div>
            </div>
        </body>
        </html>
        ';
        
        // Email headers
        $headers = [
            'MIME-Version: 1.0',
            'Content-Type: text/html; charset=UTF-8',
            'From: ' . EMAIL_FROM_NAME . ' <' . EMAIL_FROM_ADDRESS . '>',
            'Reply-To: ' . CONTACT_EMAIL,
            'X-Mailer: PHP/' . phpversion()
        ];
        
        // Send email
        if ($_SERVER['HTTP_HOST'] === 'localhost' || $_SERVER['HTTP_HOST'] === '127.0.0.1') {
            // Simulate email sending on localhost
            $logFile = APP_ROOT . '/public/uploads/email_log.txt';
            $logEntry = "--------------------------------------------------\n";
            $logEntry .= "Date: " . date('Y-m-d H:i:s') . "\n";
            $logEntry .= "To: $to\n";
            $logEntry .= "Subject: $subject\n";
            $logEntry .= "Headers: " . implode("\n", $headers) . "\n\n";
            $logEntry .= "Body:\n$htmlMessage\n";
            $logEntry .= "--------------------------------------------------\n\n";
            
            file_put_contents($logFile, $logEntry, FILE_APPEND);
            return true;
        }

        return mail($to, $subject, $htmlMessage, implode("\r\n", $headers));
    }
}
