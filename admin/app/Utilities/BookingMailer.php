<?php

require_once __DIR__ . '/../../core/Model.php';
require_once __DIR__ . '/../Models/SiteSetting.php';

/**
 * BookingMailer
 * Handles sending automated email notifications for booking status changes.
 * Templates are fetched from the database and support placeholders.
 */
class BookingMailer
{
    /**
     * Send a booking status notification email to the customer.
     *
     * @param array  $booking   The booking/reservation row from the database.
     * @param string $newStatus The new status: 'confirmed', 'completed', or 'cancelled'.
     * @param string $type      'reservation' or 'hightea' - used for subject line.
     * @return bool
     */
    public static function sendBookingStatusEmail(array $booking, string $newStatus, string $type = 'reservation'): bool
    {
        // Only send for these status changes
        $notifiableStatuses = ['confirmed', 'completed', 'cancelled', 'received', 'hightea_received'];
        if (!in_array($newStatus, $notifiableStatuses)) {
            return false;
        }

        $email = $booking['email'] ?? '';
        if (empty($email)) {
            return false;
        }

        $settingModel = new SiteSetting();
        $templateKey  = 'booking_' . $newStatus . '_template';
        $templateBody = $settingModel->get($templateKey);

        // Fallback template
        if (empty($templateBody)) {
            $templateBody = self::getDefaultTemplate($newStatus);
        }

        // Replace placeholders
        $body = self::replacePlaceholders($templateBody, $booking, $settingModel);

        // Build subject
        $bookingTypeLabel = ($type === 'hightea' || $newStatus === 'hightea_received') ? 'High Tea Booking' : 'Reservation';
        $subjects = [
            'confirmed'         => "Your {$bookingTypeLabel} is Confirmed – BLVD Specialty Coffee",
            'completed'         => "Thank You for Visiting – BLVD Specialty Coffee",
            'cancelled'         => "Your {$bookingTypeLabel} Has Been Cancelled – BLVD Specialty Coffee",
            'received'          => "We've Received Your Reservation Request – BLVD Specialty Coffee",
            'hightea_received'  => "We've Received Your High Tea Request – BLVD Specialty Coffee",
        ];
        $subject = $subjects[$newStatus];

        return self::sendMail($email, $subject, $body, $settingModel);
    }

    /**
     * Replace template placeholders with actual booking data.
     */
    private static function replacePlaceholders(string $template, array $booking, SiteSetting $settingModel): string
    {
        $generalSettings = $settingModel->getAll();

        $formattedDate = !empty($booking['date']) ? date('F j, Y', strtotime($booking['date'])) : '';
        $formattedTime = !empty($booking['time']) ? date('g:i A', strtotime($booking['time'])) : '';

        $placeholders = [
            '{customer_name}' => $booking['customer_name'] ?? '',
            '{date}'          => $formattedDate,
            '{time}'          => $formattedTime,
            '{party_size}'    => $booking['party_size'] ?? '',
            '{booking_id}'    => $booking['id'] ?? '',
            '{email}'         => $booking['email'] ?? '',
            '{phone}'         => $booking['phone'] ?? '',
            '{contact_email}' => $generalSettings['contact_email'] ?? '',
            '{contact_phone}' => $generalSettings['contact_phone'] ?? '',
            '{site_name}'     => $generalSettings['site_name'] ?? 'BLVD Specialty Coffee',
        ];

        return str_replace(array_keys($placeholders), array_values($placeholders), $template);
    }

    /**
     * Send the email (uses mail() on production, logs to file on localhost).
     */
    private static function sendMail(string $to, string $subject, string $body, SiteSetting $settingModel): bool
    {
        $fromEmail = $settingModel->get('contact_email') ?: 'noreply@walakulu.lk';
        $fromName  = $settingModel->get('site_name') ?: 'BLVD Specialty Coffee';

        $isLocal = (strpos($_SERVER['HTTP_HOST'] ?? '', 'localhost') !== false
                 || strpos($_SERVER['HTTP_HOST'] ?? '', '127.0.0.1') !== false);

        if ($isLocal) {
            // Log to file instead of sending
            $logDir  = __DIR__ . '/../../public/uploads/';
            $logFile = $logDir . 'email_log.txt';
            if (!is_dir($logDir)) {
                mkdir($logDir, 0755, true);
            }
            $log  = "=== Booking Status Email ===\n";
            $log .= "Time: " . date('Y-m-d H:i:s') . "\n";
            $log .= "To: {$to}\n";
            $log .= "Subject: {$subject}\n";
            $log .= "Body:\n{$body}\n";
            $log .= str_repeat('-', 60) . "\n";
            file_put_contents($logFile, $log, FILE_APPEND | LOCK_EX);
            return true;
        }

        // Production: send real email
        $headers  = "From: {$fromName} <{$fromEmail}>\r\n";
        $headers .= "Reply-To: {$fromEmail}\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        $htmlBody = nl2br(htmlspecialchars($body));
        $fullHtml = "<!DOCTYPE html>
<html>
<head><meta charset='UTF-8'><title>{$subject}</title>
<style>
  body { font-family: Arial, sans-serif; color: #333; background: #f5f5f5; margin:0; padding:0; }
  .container { max-width: 600px; margin: 30px auto; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
  .header { background: #1a1a1a; color: #d4a843; padding: 24px 32px; text-align: center; font-size: 22px; font-weight: bold; letter-spacing: 1px; }
  .body { padding: 32px; line-height: 1.8; }
  .footer { background: #f0f0f0; text-align: center; padding: 16px; font-size: 12px; color: #888; }
</style></head>
<body>
  <div class='container'>
    <div class='header'>BLVD Specialty Coffee</div>
    <div class='body'>{$htmlBody}</div>
    <div class='footer'>
      &copy; " . date('Y') . " BLVD Specialty Coffee. All rights reserved.<br>
      <span style='font-size: 10px; opacity: 0.8;'>Developed by <a href='https://myclassyweb.store/' style='color: #888; text-decoration: underline;'>MyClassyWeb.Store</a></span>
    </div>
  </div>
</body></html>";

        return mail($to, $subject, $fullHtml, $headers);
    }

    /**
     * Fallback templates in case DB doesn't have them yet.
     */
    private static function getDefaultTemplate(string $status): string
    {
        $templates = [
            'confirmed'  => "Dear {customer_name},\n\nYour booking at BLVD Specialty Coffee has been CONFIRMED.\n\nDate: {date}\nTime: {time}\nParty Size: {party_size}\nBooking ID: #{booking_id}\n\nWe look forward to seeing you!\n\nBest regards,\nBLVD Specialty Coffee",
            'completed'  => "Dear {customer_name},\n\nThank you for visiting BLVD Specialty Coffee! We hope you had a wonderful experience.\n\nBest regards,\nBLVD Specialty Coffee",
            'cancelled'  => "Dear {customer_name},\n\nYour booking on {date} has been CANCELLED. For questions, contact us at {contact_email}.\n\nBest regards,\nBLVD Specialty Coffee",
            'received'         => "Dear {customer_name},\n\nThank you for your reservation request at BLVD Specialty Coffee!\n\nDetails:\n- Date: {date}\n- Time: {time}\n- Guests: {party_size}\n\nYour booking is currently PENDING. We will contact you shortly to confirm.\n\nBest regards,\nBLVD Specialty Coffee",
            'hightea_received' => "Dear {customer_name},\n\nThank you for your High Tea booking request!\n\nDetails:\n- Date: {date}\n- Time: {time}\n- Guests: {party_size}\n\nWe look forward to serving you an unforgettable High Tea experience.\n\nBest regards,\nBLVD Specialty Coffee",
        ];
        return $templates[$status] ?? '';
    }
}
