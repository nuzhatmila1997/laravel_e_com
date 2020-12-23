<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Subcategory;
use App\Product;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Category::create(['name'=>'laptop','slug'=>'laptop','description'=>'laptop category','image'=>'files/phone.jpeg']);
        Category::create(['name'=>'mobile phone','slug'=>'mobile-phone','description'=>'mobile phone category','image'=>'files/laptop.jpeg']);
        Subcategory::create(['name'=>'dell','category_id'=>1]);
        Subcategory::create(['name'=>'hp','category_id'=>1]);
        Subcategory::create(['name'=>'lenovo','category_id'=>1]);
        Product::create([
        	'name'=>'HP LAPTOPS ',
        	'image'=>'product/hp.jpg',
        	'price'=> rand(700,1000),
        	'description'=>'This is the description of a product',
        	'additional_info'=>'This is additional info',
        	'category_id'=> 1,
            'subcategory_id'=>1



        ]);

        Product::create([
        	'name'=>'Dell LAPTOPS ',
        	'image'=>'product/dell.jpg',
        	'price'=> rand(800,1000),
        	'description'=>'This is the description of a product',
        	'additional_info'=>'This is additional info',
        	'category_id'=> 1,
            'subcategory_id'=>1




        ]);

        Product::create([
        	'name'=>'LENOVO LAPTOPS ',
        	'image'=>'product/leno.jpg',
        	'price'=> rand(700,1000),
        	'description'=>'This is the description of a product',
        	'additional_info'=>'This is additional info',
        	'category_id'=> 1,
            'subcategory_id'=>2



        ]);
        User::create([
        	'name'=>'LaraAdmin',
        	'email'=>'admin@gmail.com',
        	'password'=>bcrypt('admin123'),
        	'email_verified_at'=>NOW(),
        	'address'=>'Australia',
        	'phone_number'=>'0576232',
        	'isAdmin'=>1
        ]);
    }
}
