<?php

namespace App\Http\Services;

use App\Http\Repositories\RestaurantRepository;

class RestaurantService
{
    private $restaurantRepository;
    public function __construct(RestaurantRepository $restaurantRepository)
    {
        $this->restaurantRepository = $restaurantRepository;
    }

    public function readAll()
    {
        return $this->restaurantRepository->readAll();
    }
}
