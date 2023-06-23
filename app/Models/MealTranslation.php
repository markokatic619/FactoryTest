<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealTranslation extends Model
{
    protected $table = 'meals_translations';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function meal()
    {
        return $this->belongsTo(Meal::class, 'mealId');
    }
}
