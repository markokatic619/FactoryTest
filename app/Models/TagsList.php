<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagsList extends Model
{
    protected $table = 'tags_list';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'mealId',
        'tagId',
    ];

    public function meal()
    {
        return $this->belongsTo(Meal::class, 'mealId');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tagId');
    }
}
