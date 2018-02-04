<?php

use Illuminate\Database\Seeder;

use App\Models\SystemObjectColor;

class SystemObjectColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            [
                'name' => 'red',
                'code_hexa' => '#400910',
                'code_nuance' => '#CC1D33'
            ],
            [
                'name' => 'blue',
                'code_hexa' => '#1B56CC',
                'code_nuance' => '#123B8C'
            ],
            [
                'name' => 'grey',
                'code_hexa' => '#2B3033',
                'code_nuance' => '#AEC0CC'
            ]
        ];

        foreach ($colors as $color) {
            SystemObjectColor::create([
                'name' => $color['name'],
                'code_hexadecimal' => $color['code_hexa'],
                'code_nuance' => $color['code_nuance']
            ]);

        }
    }
}
