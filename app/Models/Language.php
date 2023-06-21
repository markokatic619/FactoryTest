<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'language',
    ];
}
