<?php

namespace App\Services;

use App\Repositories\SellerRepository;

class SellerService
{
    protected $sellerRepository;

    public function __construct(SellerRepository $sellerRepository)
    {
        $this->sellerRepository = $sellerRepository;
    }
    

    public function getSellers()
    {
        return $this->sellerRepository->getAllSellers();
    }

    public function createNewSeller(array $data)
    {
        return $this->sellerRepository->createNewSeller($data);
    }

    public function getSeller(int $id)
    {
        return $this->sellerRepository->getSellerById($id);
    }
    
}