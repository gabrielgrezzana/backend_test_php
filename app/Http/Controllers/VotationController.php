<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Services\VotationService;
use Illuminate\Http\Request;

class VotationController extends Controller
{
  private $votationService;

  public function __construct(VotationService $votationService)
  {
    $this->votationService = $votationService;
  }

  public function create(Request $request)
  {
    $validator = Validator::make($request->all(), [
      "userId" => "required|integer|exists:users,id",
      "restaurantId" => "required|integer|exists:restaurants,id",
    ]);

    if ($validator->fails()) {
      return response()->json($validator->errors(), 422);
    }
    return $this->votationService->create(
      $request->userId,
      $request->restaurantId
    );
  }

  public function readResults()
  {
    return $this->votationService->readResults();
  }
}
