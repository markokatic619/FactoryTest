<?php

namespace App\Http\Controllers;

use App\Http\Requests\MealRequestValidation;
use App\Http\Services\MealsService;

class MealsController extends Controller
{
    protected $mealsService;

    public function __construct(MealsService $mealsService)
    {
        $this->mealsService = $mealsService;
    }

    public function getMeals(MealRequestValidation $request)
    {
        $data = $this->mealsService->getMeals($request->validated());

        return response()->json($data);
    }
}
