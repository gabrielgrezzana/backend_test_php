<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Services\RestaurantService;
use App\Http\Enums\RestaurantRolesEnum;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    private $restaurantService;

    public function __construct(RestaurantService $restaurantService)
    {
        $this->restaurantService = $restaurantService;
    }


    public function readAll(Request $request)
    {
        return $this->restaurantService->readAll();
    }
}
