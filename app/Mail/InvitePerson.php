<?php

namespace App\Mail;

use App\Event;
use App\Person;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvitePerson extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Person
     */
    protected $person;


    /**
     * Create a new message instance.
     *
     * @param Person $person
     */
    public function __construct(Person $person)
    {
        $this->person = $person;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $event = Event::where('id', $this->person->event_id)->first();

        return $this->from('malinowski.work@mail.ru')
                    ->markdown('mail.invite',[
                        'name' => $this->person->name,
                        'surname' => $this->person->surname,
                        'eventName'=> $event->event_name,
                        'eventDate'=> $event->event_date,
                        'eventCity'=> $event->event_city,


                    ]);

    }
}
