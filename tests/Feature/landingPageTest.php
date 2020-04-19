<?php

namespace Tests\Feature;

use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class landingPageTest extends TestCase
{
    /** @test */

    public function landingPageLoadsCorrectly()
    {
        //Arrange

        //Action
        $response = $this->get('/');

        //Assert
        $response->assertStatus(200);
        $response->assertSee('For Men');
    }

    /** @test */
    public function productIsVisible()
    {
        //Arrange
        $product = Product::where('slug', 'laptop3')->first();

        // Action
        $response = $this->get('/');

        //Assert
        $response->assertSee($product->name);
    }
}
