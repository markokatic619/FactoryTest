<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function translations()
    {
        $currentLocale = App::getLocale();
        return $this->hasOne(TagTranslation::class, 'tagId')->where('locale', $currentLocale);
    }
}
