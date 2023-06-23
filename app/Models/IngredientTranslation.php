<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientTranslation extends Model
{
    protected $table = 'ingredients_translations';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class, 'ingredientId');
    }
}
