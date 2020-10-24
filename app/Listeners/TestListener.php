<?php

namespace App\Listeners;

use App\Events\TestEvent;
use App\Mail\ListenerMail;
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestListener
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
     * @param  TestEvent  $event
     * @return void
     */
    public function handle(TestEvent $event)
    {
        
          Mail::to($event->user->email)->send(new ListenerMail($event->user));
    }
}
