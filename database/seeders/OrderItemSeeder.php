<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrderItem;
class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        OrderItem::insert([
            [
                "id" => 1,
                "invoice_id" => 1,               
                "product_id" => 1,               
                "rate" => '5',               
                "qty" => '2',               
                "amount" => '10',               
            ],
            [
                "id" => 2,
                "invoice_id" => 1,               
                "product_id" => 2,               
                "rate" => '10',               
                "qty" => '3',               
                "amount" => '30',               
            ],
            [
                "id" => 3,
                "invoice_id" => 1,               
                "product_id" => 8,               
                "rate" => '200',               
                "qty" => '2',               
                "amount" => '400',               
            ],


            [
                "id" => 4,
                "invoice_id" => 2,               
                "product_id" => 1,               
                "rate" => '5',               
                "qty" => '2',               
                "amount" => '10',               
            ],
            [
                "id" => 5,
                "invoice_id" => 2,               
                "product_id" => 8,               
                "rate" => '200',               
                "qty" => '2',               
                "amount" => '400',               
            ],
            [
                "id" => 6,
                "invoice_id" => 2,               
                "product_id" => 7,               
                "rate" => '10',               
                "qty" => '3',               
                "amount" => '30',               
            ],



            [
                "id" => 7,
                "invoice_id" => 3,               
                "product_id" => 6,               
                "rate" => '600',               
                "qty" => '1',               
                "amount" => '600',               
            ],
            [
                "id" => 8,
                "invoice_id" => 3,               
                "product_id" => 5,               
                "rate" => '250',               
                "qty" => '3',               
                "amount" => '750',               
            ],





            [
                "id" => 9,
                "invoice_id" => 4,               
                "product_id" => 3,               
                "rate" => '725',               
                "qty" => '7',               
                "amount" => '5075',               
            ],
            [
                "id" => 10,
                "invoice_id" => 4,             
                "product_id" => 4,               
                "rate" => '800',               
                "qty" => '5',               
                "amount" => '4000',               
            ],



            [
                "id" => 11,
                "invoice_id" => 5,               
                "product_id" => 1,               
                "rate" => '5',               
                "qty" => '2',               
                "amount" => '10',               
            ],
            [
                "id" => 12,
                "invoice_id" => 5,               
                "product_id" => 2,               
                "rate" => '10',               
                "qty" => '3',               
                "amount" => '30',               
            ],
            [
                "id" => 13,
                "invoice_id" => 5,               
                "product_id" => 8,               
                "rate" => '200',               
                "qty" => '2',               
                "amount" => '400',               
            ],

            
                        [
                "id" => 14,
                "invoice_id" => 6,               
                "product_id" => 1,               
                "rate" => '5',               
                "qty" => '2',               
                "amount" => '10',               
            ],
            [
                "id" => 15,
                "invoice_id" => 6,               
                "product_id" => 8,               
                "rate" => '200',               
                "qty" => '2',               
                "amount" => '400',               
            ],
            [
                "id" => 16,
                "invoice_id" => 6,               
                "product_id" => 7,               
                "rate" => '10',               
                "qty" => '3',               
                "amount" => '30',               
            ],


            [
                "id" => 17,
                "invoice_id" => 7,               
                "product_id" => 6,               
                "rate" => '600',               
                "qty" => '1',               
                "amount" => '600',               
            ],
            [
                "id" => 18,
                "invoice_id" => 7,               
                "product_id" => 5,               
                "rate" => '250',               
                "qty" => '3',               
                "amount" => '750',               
            ],


            [
                "id" => 19,
                "invoice_id" => 8,               
                "product_id" => 3,               
                "rate" => '725',               
                "qty" => '7',               
                "amount" => '5075',               
            ],
            [
                "id" => 20,
                "invoice_id" => 8,             
                "product_id" => 4,               
                "rate" => '800',               
                "qty" => '5',               
                "amount" => '4000',               
            ],


            [
                "id" => 21,
                "invoice_id" => 9,               
                "product_id" => 1,               
                "rate" => '5',               
                "qty" => '2',               
                "amount" => '10',               
            ],
            [
                "id" => 22,
                "invoice_id" => 9,               
                "product_id" => 2,               
                "rate" => '10',               
                "qty" => '3',               
                "amount" => '30',               
            ],
            [
                "id" => 23,
                "invoice_id" => 9,               
                "product_id" => 8,               
                "rate" => '200',               
                "qty" => '2',               
                "amount" => '400',               
            ],


            [
                "id" => 24,
                "invoice_id" => 10,               
                "product_id" => 1,               
                "rate" => '5',               
                "qty" => '2',               
                "amount" => '10',               
            ],
            [
                "id" => 25,
                "invoice_id" => 10,               
                "product_id" => 8,               
                "rate" => '200',               
                "qty" => '2',               
                "amount" => '400',               
            ],
            [
                "id" => 26,
                "invoice_id" => 10,               
                "product_id" => 7,               
                "rate" => '10',               
                "qty" => '3',               
                "amount" => '30',               
            ],


            [
                "id" => 27,
                "invoice_id" => 11,               
                "product_id" => 6,               
                "rate" => '600',               
                "qty" => '1',               
                "amount" => '600',               
            ],
            [
                "id" => 28,
                "invoice_id" => 11,               
                "product_id" => 5,               
                "rate" => '250',               
                "qty" => '3',               
                "amount" => '750',               
            ],

            [
                "id" => 29,
                "invoice_id" => 12,               
                "product_id" => 3,               
                "rate" => '725',               
                "qty" => '7',               
                "amount" => '5075',               
            ],
            [
                "id" => 30,
                "invoice_id" => 12,             
                "product_id" => 4,               
                "rate" => '800',               
                "qty" => '5',               
                "amount" => '4000',               
            ],
        ]);
    }
}
