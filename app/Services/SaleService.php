<?php

namespace App\Services;

use App\Repositories\SaleRepository;
use App\Repositories\SellerRepository;

class SaleService
{
    protected $saleRepository;
    protected $sellerRepository;

    public function __construct(SaleRepository $saleRepository, SellerRepository $sellerRepository)
    {
        $this->saleRepository = $saleRepository;
        $this->sellerRepository = $sellerRepository;
    }
    

    public function getSales()
    {
        return $this->saleRepository->getAllSales();
    }

    public function createNewSale(array $data)
    {
        //dd($data['seller']);
        $seller = $this->sellerRepository->getSellerById($data['seller_id']);

        return $this->saleRepository->createNewSale($seller->id, $data);
    }

    public function getSale(int $id)
    {
        return $this->saleRepository->getSaleById($id);
    }

    public function getSalesToSeller(int $sellerId)
    {
        //$seller = $this->sellerRepository->getSellerById($sellerId);
        
        return $this->saleRepository->getSalesToSeller($sellerId);
    }
}