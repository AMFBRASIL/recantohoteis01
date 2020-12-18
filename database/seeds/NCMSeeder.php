<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NCMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = fopen(base_path('database/seeds/files/ncm.csv'), 'r');
        $now = date('Y-m-d h:i:s');
        while (($data = fgetcsv($file, 0, ";")) !== false) {
            DB::table('bravo_ncm')->insert([
                'code' => $data[0],
                'description' => trim($data[1]),
                'create_user' => 1,
                'created_at' => $now
            ]);
        }
    }
}
