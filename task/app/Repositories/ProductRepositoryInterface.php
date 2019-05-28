<?php
namespace App\Repositories;

interface ProductRepositoryInterface
{
    /**
     * Gets a product by it's ID
     *
     * @param int
     */
    public function get($id);

    /**
     * Gets all products.
     *
     * @return mixed
     */
    public function all();

    /**
     * Deletes a product.
     *
     * @param int
     */
    public function delete($id);

    /**
     * Updates a product.
     *
     * @param int
     * @param array
     */
    public function update($id, array $product_data);
}