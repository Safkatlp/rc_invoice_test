<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Product::insert([
            [
                "id" => 1,
                "name" => "Pen",
                "price" => "5",                
            ],
            [
                "id" => 2,
                "name" => "Pencil",
                "price" => "10",                
            ],
            [
                "id" => 3,
                "name" => "Headphone",
                "price" => "900",                
            ],
            [
                "id" => 4,
                "name" => "Keyboard",
                "price" => "800",                
            ],
            [
                "id" => 5,
                "name" => "Mouse",
                "price" => "500",                
            ],
            [
                "id" => 6,
                "name" => "Monitor",
                "price" => "700",                
            ],
            [
                "id" => 7,
                "name" => "Sticker",
                "price" => "10",                
            ],
            [
                "id" => 8,
                "name" => "Book",
                "price" => "200",                
            ],
            
            
        ]);
    }
}
