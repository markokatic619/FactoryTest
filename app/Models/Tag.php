<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'mealId',
        'title',
        'slug',
    ];

    public function meal()
    {
        return $this->belongsTo(Meal::class, 'mealId');
    }

}
