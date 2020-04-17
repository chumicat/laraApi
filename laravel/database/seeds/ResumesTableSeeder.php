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
        $index = 0;
        App\Name::select('name')->each(
            function ($name) use (&$index) { 
                $name = $name['name'];
                App\Resume::create(['name_id' => ++$index, 'resume' => "I'm $name's first resume"]);
                if (crc32($name) % 7 === 0) return;
                App\Resume::create(['name_id' => $index, 'resume' => "I'm $name's second resume"]);
                if (crc32($name) % 3 === 0) return;
                App\Resume::create(['name_id' => $index, 'resume' => "I'm $name's third resume"]);
                if (crc32($name) % 4 === 0) return;
                App\Resume::create(['name_id' => $index, 'resume' => "I'm $name's forth resume"]);
            }
        );
    }
}
