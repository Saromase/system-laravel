<?php

use Illuminate\Database\Seeder;

use App\Models\SystemObjectSize;

class SystemObjectSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = [
            'x-small' => 10,
            'small' => 20,
            'medium' => 30,
            'large' => 40,
            'x-large' => 50,
        ]; 

        foreach ($sizes as $key => $value) {
            SystemObjectSize::create([
                'name' => $key,
                'size' => $value
            ]);
        }
    }
}
