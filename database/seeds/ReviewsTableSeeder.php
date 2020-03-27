<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\Models\Post::all() as $post) {
            factory(\App\Models\Review::class, 2)->create([
                'post_id' => $post->id
            ]);
        }
    }
}
