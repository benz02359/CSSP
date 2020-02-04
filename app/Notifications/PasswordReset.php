<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;


class PasswordReset extends Notification
{
    use Queueable;
/**
 * The password reset token.
 *
 * @var string
 */
public $token;
public static $toMailCallback;
/**
 * Create a new notification instance.
 *
 * @return void
 */
public function __construct($token)
{
    $this->token = $token;
}

/**
 * Get the notification's delivery channels.
 *
 * @param  mixed  $notifiable
 * @return array
 */
public function via($notifiable)
{
    return ['mail'];
}

/**
 * Build the mail representation of the notification.
 *
 * @param  mixed  $notifiable
 * @return \Illuminate\Notifications\Messages\MailMessage
 */
public function toMail($notifiable)
{
    if (static::$toMailCallback) {
        return call_user_func(static::$toMailCallback, $notifiable, $this->token);
    }
    return (new MailMessage)
            ->from('css@css.com')
            ->subject('คำขอร้องเพื่อเปลี่ยนรหัสผ่าน')
            ->line('คุณได้รับอีเมลนี้เนื่องจากมีคำร้องขอเปลี่ยนรหัสผ่านจากบัญชีของคุณ')
            ->action(('เปลี่ยนรหัสผ่าน'), url(config('app.url').route('password.reset', ['token' => $this->token, 'email' => $notifiable->getEmailForPasswordReset()], false)))
            ->line('ลิ้งค์ข้างบนจะหมดอายุใน :count นาที', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')])
            ->line('โปรดอย่าดำเนินการต่อหากคุณไม่ได้ร้องขอเปลี่ยนรหัสผ่าน');
}
}
