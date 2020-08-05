<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            [
                'event_name'=>'Party',
                'event_date'=>'20.10.2020',
                'event_city'=>'Moscow',

            ],
            [
                'event_name'=>'Concert',
                'event_date'=>'22.10.2020',
                'event_city'=>'Warsaw',

            ],
            [
                'event_name'=>'Cinema',
                'event_date'=>'24.10.2020',
                'event_city'=>'Berlin',

            ],

        ]);
    }
}
