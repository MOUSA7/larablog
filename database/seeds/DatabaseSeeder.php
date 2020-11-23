<?php

use App\Blog;
use App\Category;
use App\Photo;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        factory(Photo::class,7)->create();
        factory(Blog::class,7)->create();
        factory(Category::class,7)->create();
        DB::table('users')->insert([
            'name' => 'Mousa',
            'email'=> 'eng.mousa.sh@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // password
            'remember_token' => Str::random(10),
            'role_id' => 1,
            'photo_id' => rand(1,4),
            'resume' => 'sad',
            'created_at'=> date('d/m/y'),
            'updated_at'=> date('d/m/y')
        ]);

        // $this->call(UserSeeder::class);
        factory(User::class,1)->create();



    }
}
