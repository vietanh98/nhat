<?php

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
        $this->call([
            UserSeeder::class,
        ]);
        DB::table('categories')->insert([
            'category_name' => 'Son môi',
            'description' =>'son cực lỳ'
        ]);
    }
}
