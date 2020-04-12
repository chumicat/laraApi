<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagList = ['Delightful', 'High', 'Sorrowful', 'Dying', 'Holy', 'Public', 'Confidential', 'Evil', 'Pickles', 'Dog', 'Cat'];
        foreach ($tagList as $tag) {
            App\Tag::create(['tag' => $tag]);
        }
    }
}
