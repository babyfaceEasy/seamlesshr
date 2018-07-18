<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $user = new User();
        $user->name = $faker->name;
        $user->email = "admin@admin.com";
        $user->is_admin = true;
        $user->password = bcrypt('password');
        $user->save();
    }
}
