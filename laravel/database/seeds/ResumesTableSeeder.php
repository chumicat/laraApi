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
        App\Name::select('id', 'name')->each( function ($name) {
            App\Resume::create(['name_id' => $name['id'], 'resume' => "I'm $name[name]'s first resume"]);
            if (crc32($name) % 7 === 0) return;
            App\Resume::create(['name_id' => $name['id'], 'resume' => "I'm $name[name]'s second resume"]);
            if (crc32($name) % 3 === 0) return;
            App\Resume::create(['name_id' => $name['id'], 'resume' => "I'm $name[name]'s third resume"]);
            if (crc32($name) % 4 === 0) return;
            App\Resume::create(['name_id' => $name['id'], 'resume' => "I'm $name[name]'s forth resume"]);
        });
    }
}
