<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Resources\PersonResource;
use App\Jobs\SendMail;
use App\Mail\InvitePerson;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Illuminate\Validation\Rules\In;


class PersonController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return PersonResource::collection(Person::get());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return PersonResource
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'event_id' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',

        ]);

        $person = new Person;

        $person->event_id = $request->event_id;
        $person->name = $request->name;
        $person->surname = $request->surname;
        $person->email = $request->email;
        $person->save();



        Mail::to($person->email)->queue(new InvitePerson($person));


        return new PersonResource($person);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return PersonResource
     */
    public function show(Person $person)
    {
        return new PersonResource($person);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return PersonResource
     */
    public function update(Request $request, Person $person)
    {


        $this->validate($request, [

            'event_id' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'email' => 'email|required',
        ]);

        $person->update($request->only(['event_id','name','surname','email' ]));

        return new PersonResource($person);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Person $person)
    {
        $person->delete();
        return response()->json(null,204 );
    }
}
