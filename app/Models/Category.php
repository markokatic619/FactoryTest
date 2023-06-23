<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function translations()
    {
        $currentLocale = App::getLocale();
        return $this->hasOne(CategoryTranslation::class, 'categoryId')->where('locale', $currentLocale);
    }
    
}
