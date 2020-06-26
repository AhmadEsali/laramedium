<?php

use App\Models\Post;
use App\Models\PostImage;
use App\Models\User;
use App\Models\Tag;
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
        factory(Tag::class, 5)->create();


        factory(User::class, 10)->create()->each(function ($user) {


            $posts = factory(Post::class, 5)->create()->each(function ($post) {
                $image = factory(PostImage::class)->make();
                $post->post_images()->save($image);
                $post->tags()->attach(Tag::all()->random(1));
            });
            $user->posts()->saveMany($posts);
        });
    }
}
