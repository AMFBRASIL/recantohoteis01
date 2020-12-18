<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $results = file_get_contents(base_path('database/seeds/files/cest.json'));
        $results = json_decode($results, true);
        $now = date('Y-m-d h:i:s');
        foreach ($results as $result) {
            DB::table('bravo_cest')->insert([
                'id'            => $result['id'],
                'code'          => $result['codigo'],
                'description'   => trim($result['descricao']),
                'create_user'   => 1,
                'created_at'    => $now
            ]);
        }
    }
}
