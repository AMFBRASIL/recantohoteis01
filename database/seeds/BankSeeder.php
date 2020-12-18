<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $results = file_get_contents(base_path('database/seeds/files/bancos.json'));
        $results = json_decode($results, true);
        $now = date('Y-m-d h:i:s');
        foreach ($results as $result) {
            DB::table('core_bank')->insert([
                'ispb' => $result['ISPB'],
                'nome_reduzido' => strtoupper($result['Nome_Reduzido']),
                'numero_codigo' => $result['Número_Código'],
                'participa_da_compe' => $result['Participa_da_Compe'],
                'acesso_principal' => $result['Acesso_Principal'],
                'nome_extenso' => strtoupper($result['Nome_Extenso']),
                'inicio_da_operação' => $result['Início_da_Operação'],
                'create_user' => 1,
                'created_at' => $now
            ]);
        }
    }
}
