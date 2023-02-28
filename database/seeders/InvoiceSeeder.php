<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Invoice;
class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Invoice::insert([
            [
                "id" => 1,
                "customer_name" => "MR. A",                
                "customer_street" => "24/c Main Steet",                
                "customer_city" => "Chittagong",                
                "customer_country" => "Bangladesh",                
                "customer_phone" => "123456",                
                "inv_date" => '2023-02-28 00:00:00',                
                "subtotal" => "440",                
                "tax" => "0",                
                "total" => "440",                
            ],
            [
                "id" => 2,
                "customer_name" => "MR. B",                
                "customer_street" => "12/b Steet",                
                "customer_city" => "Dhaka",                
                "customer_country" => "Bangladesh",                
                "customer_phone" => "2345",                
                "inv_date" => '2023-02-28 00:00:00',                
                "subtotal" => "440",                
                "tax" => "5",                
                "total" => "462",                
            ],
            [
                "id" => 3,
                "customer_name" => "MR. C",                
                "customer_street" => "Back Steet",                
                "customer_city" => "Chittagong",                
                "customer_country" => "Bangladesh",                
                "customer_phone" => "434434",                
                "inv_date" => '2023-02-28 00:00:00',                
                "subtotal" => "1350",                
                "tax" => "0",                
                "total" => "1350",                
            ],
            [
                "id" => 4,
                "customer_name" => "MR. D",                
                "customer_street" => "22 Steet",                
                "customer_city" => "Chittagong",                
                "customer_country" => "Bangladesh",                
                "customer_phone" => "3333",                
                "inv_date" => '2023-02-28 00:00:00',                
                "subtotal" => "9075",                
                "tax" => "10",                
                "total" => "9982.5",                
            ],
            [
                "id" => 5,
                "customer_name" => "MR. John",                
                "customer_street" => "24/c Main Steet",                
                "customer_city" => "Chittagong",                
                "customer_country" => "Bangladesh",                
                "customer_phone" => "123456",                
                "inv_date" => '2023-02-28 00:00:00',                
                "subtotal" => "440",                
                "tax" => "0",                
                "total" => "440",                
            ],
            [
                "id" => 6,
                "customer_name" => "MR. Richard",                
                "customer_street" => "12/b Steet",                
                "customer_city" => "Dhaka",                
                "customer_country" => "Bangladesh",                
                "customer_phone" => "2345",                
                "inv_date" => '2023-02-28 00:00:00',                
                "subtotal" => "440",                
                "tax" => "5",                
                "total" => "462",                
            ],
            [
                "id" => 7,
                "customer_name" => "MR. Eager",                
                "customer_street" => "Back Steet",                
                "customer_city" => "Chittagong",                
                "customer_country" => "Bangladesh",                
                "customer_phone" => "434434",                
                "inv_date" => '2023-02-28 00:00:00',                
                "subtotal" => "1350",                
                "tax" => "0",                
                "total" => "1350",                
            ],
            [
                "id" => 8,
                "customer_name" => "MR. Trevor",                
                "customer_street" => "22 Steet",                
                "customer_city" => "Chittagong",                
                "customer_country" => "Bangladesh",                
                "customer_phone" => "3333",                
                "inv_date" => '2023-02-28 00:00:00',                
                "subtotal" => "9075",                
                "tax" => "10",                
                "total" => "9982.5",                
            ],
            [
                "id" => 9,
                "customer_name" => "MR. Lester",                
                "customer_street" => "24/c Main Steet",                
                "customer_city" => "Chittagong",                
                "customer_country" => "Bangladesh",                
                "customer_phone" => "123456",                
                "inv_date" => '2023-02-28 00:00:00',                
                "subtotal" => "440",                
                "tax" => "0",                
                "total" => "440",                
            ],
            [
                "id" => 10,
                "customer_name" => "Mrs. Tracy",                
                "customer_street" => "12/b Steet",                
                "customer_city" => "Dhaka",                
                "customer_country" => "Bangladesh",                
                "customer_phone" => "2345",                
                "inv_date" => '2023-02-28 00:00:00',                
                "subtotal" => "440",                
                "tax" => "5",                
                "total" => "462",                
            ],
            [
                "id" => 11,
                "customer_name" => "MR. Michale",                
                "customer_street" => "Back Steet",                
                "customer_city" => "Chittagong",                
                "customer_country" => "Bangladesh",                
                "customer_phone" => "434434",                
                "inv_date" => '2023-02-28 00:00:00',                
                "subtotal" => "1350",                
                "tax" => "0",                
                "total" => "1350",                
            ],
            [
                "id" => 12,
                "customer_name" => "MR. Diaz",                
                "customer_street" => "22 Steet",                
                "customer_city" => "Chittagong",                
                "customer_country" => "Bangladesh",                
                "customer_phone" => "3333",                
                "inv_date" => '2023-02-28 00:00:00',                
                "subtotal" => "9075",                
                "tax" => "10",                
                "total" => "9982.5",                
            ],
            
            
            
            
        ]);
    }
}
