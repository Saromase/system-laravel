<?php

use Illuminate\Database\Seeder;

use App\Models\Galaxy;
use App\Models\GalaxyHasSystemObjects;
use App\Models\SystemObject;

class GalaxySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $galaxy = Galaxy::create([
            'name' => "Voie lactée"
        ]);

        $names = ['Sun', 'Mercury', 'Venus', 'Earth', 'Mars' ];
        for ($i = 0; $i <  5; $i++) {
            if ($i == 0) {
                $type = 2;
            } else {
                $type = 1;
            }
            $object = SystemObject::create([
                'name' => $names[$i],
                'type' => $type,
                'size' => rand(1,5),
                'color' => rand(1,3),
                'space' => rand(15,40)
            ]);

            GalaxyHasSystemObjects::create([
                'system_object_id' => $object->id,
                'galaxy_id' => $galaxy->id,
                'order' => $i
            ]);
        }

    }
}
