<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Merchant;

class MerchantRepository implements MerchantRepositoryInterface
{
  /**
    * Gets a merchant by it's ID
    *
    * @param int
    * @return collection
  */
  public function get($id)
  {
      return Merchant::find($id);
  }

  /**
    * Creates a merchant
    *
    * @param array
    * @return Merchant
  */
  public function create($data)
  {
    return Merchant::create($data);
  }

  /**
    * Gets all merchants.
    *
    * @return mixed
  */
  public function all()
  {
      return Merchant::all();
  }

  /**
    * Deletes a merchant.
    *
    * @param int
  */
    public function delete($id)
    {
        Merchant::destroy($id);
    }

  /**
    * Updates a merchant.
    *
    * @param int
    * @param array
  */
  public function update($id, array $merchant_data)
  {
      Merchant::find($id)->update($merchant_data);
  }
}