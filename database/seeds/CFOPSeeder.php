<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CFOPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = fopen(base_path('database/seeds/files/cfop.csv'), 'r');
        $now = date('Y-m-d h:i:s');
        while (($data = fgetcsv($file, 0, ";")) !== false) {
            $desc = trim($data[1]);
            $desc = str_replace('"', '', $desc);
            DB::table('bravo_cfop')->insert([
                'code' => $data[0],
                'description' => $desc,
                'create_user' => 1,
                'created_at' => $now
            ]);
        }
    }
}
