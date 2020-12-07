<?php

namespace Modules\Financial\Models;

use App\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends BaseModel
{
    use SoftDeletes;

    protected $table = 'core_bank';

    protected $fillable = [
        'ispb',
        'nome_reduzido',
        'numero_codigo',
        'participa_da_compe',
        'acesso_principal',
        'nome_extenso',
        'inicio_da_operação',
    ];
}
