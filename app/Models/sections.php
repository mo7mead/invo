<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sections extends Model
{
    protected $fillable = [
        'section_name',
        'description',
        'create_by',
        'created_at',
        'updated_at',
    ];
}
