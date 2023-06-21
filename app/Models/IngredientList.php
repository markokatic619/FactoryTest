<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientList extends Model
{
    protected $table = 'ingredients_list';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'mealId',
        'ingredientId',
    ];

    public function meal()
    {
        return $this->belongsTo(Meal::class, 'mealId');
    }

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class, 'ingredientId');
    }
}
