<?php

namespace Tests\VerificationPack;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use \App\User;
use \App\Product;

class RoutesTest extends TestCase
{
  private $product;
  private $user;

  public function setUp(): void
  {
    parent::setUp();

    $this->product = factory(\App\Product::class)->create();
    $this->user = factory(\App\User::class)->create();
  }

  
  public function testGetProductList()
  {
    $response = $this->actingAs($this->user, 'api')->json('GET', '/products');
    $response->assertOk()
             ->assertSee('Name')
             ->assertSee('Price')
             ->assertSee('Options')
             ->assertSee($this->product->name)
             ->assertSee($this->product->price)
             ->assertSee($this->product->id);
  }
  public function testAddEmptyProductName()
  {
    $data = [
      'name' => "",
      'description' => "This is a product",
      'merchant_id' => 1,
      'price' => 10,
      'status' => "in_stock"
    ];

    $this->actingAs($this->user, 'api')->json('POST', '/products', $data)->assertSee('The name field is required');
  }

  public function testAddEmptyProductDescription()
  {
    $data = [
      'name' => "New Product",
      'description' => "",
      'merchant_id' => 1,
      'price' => 10,
      'status' => "in_stock"
    ];

    $this->actingAs($this->user, 'api')->json('POST', '/products', $data)->assertSee('The description field is required');
  }

  public function testAddEmptyProductPrice()
  {
    $data = [
      'name' => "New Product",
      'description' => "This is a product",
      'merchant_id' => 1,
      'price' => null,
      'status' => "in_stock"
    ];

    $this->actingAs($this->user, 'api')->json('POST', '/products', $data)->assertSee('The price field is required');

  }

  public function testAddNonNumericPrice()
  {
    $data = [
      'name' => "New Product",
      'description' => "This is a product",
      'merchant_id' => 1,
      'price' => 'non-numeric',
      'status' => "in_stock"
    ];
    $this->actingAs($this->user, 'api')->json('POST', '/products', $data)->assertSee('Price must be a valid number');
  }

  public function testShowProductPage()
  {
    $response = $this->actingAs($this->user, 'api')->json('GET', '/products/' . $this->product->id);
    $response->assertOk()
             ->assertSee('Product:')
             ->assertSee($this->product->name)
             ->assertSee($this->product->description);
  }

  public function testEditProductPage()
  {
    $response = $this->actingAs($this->user, 'api')->json('GET', '/products/'.$this->product->id.'/edit');
    $response->assertOk()
             ->assertSee('Edit Product')
             ->assertSee($this->product->name)
             ->assertSee($this->product->description);
  }

  public function testUpdateProductWithEmptyName()
  {
    $data = [
      'id' => $this->product->id,
      'name' => "",
      'description' => "This is a product",
      'merchant_id' => 1,
      'price' => 10,
      'status' => "in_stock"
    ];

    $this->actingAs($this->user, 'api')->json('PUT', '/products/' . $this->product->id, $data)->assertSee('The name field is required');
  }

  public function testUpdateProductWithEmptyDescription()
  {
    $data = [
      'id' => $this->product->id,
      'name' => "Updated Product",
      'description' => "",
      'merchant_id' => 1,
      'price' => 10,
      'status' => "in_stock"
    ];
    $this->actingAs($this->user, 'api')->json('PUT', '/products/' . $this->product->id, $data)->assertSee('The description field is required');

  }

  public function testUpdateProductWithEmptyPrice()
  {
    $data = [
      'id' => $this->product->id,
      'name' => "Updated Product",
      'description' => "This is a product",
      'merchant_id' => 1,
      'price' => null,
      'status' => "in_stock"
    ];

    $this->actingAs($this->user, 'api')->json('PUT', '/products/' . $this->product->id, $data)->assertSee('The price field is required');

  }

  public function testUpdateProductWithNonumericPrice()
  {
    $data = [
      'id' => $this->product->id,
      'name' => "Updated Product",
      'description' => "This is a product",
      'merchant_id' => 1,
      'price' => 'non-numeric',
      'status' => "in_stock"
    ];

    $this->actingAs($this->user, 'api')->json('PUT', '/products/' . $this->product->id, $data)->assertSee('Price must be a valid number');
  }
  
  public function tearDown(): void
  {
    Product::destroy($this->product->id);
    User::destroy($this->user->id);

    $this->product = null;
    $this->user = null;
  }

}
