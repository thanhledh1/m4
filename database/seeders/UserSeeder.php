<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $item = new User();
        $item->name = "Thanhf";
        $item->email = "thanhdh@gmail.com";
        $item->password = Hash::make('1234');
        $item->address = 'Quảng Trị';
        $item->phone  = "0702339203";
        $item->image ='a26.jpg';
        $item->gender ='Nam';
        $item->birthday ='2004/01/01';
        $item->group_id ='1';
        // $item->image ='thang.ipg';
        $item->save();
    }
}
