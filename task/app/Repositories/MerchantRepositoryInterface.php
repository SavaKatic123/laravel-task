<?php
namespace App\Repositories;

interface MerchantRepositoryInterface
{
    /**
     * Gets a merchant by it's ID
     *
     * @param int
     */
    public function get($id);

    /**
     * Gets all merchants.
     *
     * @return mixed
     */
    public function all();

    /**
     * Deletes a merchant.
     *
     * @param int
     */
    public function delete($id);

    /**
     * Updates a merchant.
     *
     * @param int
     * @param array
     */
    public function update($id, array $merchant_data);
}