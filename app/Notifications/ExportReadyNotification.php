<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ExportReadyNotification extends Notification
{
    use Queueable;

    protected $downloadLink;

    public function __construct($downloadLink)
    {
        $this->downloadLink = $downloadLink;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject("File is ready to download")
            ->line('Your export file is ready for download.')
            ->action('Download Export', $this->downloadLink)
            ->line('This download link will expire in 7 days.');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
