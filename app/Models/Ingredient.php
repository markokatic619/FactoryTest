<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Ingredient extends Model
{
    use HasFactory;

    protected $table = 'ingredients';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function translations()
    {
        $currentLocale = App::getLocale();
        return $this->hasOne(IngredientTranslation::class, 'ingredientId')->where('locale', $currentLocale);
    }
}