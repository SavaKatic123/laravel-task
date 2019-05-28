<?php

namespace Tests\Feature;

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

  public function testGetProductListWithMiddleware()
  {
    $response = $this->json('GET', '/products');
    $response->assertStatus(401);
    $response->assertJson(['message' => "Unauthenticated."]);

    $response = $this->actingAs($this->user, 'api')->json('GET', '/products');
    $response->assertOk()
             ->assertSee('Name')
             ->assertSee('Price')
             ->assertSee('Options');
  }
  public function testGetProductAddPageWithMiddleware()
  {
    $response = $this->json('GET', '/products/create');
    $response->assertStatus(401);
    $response->assertJson(['message' => "Unauthenticated."]);

    $response = $this->actingAs($this->user, 'api')->json('GET', '/products/create');
    $response->assertOk()
             ->assertSee('Add Product');
  }
  public function testAddNewProductToDatabaseWithMiddleware()
  {
    $data = [
      'name' => "New Product",
      'description' => "This is a product",
      'merchant_id' => 1,
      'price' => 10,
      'status' => "in_stock"
    ];
    $response = $this->json('POST', '/products',$data);
    $response->assertStatus(401);
    $response->assertJson(['message' => "Unauthenticated."]);

    $response = $this->actingAs($this->user, 'api')->json('POST', '/products', $data);
    $response->assertOk()
             ->assertSee('Name')
             ->assertSee('Price')
             ->assertSee('Options');
  }

  public function testGetProductWithMiddleware()
  {
    $response = $this->json('GET', '/products/' . $this->product->id);
    $response->assertStatus(401);
    $response->assertJson(['message' => "Unauthenticated."]);

    $response = $this->actingAs($this->user, 'api')->json('GET', '/products/' . $this->product->id);
    $response->assertOk()
             ->assertSee('Product:');
            
  }

  public function testEditProductPageWithMiddleware()
  {
    $response = $this->json('GET', '/products/'.$this->product->id.'/edit');
    $response->assertStatus(401);
    $response->assertJson(['message' => "Unauthenticated."]);

    $response = $this->actingAs($this->user, 'api')->json('GET', '/products/'.$this->product->id.'/edit');
    $response->assertOk()
             ->assertSee('Edit Product');
  }

  public function testUpdateProductWithMiddleware()
  {
    $data = [
      'id' => $this->product->id,
      'name' => "New Product",
      'description' => "This is a product",
      'merchant_id' => 1,
      'price' => 10,
      'status' => "in_stock"
    ];

    $response = $this->json('PUT', '/products/' . $this->product->id, $data);
    $response->assertStatus(401);
    $response->assertJson(['message' => "Unauthenticated."]);

    $response = $this->actingAs($this->user, 'api')->json('PUT', '/products/' . $this->product->id, $data);
    $response->assertOk();
  }

  public function testDeleteProductWithMiddleware()
  {
    $response = $this->json('DELETE', '/products/' . $this->product->id);
    $response->assertStatus(401);
    $response->assertJson(['message' => "Unauthenticated."]);

    $response = $this->actingAs($this->user, 'api')->json('DELETE', '/products/' . $this->product->id);
    $response->assertOk();
  }

  public function testProductRequestRedirect()
  {
    $data = [
      'name' => "",
      'description' => "This is a product",
      'merchant_id' => 1,
      'price' => 12,
      'status' => "in_stock"
    ];
    $this->actingAs($this->user, 'api')->json('POST', '/products', $data)
         ->assertJson([
          'message' => 'The given data was invalid.',
          'errors' => ['name' => ['The name field is required']]]);
  }

  public function tearDown(): void
  {
    Product::destroy($this->product->id);
    User::destroy($this->user->id);

    $this->product = null;
    $this->user = null;
  }

}
