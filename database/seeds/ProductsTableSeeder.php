<?php

use App\Product;
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
        Product::create([
            'name' => 'MacBook-Pro',
            'slug' => 'MacBook-Pro',
            'details' => '15 inch, 1TB ssd, 32GB RAM',
            'price' => 15999.99,
            'description' => 'Cuius acerbitati uxor grave accesserat incentivum, germanitate Augusti turgida supra modum, quam Hannibaliano regi fratris filio antehac'
        ]);

        Product::create([
            'name' => 'MacBook-2',
            'slug' => 'macbook-2',
            'details' => '15 inch, 1TB ssd, 32GB RAM',
            'price' => 15999.99,
            'description' => 'Cuius acerbitati uxor grave accesserat incentivum, germanitate Augusti turgida supra modum, quam Hannibaliano regi fratris filio antehac'
        ]);

        Product::create([
            'name' => 'MacBook-9',
            'slug' => 'macbook-9',
            'details' => '15 inch, 1TB ssd, 32GB RAM',
            'price' => 15999.99,
            'description' => 'Cuius acerbitati uxor grave accesserat incentivum, germanitate Augusti turgida supra modum, quam Hannibaliano regi fratris filio antehac'
        ]);

    }
}
