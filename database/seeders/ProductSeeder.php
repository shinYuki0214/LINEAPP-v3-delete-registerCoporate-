<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        DB::table('products')->insert([
            [
                'product_name' => 'バナナケーキ',
                'product_price' => '740',
                'product_img' => 'items/product2.png',
            ],
            [
                'product_name' => 'ミニバナナケーキ',
                'product_price' => '200',
                'product_img' => 'items/product4.png',
            ],
            [
                'product_name' => 'ミニバナナケーキ 6個入り',
                'product_price' => '1200',
                'product_img' => 'items/product3.png',
            ],
            [
                'product_name' => 'バナナケーキ（ポケモン）',
                'product_price' => '740',
                'product_img' => 'items/product5.png',
            ],
            [
                'product_name' => 'バナナケーキ 6個入り（ポケモン）',
                'product_price' => '1200',
                'product_img' => 'items/product1.png',
            ],
            [
                'product_name' => '美ら恋ガレット単品',
                'product_price' => '183',
                'product_img' => 'items/product7.png',
            ],
            [
                'product_name' => '美ら恋ガレット 4個入り',
                'product_price' => '734',
                'product_img' => 'items/product8.png',
            ],
            [
                'product_name' => '美ら恋ガレット 8個入り',
                'product_price' => '1468',
                'product_img' => 'items/product9.png',
            ],
            [
                'product_name' => 'バナナラスク 25g',
                'product_price' => '230',
                'product_img' => 'items/product10.png',
            ],
            [
                'product_name' => 'バナナラスク 3個入り',
                'product_price' => '690',
                'product_img' => 'items/product11.png',
            ],
        ]);
    }
}
