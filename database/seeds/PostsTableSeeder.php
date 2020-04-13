<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\Models\User::all() as $user) {
            factory(\App\Models\Post::class, 30)->create([
                'user_id' => $user->id,
                'category_id' => 1
            ]);
        }
    }
}
