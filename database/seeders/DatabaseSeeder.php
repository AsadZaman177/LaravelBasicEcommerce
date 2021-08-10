<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
         DB::table('users')->insert([ 
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('admin123'),
            're_password'=>Hash::make('admin123'),
        ]);

         DB::table('products')->insert([ 
            [
            'ProductName'=>'Iphone 11',
            'Price'=>'500',
            'Category'=>('Mobiles'),
            'Description'=>('New Iphone 11 128Gb'),
            'Gallery' => ('https://www.whatmobile.com.pk/admin/images/Apple/AppleiPhone11ProMax-b.jpg'),
            ],

            [
            'ProductName'=>'Samsung',
            'Price'=>'400',
            'Category'=>('Mobiles'),
            'Description'=>('New Samsung S20'),
            'Gallery' => ('https://www.whatmobile.com.pk/admin/images/Samsung/SamsungGalaxyZFold2-b.jpg'),
            ],

             [
            'ProductName'=>'Huawei',
            'Price'=>'800',
            'Category'=>('Mobiles'),
            'Description'=>('New Samsung S20'),
            'Gallery' => ('https://www.whatmobile.com.pk/admin/images/Huawei/HuaweiP30Pro-b.jpg'),
            ]

        ]);
    }
}
