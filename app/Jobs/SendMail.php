<?php

namespace App\Jobs;

use App\Mail\InvitePerson;
use App\Person;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;
    /**
     * @var Person
     */
    private $person;

    /**
     * Create a new job instance.
     *
     * @param Person $person
     */
    public function __construct(Person $person)
    {
        $this->person = $person;
    }

    /**
     * Execute the job.
     *
     * @param $person
     * @return void
     */
    public function handle($person)
    {
        $email = new InvitePerson($person);
        Mail::to($this->person->email)->send($email);
    }
}
