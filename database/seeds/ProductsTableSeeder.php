<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([[
            'name' => 'product 1',
            'title' => 'product title 1',
            'description' => 'product description 1',
            'image' => '/img/product/1/1.jpg',
            'amount' => 1000000,
        ], [
            'name' => 'product 2',
            'title' => 'product title 2',
            'description' => 'product description 2',
            'image' => '/img/product/2/2.jpg',
            'amount' => 2000000,
        ], [
            'name' => 'product 3',
            'title' => 'product title 3',
            'description' => 'product description 3',
            'image' => '/img/product/3/3.jpg',
            'amount' => 3000000,
        ], [
            'name' => 'product 4',
            'title' => 'product title 4',
            'description' => 'product description 4',
            'image' => '/img/product/4/4.jpg',
            'amount' => 4000000,
        ], [
            'name' => 'product 5',
            'title' => 'product title 5',
            'description' => 'product description 5',
            'image' => '/img/product/5/5.jpg',
            'amount' => 5000000,
        ], [
            'name' => 'product 6',
            'title' => 'product title 6',
            'description' => 'product description 6',
            'image' => '/img/product/6/6.jpg',
            'amount' => 6000000,
        ], [
            'name' => 'product 7',
            'title' => 'product title 7',
            'description' => 'product description 7',
            'image' => '/img/product/7/7.jpg',
            'amount' => 7000000,
        ], [
            'name' => 'product 8',
            'title' => 'product title 8',
            'description' => 'product description 8',
            'image' => '/img/product/8/8.jpg',
            'amount' => 8000000,
        ], [
            'name' => 'product 9',
            'title' => 'product title 9',
            'description' => 'product description 9',
            'image' => '/img/product/9/9.jpg',
            'amount' => 9000000,
        ], [
            'name' => 'product 10',
            'title' => 'product title 10',
            'description' => 'product description 10',
            'image' => '/img/product/10/10.jpg',
            'amount' => 1000000,
        ], [
            'name' => 'product 11',
            'title' => 'product title 11',
            'description' => 'product description 11',
            'image' => '/img/product/11/11.jpg',
            'amount' => 1100000,
        ], [
            'name' => 'product 12',
            'title' => 'product title 12',
            'description' => 'product description 12',
            'image' => '/img/product/12/12.jpg',
            'amount' => 1200000,
        ], [
            'name' => 'product 13',
            'title' => 'product title 13',
            'description' => 'product description 13',
            'image' => '/img/product/13/13.jpg',
            'amount' => 1300000,
        ], [
            'name' => 'product 14',
            'title' => 'product title 14',
            'description' => 'product description 14',
            'image' => '/img/product/14/14.jpg',
            'amount' => 1400000,
        ], [
            'name' => 'product 15',
            'title' => 'product title 15',
            'description' => 'product description 15',
            'image' => '/img/product/15/15.jpg',
            'amount' => 1500000,
        ], [
            'name' => 'product 16',
            'title' => 'product title 16',
            'description' => 'product description 16',
            'image' => '/img/product/16/16.jpg',
            'amount' => 1600000,
        ]]);
    }
}
