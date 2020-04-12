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
        $resumeIdList = array_map(function($r){return $r['id'];}, App\Resume::select('id')->get()->toArray());
        $tagIdList = array_map(function($r){return $r['id'];}, App\Tag::select('id')->get()->toArray());
        foreach ($resumeIdList as $resumeId) {
            foreach ($tagIdList as $tagId) {
                if (crc32((17*$resumeId).(23*$tagId)) % 3 == 0)
                    App\ResumeTag::create(['resume_id' => $resumeId, 'tag_id' => $tagId]);
            }
        }
    }
}
