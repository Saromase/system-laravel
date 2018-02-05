<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GalaxyHasSystemObjects;

use App\Models\SystemObject;


class SystemCssController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function generateCss($galaxyId)
    {
        $object = GalaxyHasSystemObjects::join('system_object', 'galaxy_has_system_object.system_object_id', '=', 'system_object.id')
            ->join('system_object_size', 'system_object.size', '=', 'system_object_size.id')
            ->join('system_object_type', 'system_object.type', '=', 'system_object_type.id')
            ->join('system_object_color', 'system_object.color', '=', 'system_object_color.id')
            ->select('galaxy_has_system_object.order','system_object.name', 'system_object_size.name as size_name','system_object_size.size', 'system_object_color.code_hexadecimal', 'system_object_color.code_nuance', 'system_object_type.name as type')
            ->get();
        $css = 'body {  background-color: #000; }';
        $css .= '#galaxy {
            height: '.$object[0]->getGalaxyLenght().'px;
            width: '.$object[0]->getGalaxyLenght().'px;
            background-color: #000;
            display: block;
        transform: skewX(-25deg);}';

        foreach ($object as $value) {
            $css .= '#' . $value->name . '{';
            $css .= $value->generateObjectTypeCss();
            $css .= $value->generateObjectSizeCss();
            $css .= $value->generateObjectColorCss();
            if ($value->order != 0){
                $css .= $value->generateObjectAnimationCss();
            }
            $css .= '}';

            if ($value->order != 0){
                $css .= $value->generateObjectKeyFrameCss($galaxyId);
                if($value->type == 'planet'){
                    $css .= $value->generateObjectOrbiteCss($galaxyId);
                }
            }
        }

        return view('generate', [
            'objects' => $object,
            'css' => $css
        ]);

    }
}
