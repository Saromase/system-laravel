<?php

use Illuminate\Database\Seeder;

use App\Models\SystemObjectType;

class SystemObjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['planet', 'star'];

        foreach ($types as $type) {
            SystemObjectType::create([
                'name' => $type
            ]);
        }
    }
}
