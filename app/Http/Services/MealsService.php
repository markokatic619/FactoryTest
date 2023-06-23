<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Language;
use Astrotomic\Translatable\Locales;
use Illuminate\Support\Facades\App;

class MealsService
{
    private $perPage, $page, $category, $tags, $withData, $lang, $totalItems, $totalPages, $diffTime;

    public function getMeals(Request $request)
    {
        $this->prepareRequest($request);
        $this->validateLanguage();

        $query = Meal::query();

        $query = $this->applyFilters($query);

        $meals = $query->paginate($this->perPage, ['*'], 'page', $this->page);

        $this->handlePages($meals);

        $allData = [];

        $allData['meta'] = [
            'currentPage' => $this->page,
            'totalItems' => $this->totalItems,
            'itemsPerPage' => $this->itemsPerPage,
            'totalPages' => $this->totalPages
        ];

        foreach ($meals as $meal) {

            $data = $this->createDataArray($meal);
            
            $allData['data'][] = $data;
        }

        $allData['links']=[
            'prev' => url()->previous(),
            'next' => 'null',
            'self' => url()->current(),
        ];

        return $allData;
    }

    private function prepareRequest(Request $request)
    {
        $this->perPage = $request->input('per_page');
        $this->page = intval($request->input('page'));
        $this->category = $request->input('category');
        $this->tags = $request->input('tags');
        $this->withData = explode(',', $request->input('with'));
        $this->lang = $request->input('lang');
        $this->diffTime = $request->input('diff_time');
    }

    private function validateLanguage()
    {
        $language = Language::where('language', $this->lang)->first();

        if (!$language) {
            return response()->json(['error' => 'Invalid language'], 400);
        }

        App::setLocale($this->lang);
    }

    private function applyFilters($query)
    {
        if ($this->category == "null" || $this->category == "!null") {
            if ($this->category == "null") {
                $query->orWhereDoesntHave('category');
            } else {
                $query->orWhereHas('category');
            }
        } else if ($this->category !== null) {
            $query->orWhereHas('category', function ($query) {
                $query->where('id', $this->category);
            });
        }

        if ($this->tags !== null) {
            $query->orWhereHas('tags', function ($query) {
                $query->where('id', $this->tags);
            });
        }

        if($this->diffTime == null) {
            $query->whereNull('deleted_at');
        }
        
        return $query;
    }

    private function handlePages($meals)
    {
        $this->totalItems = $meals->total();

        if ($this->page == null) {
            $this->page = 1;
        }

        if ($this->perPage == null) {
            $this->perPage = $this->totalItems;
            $this->itemsPerPage = $this->perPage;
            $this->page = 1;
        } else {
            if (intval($this->perPage) > $this->totalItems) {
                $this->itemsPerPage = $this->totalItems;
            } else {
                $this->itemsPerPage = intval($this->perPage);
            }
        }

        if ($this->perPage > 0) {
            $this->totalPages = ceil($this->totalItems / $this->perPage);
        } else {
            $this->totalPages = 0;
            $this->page = 0;
        }
    }

    private function createDataArray($meal){

        $status = "created";
        if($this->diffTime!=null)
        {
            $deletedAt = strtotime($meal->deleted_at);
            $createdAt = strtotime($meal->created_at);
            $updatedAt = strtotime($meal->updated_at);

            $diffDeleted = $deletedAt - $this->diffTime;
            $diffCreated = $createdAt - $this->diffTime;
            $diffUpdated = $updatedAt - $this->diffTime;

            $maxDiff = max($diffDeleted,$diffCreated,$diffUpdated);
            if($diffDeleted<0 || $diffDeleted==false){$diffDeleted=$maxDiff+1;}
            if($diffUpdated<0 || $diffUpdated==false){$diffUpdated=$maxDiff+1;}
            if($diffCreated<0){$diffCreated=$maxDiff+1;}

            if($diffDeleted < $diffCreated && $diffDeleted < $diffUpdated){ $status = "deleted"; }
            if($diffUpdated < $diffDeleted && $diffUpdated < $diffCreated){ $status = "updated"; }
        }
        $data = [
            'id' => $meal->id,
            'title' => $meal->translations->title,
            'description' => $meal->translations->description,
            'status' => $status
        ];

        if (in_array('category', $this->withData)) {
            $categoryData = $meal->category;
            $data['category'] = [
                'id' => $categoryData->id,
                'title' => $categoryData->translations->title,
                'slug' => $categoryData->slug,
            ];
        }

        if (in_array('ingredients', $this->withData)) {
            $ingredientsList = $meal->ingredients;

            foreach ($ingredientsList as $ingredientLink) {
                $data['ingredients'][] = [
                    'id' => $ingredientLink->ingredientId,
                    'title' => $ingredientLink->ingredient->translations->title,
                    'slug' => $ingredientLink->ingredient->slug
                ];
            }
        }

        if (in_array('tags', $this->withData)) {
            $tags = $meal->tags;

            foreach ($tags as $tag) {
                $data['tags'][] = [
                    'id' => $tag->id,
                    'title' => $tag->translations->title,
                    'slug' => $tag->slug
                ];
            }
        }
        return $data;
    }
}
