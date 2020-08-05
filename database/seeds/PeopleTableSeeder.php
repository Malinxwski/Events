<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people')->insert([
            [
                'name'=>'Ivan',
                'surname'=>'Ivanov',
                'email'=>'Ivanov@mail.ru',
                'event_id'=>1
            ],
            [
                'name'=>'Anton',
                'surname'=>'Antonov',
                'email'=>'Antonov@mail.ru',
                'event_id'=>2
            ],
            [
                'name'=>'Sergey',
                'surname'=>'Sergeev',
                'email'=>'Sergeev@mail.ru',
                'event_id'=>3
            ],
        ]);
    }

}
