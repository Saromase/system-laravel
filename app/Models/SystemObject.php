<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemObject extends Model
{
    protected $table = 'system_object';

    protected $fillable = [
        'name', 'size', 'type', 'color', 'space'
    ];

}
