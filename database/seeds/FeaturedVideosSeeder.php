<?php

use Illuminate\Database\Seeder;

class FeaturedVideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('featured_videos')->insert([
            'user_id' => 1,
            'link' => null
         ]);

         DB::table('featured_videos')->insert([
            'user_id' => 1,
            'link' => null
         ]);

         DB::table('featured_videos')->insert([
            'user_id' => 1,
            'link' => null
         ]);

         DB::table('featured_videos')->insert([
            'user_id' => 1,
            'link' => null
         ]);
    }
}
