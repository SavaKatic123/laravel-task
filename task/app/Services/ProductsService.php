<?php
namespace App\Services;


use \Carbon\Carbon;
use App\Repositories\ProductRepositoryInterface;

class ProductsService
{

    protected $product;

    public function __construct(ProductRepositoryInterface $product)
    {
        $this->product = $product;
    }

    public function getProduct($id)
    {
      return $this->product->get($id);
    }

    public function getProducts()
    {
      return $this->product->all();
    }

    public function saveProduct($data)
    {
      return $this->product->create($data);
    }

    public function destroyProduct($id)
    {
      return $this->product->delete($id);
    }

    public function editProduct($id, $data)
    {
      return $this->product->update($id, $data);
    }

}
