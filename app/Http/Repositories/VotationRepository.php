<?php

namespace App\Http\Repositories;

use App\Http\Models\VotationModel;

class VotationRepository
{
    public function create($userId, $restaurantId)
    {
        $votation = VotationModel::create([
            "user_id" => $userId,
            "restaurant_id" => $restaurantId
        ]);
        $votation->save();
        return $votation;
    }

    public function readByUser($userId)
    {
        return VotationModel::where("user_id", $userId)->get();
    }

    public function readByUserAndRestaurant($userId, $restaurantId)
    {
        return VotationModel::where("user_id", $userId)->where("restaurant_id", $restaurantId)->get();
    }

    public function deleByUser($userId)
    {
        return VotationModel::where("user_id", $userId)->delete();
    }

    public function readAllByRestaurant($restaurantId)
    {
        return VotationModel::where("restaurant_id", $restaurantId)->get();
    }
}
