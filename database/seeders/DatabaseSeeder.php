<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
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
        /*factory(User::class, 10)->create();
        factory(Category::class, 10)->create();
        factory(Post::class, 100)->make()->each(function ($post) {
            $post->user()->associate(User::inRandomOrder()->first());
            $post->category()->associate(Category::inRandomOrder()->first());
            $post->save();
        });*/
       User::factory(100)
            ->hasQuestions(3)
            ->create();

       Answer::factory(100)->create();


        /*User::factory(10)->create();
        Question::factory(10)->create();
        Answer::factory(10)->create();*/

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
