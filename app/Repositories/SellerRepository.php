<?php

namespace App\Repositories;

use App\Models\Seller;

class SellerRepository
{
    protected $entity;

    public function __construct(Seller $seller)
    {
        $this->entity = $seller;
    }

    public function getAllSellers()
    {
        return $this->entity->get();
    }

    public function createNewSeller(array $data)
    {
        return $this->entity->create($data);
    }

    public function getSellerById(int $id)
    {
        return $this->entity->where('id', $id)->firstOrFail();
    }

}