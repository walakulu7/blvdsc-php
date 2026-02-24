<?php

require_once __DIR__ . '/../Models/MessageModel.php';
require_once __DIR__ . '/../Models/MessageReply.php';
require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../../core/Session.php';

class MessageController extends Controller
{
    private $messageModel;
    private $messageReplyModel;
    
    public function __construct()
    {
        $this->messageModel = new MessageModel();
        $this->messageReplyModel = new MessageReply();
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
        
        
        // Get replies
        $replies = $this->messageReplyModel->getByMessageId($id);
        
        $this->view('messages/show', [
            'message' => $message,
            'replies' => $replies,
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
            
            // Save reply to database
            $this->messageReplyModel->createReply([
                'message_id' => $id,
                'user_id' => Auth::id(),
                'reply_content' => $replyContent
            ]);
            
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
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background-color: #6B5744; color: white; padding: 20px; text-align: center; border-radius: 5px 5px 0 0; }
                .content { background-color: #f9f9f9; padding: 20px; margin: 0; border: 1px solid #eee; border-top: none; }
                .original-message { background-color: #ebebeb; padding: 15px; margin-top: 20px; border-left: 4px solid #6B5744; color: #666; font-style: italic; }
                .footer { text-align: center; color: #888; font-size: 12px; margin-top: 20px; padding: 10px; }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h2 style="margin: 0;">BLVD Specialty Coffee</h2>
                </div>
                
                <div class="content">
                    <p>Hello ' . htmlspecialchars($message['name']) . ',</p>
                    
                    <p>' . nl2br(htmlspecialchars($replyContent)) . '</p>
                    
                    <div class="original-message">
                        <strong>Your original message:</strong><br>
                        <p style="margin-top: 5px;">' . nl2br(htmlspecialchars($message['message'])) . '</p>
                        <small>Sent on: ' . date('F j, Y g:i A', strtotime($message['created_at'])) . '</small>
                    </div>
                </div>
                
                <div class="footer">
                    <p>
                        <strong>BLVD Specialty Coffee</strong><br>
                        96 Waratah Boulevard, Canning Vale WA 6155<br>
                        Phone: +61 401 201 536<br>
                        Email: ' . CONTACT_EMAIL . '<br><br>
                        <span style="font-size: 10px; opacity: 0.8;">Developed by <a href="https://myclassyweb.store/" style="color: #888; text-decoration: underline;">MyClassyWeb.Store</a></span>
                    </p>
                </div>
            </div>
        </body>
        </html>
        ';
        
        // Standardize line endings for headers
        $eol = "\r\n";
        
        // Email headers
        $headers = "MIME-Version: 1.0" . $eol;
        $headers .= "Content-Type: text/html; charset=UTF-8" . $eol;
        $headers .= "From: " . EMAIL_FROM_NAME . " <" . EMAIL_FROM_ADDRESS . ">" . $eol;
        $headers .= "Reply-To: " . CONTACT_EMAIL . $eol;
        $headers .= "Return-Path: " . EMAIL_FROM_ADDRESS . $eol;
        $headers .= "X-Mailer: PHP/" . phpversion();
        
        // Environment detection (more robust than just HTTP_HOST)
        $isLocalhost = false;
        if (isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] === 'localhost' || $_SERVER['HTTP_HOST'] === '127.0.0.1')) {
            $isLocalhost = true;
        } elseif (php_sapi_name() === 'cli' || empty($_SERVER['HTTP_HOST'])) {
            $isLocalhost = true; // Assume local/dev if no host info
        }

        if ($isLocalhost) {
            // Simulate email sending on localhost
            $logDir = APP_ROOT . '/public/uploads';
            if (!is_dir($logDir)) {
                mkdir($logDir, 0777, true);
            }
            
            $logFile = $logDir . '/email_log.txt';
            $logEntry = "--------------------------------------------------" . PHP_EOL;
            $logEntry .= "Date: " . date('Y-m-d H:i:s') . PHP_EOL;
            $logEntry .= "To: $to" . PHP_EOL;
            $logEntry .= "Subject: $subject" . PHP_EOL;
            $logEntry .= "Headers: " . str_replace($eol, " | ", $headers) . PHP_EOL . PHP_EOL;
            $logEntry .= "Body:" . PHP_EOL . $htmlMessage . PHP_EOL;
            $logEntry .= "--------------------------------------------------" . PHP_EOL . PHP_EOL;
            
            error_log("Email simulation logged to $logFile");
            return file_put_contents($logFile, $logEntry, FILE_APPEND) !== false;
        }

        // Send actual email on production
        $sent = mail($to, $subject, $htmlMessage, $headers);
        
        if (!$sent) {
            error_log("Failed to send reply email to $to. Mail function returned false.");
        }
        
        return $sent;
    }
}
