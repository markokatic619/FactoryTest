<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagTranslation extends Model
{
    protected $table = 'tags_translations';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tagId');
    }
}
