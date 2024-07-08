<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Http\Models\RestaurantModel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        RestaurantModel::insert([
            [
                'name' => 'McDonalds',
                'description' => 'McDonalds is a fast food restaurant chain that specializes in American fast food. McDonalds was founded in 1940 in San Bernardino, California, United States.',
                'image' => 'https://gsobmidia.com.br/uploads/lojas/1399/mcdonalds-logo-4-1_1706271545.png',
            ],
            [
                'name' => 'Burger King',
                'description' => 'Burger King is an American fast food restaurant chain that specializes in cheeseburgers, fries, and shakes.',
                'image' => 'https://www.cnnbrasil.com.br/wp-content/uploads/2021/06/17899_B5AF5533F49BA795-1.jpg',
            ],
            [
                'name' => 'KFC',
                'description' => 'KFC is an American fast food restaurant chain that specializes in fried chicken, crispy fries, and fries.',
                'image' => 'https://gsobmidia.com.br/uploads/lojas/2104/kfc-logo_1678128805.png',
            ],
            [
                'name' => 'Pizzaria',
                'description' => 'Pizzaria is an American fast food restaurant chain that specializes in cheeseburgers, fries, and shakes.',
                'image' => 'https://www.rbsdirect.com.br/imagesrc/25685832.jpg?w=460',
            ],
            [
                'name' => 'Taco Bell',
                'description' => 'Taco Bell is an American fast food restaurant chain that specializes in cheeseburgers, fries, and shakes.',
                'image' => 'https://www.cnnbrasil.com.br/wp-content/uploads/sites/12/2023/06/230605134133-taco-bell-vegan-crunchwrap-handout.webp?w=1220&h=674&crop=1',
            ],
            [
                'name' => 'Subway',
                'description' => 'Subway is an American fast food restaurant chain that specializes in cheeseburgers, fries, and shakes.',
                'image' => 'https://www.shoppingdomeier.com.br/wp-content/uploads/2022/02/novo-logo-subway-blog-gkpb.jpg',
            ],
            [
                'name' => 'Wendys',
                'description' => 'Wendys is an American fast food restaurant chain that specializes in cheeseburgers, fries, and shakes.',
                'image' => 'https://www.cnnbrasil.com.br/wp-content/uploads/2021/06/17899_B5AF5533F49BA795-1.jpg',
            ],
        ]);    
    }
}
