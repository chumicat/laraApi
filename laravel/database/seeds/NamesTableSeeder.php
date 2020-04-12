<?php

use Illuminate\Database\Seeder;

class NamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $nameList = ['Alan', 'Balloon', 'Benny', 'Christine', 'Chumicat', 'Comi', 'Frank', 'Han', 'Harbor', 'Jim', 'Miles', 'Recca', 'Russell', 'Scott', 'Sean', 'Snic', 'Whisper', 'Wish', 'Yuhang'];
        foreach ($nameList as $name) {
            $row = new App\Name;
            $row->name = $name;
            $row->save();
        }
    }
}
