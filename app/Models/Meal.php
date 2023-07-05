<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Meal extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'meals';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    protected $fillable = ['categoryId'];
    public $timestamps = true;

    

    public function translations()
    {
        $currentLocale = App::getLocale();
        return $this->hasOne(MealTranslation::class, 'mealId')->where('locale', $currentLocale);
    }

        public function category()
        {
            return $this->belongsTo(Category::class, 'categoryId','id');
        }

    public function ingredients()
    {
        return $this->hasMany(IngredientList::class, 'mealId','id');
    }

    public function tagsList(){
        return $this->hasMany(TagsList::class, 'mealId','id');
    }
}
