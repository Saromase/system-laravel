<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemObjectColor extends Model
{
    protected $table = 'system_object_color';

    protected $fillable = [
        'name', 'code_hexadecimal', 'code_nuance'
    ];
}
