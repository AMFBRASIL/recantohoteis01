<?php

namespace Modules\Stock\Models;

use Modules\Base\Models\Model;

class Budget extends Model
{
    public $type = 'budget';
    protected $table = 'bravo_budget';
    protected $modelName = Budget::class;
    protected $transClass = BudgetTranslation::class;
//    protected $fieldClone = "internal_content";

    protected $casts = [
        'supplier_composition' => 'array',
        'product_composition' => 'array',
    ];

    protected $budgetStatus = [
        'open'          => 'Cotacao Aberta',
        'aborted'       => 'Cotacao Abortada',
        'autorized'     => 'Autorizada para Compra',
        'in_progress'   => 'Compra em Andamento',
    ];

    protected $fillable = [
        'start_date',
        'end_date',
        'supplier_composition',
        'product_composition',
        'supplier_content',
        'internal_content',
        'send_adm_mail',
        'send_stock_mail',
        'send_suppliers_mail',
        'send_manager_mail',
        'is_purchase',
    ];

    public function getNameFormattedAttribute()
    {
        return sprintf('Cotação %07d', $this->id);
    }

    public function getTotalPriceAttribute()
    {
        $price = 0.00;
        foreach ($this->product_composition as $composition) {
            $price += str_replace(',', '.', str_replace('.','', $composition['price']));
        }

        $price = number_format($price, 2, ',', '.');
        return sprintf('R$: %s', $price);
    }

    public function getBudgetStatusFormattedAttribute()
    {
        return array_key_exists($this->budget_status, $this->budgetStatus)
            ? $this->budgetStatus[$this->budget_status]
            : '';
    }
}
