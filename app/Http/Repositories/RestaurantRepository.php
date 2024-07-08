<?php

namespace App\Http\Repositories;

use App\Http\Models\RestaurantModel;

class RestaurantRepository
{
    public function readAll()
    {
        return RestaurantModel::all()->toArray();
    }
}
