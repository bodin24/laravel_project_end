<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Product extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'pd_name' => 'Carmera',
                'pd_price' => '22000',
                'pd_img' => 'img/cat-2.jpg',
            ],
            [
                'pd_name' => 'Shoe',
                'pd_price' => '650',
                'pd_img' => 'img/cat-3.jpg',
            ],
            [
                'pd_name' => 'shirt',
                'pd_price' => '350',
                'pd_img' => 'img/product-2.jpg',
            ],
            [
                'pd_name' => 'lamp',
                'pd_price' => '400',
                'pd_img' => 'img/product-3.jpg',
            ],
        ]);
    }
}
