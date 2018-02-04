<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemObjectSize extends Model
{
    protected $table = 'system_object_size';

    protected $fillable = [
        'name', 'size'
    ];

    public function getCss($containerSize)
    {
        return '.' . $this->name . '{
            width: ' . $this->size . 'px;
            height: ' . $this->size . 'px;
            margin-top: '. ($containerSize - $this->size) / 2 . 'px;
            margin-left: '. ($containerSize - $this->size) / 2 . 'px;
        }';
    }
}
