<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Task;

class TaskStatusUpdated implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $task;
    public $message;

    public function __construct(Task $task, $message)
    {
        $this->task = $task;
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('tasks');
    }
}