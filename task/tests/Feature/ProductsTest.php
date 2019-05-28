<?php

namespace Tests\Unit;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use \App\Product;
use Tests\TestCase;
use App\Services\ProductsService;
use App\Repositories\ProductRepository;

class ProductsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    private $productsService;
    private $product;

    public function setUp(): void
    {
        parent::setUp();

        $this->product = factory(\App\Product::class)->create();
        $this->productsService = new ProductsService(new ProductRepository());
    }

    public function testGetProductMethod()
    {
        $product = $this->productsService->getProduct($this->product->id);
        $this->assertSame($product->id, $this->product->id);
        $this->assertSame($product->name, $this->product->name);
    }

    public function testSaveProductMethod()
    {
        $data = [
            'name' => "New Product",
            'description' => "This is a product",
            'merchant_id' => 1,
            'price' => 10,
            'status' => "in_stock"
        ];
        $product = $this->productsService->saveProduct($data);

        $this->assertSame($product->name, $data['name']);
        $this->assertSame($product->description, $data['description']);
        $this->assertSame($product->price, $data['price']);
        $this->assertSame($product->status, $data['status']);

        Product::destroy($product->id);
    }

    public function testEditProductMethod()
    {
        $data = [
            'id' => $this->product->id,
            'name' => "Updated product",
            'description' => "This is a product",
            'merchant_id' => 1,
            'price' => 10,
            'status' => "in_stock"
        ];

        $this->productsService->editProduct($this->product->id, $data);
        $this->assertDatabaseHas('products', [
            'id' => $this->product->id,
            'name' => 'Updated product'
        ]);
    }

    public function testGetAllProductsMethod() 
    {
        $products = $this->productsService->getProducts();
        $this->assertTrue($products->contains('id', $this->product->id));
    }


    public function testDestroyProductMethod()
    {
        $isDeleted = $this->productsService->destroyProduct($this->product->id);
        $this->assertSame($isDeleted, 1);
    }

    public function testProductMerchantRelationship()
    {
        $productMerchant = $this->product->merchant;
        $this->assertSame($productMerchant->id, $this->product->merchant_id);
    }

    public function testMigrationBug()
    {
        $data = [
            'name' => "New Product",
            'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla neque diam, elementum vitae imperdiet non, efficitur eu massa. Nam ut ultrices nunc, eu suscipit lectus. Mauris sed eros gravida, elementum turpis quis, ullamcorper felis. Mauris rhoncus nunc molestie dui auctor, vel imperdiet sem pretium. Aliquam massa lorem, mattis et ligula id, tincidunt maximus ex. In porttitor turpis vitae lectus tristique convallis. Aenean eget justo id eros vehicula eleifend. Vestibulum ultrices leo vitae venenatis porta. Donec pretium, arcu et maximus aliquet, ligula sem tempus dolor, at blandit dolor metus non nisl. Aliquam sit amet purus vitae risus pellentesque imperdiet non eu nulla.",
            'merchant_id' => 1,
            'price' => 10,
            'status' => "in_stock"
        ];

        $product = $this->productsService->saveProduct($data);

        $this->assertSame($product->description, $data['description']);

        Product::destroy($product->id);
    }

    public function tearDown(): void
    {
        Product::destroy($this->product->id);
        $this->product = null;
        $this->productsService = null;
    }
}
