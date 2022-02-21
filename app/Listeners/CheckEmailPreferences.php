<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Events\MessageSending;
use Illuminate\Queue\InteractsWithQueue;

class CheckEmailPreferences
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MessageSending  $event
     * @return void
     */
    public function handle(MessageSending $event)
    {
        $data = $event->message;
        $subject = $data->getSubject();
        $excludes = ["caixa"];

        //Stopper l'envoi de mail en cas de spam
        foreach ($excludes as $exclu) {
            if(strpos(strtolower($subject),strtolower($exclu)) !== false ) return false;
        }
    }
}
