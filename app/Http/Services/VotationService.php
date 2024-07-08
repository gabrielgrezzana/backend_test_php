<?php

namespace App\Http\Services;

use App\Http\Repositories\VotationRepository;
use App\Http\Repositories\RestaurantRepository;

class VotationService
{
  private $votationRepository;
  private $restaurantRepository;
  public function __construct(VotationRepository $votationRepository, RestaurantRepository $restaurantRepository)
  {
    $this->votationRepository = $votationRepository;
    $this->restaurantRepository = $restaurantRepository;
  }

  public function create($userId, $restaurantId)
  {
    $foundUserVotes = $this->votationRepository->readByUser($userId);

    if (count($foundUserVotes) > 0) {
      $foundUserVodeAtRestaurant = $this->votationRepository->readByUserAndRestaurant($userId, $restaurantId);
      if (count($foundUserVodeAtRestaurant) > 0) {
        return ['message' => 'Você não pode votar no mesmo restaurante'];
      } else {
        $this->votationRepository->deleByUser($userId);
        $this->votationRepository->create($userId, $restaurantId);
        return ['message' => 'Voto atualizado'];
      }
    } else {
      $this->votationRepository->create($userId, $restaurantId);
      return ['message' => 'Voto confirmado'];
    }

    $this->votationRepository->deleByUser($userId);
  }

  public function readResults()
  {
    $restaurants = $this->restaurantRepository->readAll();
    return array_map(function ($restaurant) use ($restaurants) {
      $data = $restaurant;
      $data['votes'] = count($this->votationRepository->readAllByRestaurant($restaurant['id']));
      return $data;
    }, $restaurants);
  }
}
