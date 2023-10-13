<?php

namespace App\Repositories;

use App\Models\Sales;

class SaleRepository
{
    protected $entity;

    public function __construct(Sales $sale)
    {
        $this->entity = $sale;
    }

    public function getAllSales()
    {
        return $this->entity->get();
    }

    public function createNewSale(int $sellerId, array $data)
    {
        $data['seller_id'] = $sellerId;
        //$seller->sales()->create();
        return $this->entity->create($data);
    }

    public function getSaleById(int $id)
    {
        return $this->entity->where('id', $id)->firstOrFail();
    }

    public function getSalesToSeller(int $sellerId)
    {
        return $this->entity->where('seller_id', $sellerId)->get();
    }
}