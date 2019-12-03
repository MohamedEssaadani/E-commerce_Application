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
        //laptops
        for($i=0; $i<10; $i++)
        {
            Product::create([
                'name' => 'Laptop'.$i,
                'slug' => 'laptop'.$i,
                'details' => [13, 14, 15][array_rand([13, 14, 15])].' inch,'.[1, 2, 3][array_rand([1, 2, 3])].'TB ssd, 32GB RAM',
                'price' => rand(14999, 24999),
                'description' => 'Cuius acerbitati uxor grave accesserat incentivum, germanitate Augusti turgida supra modum, quam Hannibaliano regi fratris filio antehac'
            ])->categories()->attach(1);
        }

        //Desktops 
        for($i=0; $i<10; $i++)
        {
            Product::create([
                'name' => 'Desktop'.$i,
                'slug' => 'desktop'.$i,
                'details' => [13, 14, 15][array_rand([13, 14, 15])].' inch,'.[1, 2, 3][array_rand([1, 2, 3])].'TB ssd, 32GB RAM',
                'price' => rand(14999, 24999),
                'description' => 'Cuius acerbitati uxor grave accesserat incentivum, germanitate Augusti turgida supra modum, quam Hannibaliano regi fratris filio antehac'
            ])->categories()->attach(2);
        }

        //Cameras
        for($i=0; $i<10; $i++)
        {
            Product::create([
                'name' => 'Camera'.$i,
                'slug' => 'camera'.$i,
                'details' => [13, 14, 15][array_rand([13, 14, 15])].' inch,'.[1, 2, 3][array_rand([1, 2, 3])].'TB ssd, 32GB RAM',
                'price' => rand(14999, 24999),
                'description' => 'Cuius acerbitati uxor grave accesserat incentivum, germanitate Augusti turgida supra modum, quam Hannibaliano regi fratris filio antehac'
            ])->categories()->attach(3);
        }

        //Tvs
        for($i=0; $i<10; $i++)
        {
            Product::create([
                'name' => 'Tv'.$i,
                'slug' => 'tv'.$i,
                'details' => [13, 14, 15][array_rand([13, 14, 15])].' inch,'.[1, 2, 3][array_rand([1, 2, 3])].'TB ssd, 32GB RAM',
                'price' => rand(14999, 24999),
                'description' => 'Cuius acerbitati uxor grave accesserat incentivum, germanitate Augusti turgida supra modum, quam Hannibaliano regi fratris filio antehac'
            ])->categories()->attach(4);
        }

    }
}
