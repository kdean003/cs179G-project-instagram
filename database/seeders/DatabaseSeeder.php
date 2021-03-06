<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
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
        $this->call([UsersTableSeeder::class]);
        $this->call([FollowersSeeder::class]);
        $this->call([FollowingSeeder::class]);
        $this->call([CommentsTableSeeder::class]);
        $this->call([UserTagsTableSeeder::class]);
        $this->call([PostsSeeder::class]);
        $this->call([LikesDislikesSeeder::class]);
        $this->call([ImgUrlSeeder::class]);

    }
}
