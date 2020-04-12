<?php

use Illuminate\Database\Seeder;

class ResumesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nameList = array_map(function($r){return $r['name'];}, App\Name::select('name')->get()->toArray());
        $index = 0;
        foreach ($nameList as $name) {
            App\Resume::create(['name_id' => ++$index, 'resume' => "I'm $name's first resume"]);
            if (crc32($name) % 7 === 0) continue;
            App\Resume::create(['name_id' => $index, 'resume' => "I'm $name's second resume"]);
            if (crc32($name) % 3 === 0) continue;
            App\Resume::create(['name_id' => $index, 'resume' => "I'm $name's third resume"]);
            if (crc32($name) % 4 === 0) continue;
            App\Resume::create(['name_id' => $index, 'resume' => "I'm $name's forth resume"]);
        }
    }
}
