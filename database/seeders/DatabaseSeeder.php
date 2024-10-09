<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        
        // Category::create([
        //     'name'=>'Web Programming',
        //     'slug' => Str::slug('Web Programing')
        // ]);

        // Post::create([
        //     'title'=>'Judul Artikel 1',
        //     'slug'=> Str::slug('Judul Artikel 1'),
        //     'id_penulis'=>1,
        //     'id_category'=>1,
        //     'content' => 'lLaravel includes the ability to seed your database with data using seed classes. All seed classes are stored in the database/seeders directory. By default, a DatabaseSeeder class is defined for you. From this class, you may use the call method to run other seed classes, allowing you to control the seeding orde',
        // ]);

        $this->call([UserSeeder::class,CategorySeeder::class]);

       Post::factory(100)->recycle([

        Category::all(),
        User::all()

       ])->create();
    } 
}
