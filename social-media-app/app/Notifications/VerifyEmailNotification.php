<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as BaseVerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class VerifyEmailNotification extends BaseVerifyEmail
{
    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject('Verify Your Email Address')
            ->greeting('Hello!')
            ->line('Thank you for registering. Please verify your email to access all features.')
            ->action('Verify Email', $url)
            ->line('If you did not create an account, no further action is required.');
            
    }
}
