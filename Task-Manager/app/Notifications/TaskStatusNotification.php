<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use APP\Models\Task;

class TaskStatusNotification extends Notification
{
    public $task;
    public $message;
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(Task $task,$message)
    {
        $this->task=$task;
        $this->message=$message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Task Notification')
                    ->line($this->message)
                    ->action('View Task', url('/tasks/'.$this->task->id))
                    ->line('Thank you for using the Task Manager!');
    }
}
