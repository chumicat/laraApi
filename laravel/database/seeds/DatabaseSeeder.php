<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(NamesTableSeeder::class);
        $this->call(ResumesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(ResumeTagMappingsTableSeeder::class);
    }
}
