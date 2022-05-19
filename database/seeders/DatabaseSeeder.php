<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   /* hay que poner la direccion public/posts y hacer los seeder*/
        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');

       $this->call(UserSeeder::class);
       Category::factory(4)->create();
       Tag::factory(8)->create();
       /* Post::factory(100)->create(); */
       $this->call(PostSeeder::class);
    }
}
