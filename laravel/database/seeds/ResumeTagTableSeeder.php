<?php

use Illuminate\Database\Seeder;

class ResumeTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Resume::select('id', 'resume')->each( function ($resume) { 
            App\Tag::select('id', 'tag')->each( function ($tag) use ($resume) {
                if (crc32($resume['resume'].$tag['tag']) % 3 == 0)
                    App\ResumeTag::create(['resume_id' => $resume['id'], 'tag_id' => $tag['id']]);
            });            
        });
    }
}
