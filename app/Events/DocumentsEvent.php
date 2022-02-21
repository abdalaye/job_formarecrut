<?php

namespace App\Events;

use App\Models\Document;
use App\Models\Validation;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DocumentsEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $name_event;
    public $document;
    
    public function __construct(string $name_event,
                    Document $document)
    {
        $this->name_event = $name_event;
        $this->document = $document;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
