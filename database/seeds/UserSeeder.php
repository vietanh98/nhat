<?php

use Illuminate\Database\Seeder;
use Psy\Util\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'user_name' => 'Nguyễn Việt Anh',
            'email' => 'vietanh911998@gmail.com',
            'password' =>  bcrypt('Anh911998'),
            'phone' => '0988459063',
            'address' => 'Hà Nội',
            'date_of_birth' => '1998-12-3',
            'avatar' => 'adfsdfasdf',
            'is_active' => '1'
        ]);
    }
}
