<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use SoftDeletes;

    protected $table = 'meals';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'description',
        'categoryId',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }

    public function tags()
    {
        return $this->hasMany(Tag::class, 'mealId');
    }

    public function ingredientList()
    {
        return $this->hasMany(IngredientList::class, 'mealId');
    }
}
