<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemObjectType extends Model
{
    protected $table = 'system_object_type';

    protected $fillable = [
        'name',
    ];
}
