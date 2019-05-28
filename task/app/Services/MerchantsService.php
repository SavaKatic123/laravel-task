<?php
namespace App\Services;

use \Carbon\Carbon;
use App\Repositories\MerchantRepositoryInterface;

class MerchantsService
{
    protected $merchant;

    public function __construct(MerchantRepositoryInterface $merchant)
    {
        $this->merchant = $merchant;
    }

    public function getMerchants()
    {
      return $this->merchant->all();
    }

    public function getMerchantsByIds() {
      return $this->getMerchants()->mapToGroups(function($item, $key) {
        return [$item['id'] => $item['merchant_name']];
      })->map(function($item) {
        return $item[0];
      });
    }

}
