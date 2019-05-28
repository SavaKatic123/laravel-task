<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class ProductRepository implements ProductRepositoryInterface
{
  /**
    * Gets a product by it's ID
    *
    * @param int
    * @return collection
  */
  public function get($id)
  {
      return Product::find($id);
  }

  /**
    * Creates a product
    *
    * @param array
    * @return Product
  */
  public function create($data)
  {
    return Product::create($data);
  }

  /**
    * Gets all products.
    *
    * @return mixed
  */
  public function all()
  {
      return Product::all();
  }

  /**
    * Deletes a product.
    *
    * @param int
  */
    public function delete($id)
    {
        return Product::destroy($id);
    }

  /**
    * Updates a product.
    *
    * @param int
    * @param array
  */
  public function update($id, array $product_data)
  {
      Product::find($id)->update($product_data);
  }
}