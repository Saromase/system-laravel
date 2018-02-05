<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalaxyHasSystemObjects extends Model
{
    protected $table = 'galaxy_has_system_object';

    protected $fillable = [
        'system_object_id', 'galaxy_id', 'order'
    ];

    protected $galaxyLenght = 600;

    public function getGalaxyLenght()
    {
        return $this->galaxyLenght;
    }

    public function generateObjectTypeCss()
    {

        switch ($this->type) {
            case 'planet':
                return 'position: absolute;
                    border-radius: 50%;
                    z-index: 2;
                    transform: skewX(-50deg);';
                break;

            case 'star':
                return 'position: absolute;
                    border-radius: 50%;
                    z-index: 2;
                    transform: skewX(+25deg);';

                break;

            default:
                return 0;
                break;
        }
    }

    public function generateObjectSizeCss()
    {
        return ' width: '. $this->size .'px;
            height: '. $this->size .'px;
            margin-top: '. ($this->galaxyLenght - $this->size ) /2 .'px;
            margin-left: '. ($this->galaxyLenght - $this->size ) /2 .'px;';
    }

    public function generateObjectColorCss()
    {
        return "background: -webkit-linear-gradient($this->code_hexadecimal, $this->code_nuance);
            background: -moz-linear-gradient($this->code_hexadecimal, $this->code_nuance);
            background: linear-gradient($this->code_hexadecimal, $this->code_nuance);";
    }

    public function generateObjectAnimationCss()
    {
        return '-webkit-animation: '. $this->name .'-'. $this->order .' ' .  (5 * $this->order) .'s linear infinite;
        animation: '. $this->name .'-'. $this->order .' ' .  (5 * $this->order) .'s linear infinite;';
    }

    public function generateObjectKeyFrameCss($galaxyId)
    {
        $system = GalaxyHasSystemObjects::where('galaxy_id', '=', $galaxyId)
            ->join('system_object', 'galaxy_has_system_object.system_object_id', '=', 'system_object.id')
            ->join('system_object_size', 'system_object.size', '=', 'system_object_size.id')
            ->select('galaxy_has_system_object.order', 'system_object_size.size', 'system_object.space')
            ->get();
        $lenght = 0;
        for ($i=0; $i < $this->order + 1 ; $i++) {
            $lenght += $system[$i]->size + $system[$i]->space;
        }
        return '@-webkit-keyframes '. $this->name .'-'. $this->order .' {
          from {
            -webkit-transform: rotate(0deg) translateY(-'.$lenght.'px); }
          to {
            -webkit-transform: rotate(360deg) translateY(-'.$lenght.'px); } }

        @keyframes '. $this->name .'-'. $this->order .' {
          from {
            transform: rotate(0deg) translateY(-'.$lenght.'px); }
          to {
            transform: rotate(360deg) translateY(-'.$lenght.'px); } }';
    }

    public function generateObjectOrbiteCss($galaxyId)
    {
        $system = GalaxyHasSystemObjects::where('galaxy_id', '=', $galaxyId)
            ->join('system_object', 'galaxy_has_system_object.system_object_id', '=', 'system_object.id')
            ->join('system_object_size', 'system_object.size', '=', 'system_object_size.id')
            ->select('galaxy_has_system_object.order', 'system_object_size.size', 'system_object.space')
            ->get();
        $lenght = 0;
        for ($i=0; $i < $this->order + 1 ; $i++) {
            $lenght += $system[$i]->size + $system[$i]->space;
        }

        return '#orbit-'.$this->name.' {
              position: absolute;
              width: '.$lenght * 2  .'px;
              height: '.$lenght * 2 .'px;
              border-radius: 50%;
              border: 1px solid #50848f;
              margin-left: '.($this->galaxyLenght - $lenght * 2 ) /2  .'px;
              margin-top: '.($this->galaxyLenght - $lenght * 2 ) /2 .'px;
              transition: 0.5s ease-in-out;
              z-index: 1;}';
    }




}
