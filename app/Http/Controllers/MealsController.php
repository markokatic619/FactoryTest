<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\MealsService;
use Illuminate\Support\Facades\Validator;

class MealsController extends Controller
{

    protected $mealsService;

    public function __construct(MealsService $mealsService)
    {
        $this->mealsService = $mealsService;
    }

    public function getMeals(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'per_page' => 'sometimes|integer|min:1',
            'page' => 'sometimes|integer|min:1',
            'category' => ['nullable', 'regex:/^(null|!null|\d+)$/'],
            'tags' => 'nullable|string',
            'with' => 'nullable|string',
            'lang' => 'required|string',
            'diff_time' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }


        $data = $this->mealsService->getMeals($request);

        return response()->json($data);
    }
}
