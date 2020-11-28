<?php

namespace Modules\Company\Models;

use Modules\Base\Models\Model;

class Company extends Model
{
    public $type = 'company';
    protected $table = 'bravo_company';
    protected $modelName = Company::class;
    protected $transClass = CompanyTranslation::class;
    protected $fieldClone = "title";

    protected $fillable = [
        'title',
        'contact',
        'person_type',
        'document',
        'state_registration',
        'city_registration',
        'taxpayer',
        'birthdate',

        // Address
        'zipcode',
        'street_name',
        'street_number',
        'neighborhood',
        'complement',
        'city',
        'state',

        // Contact
        'home_number',
        'phone_number',
        'whatsapp',
        'website',
        'email',
        'contact_name',
        'contact_complement',
        'comments',

        // Config
        'is_simples',
        'issues_nfe',
        'issues_nfce',
        'issues_sat',
        'has_digital_certificate',
        'has_digital_counter',
        'issues_sped',
        'is_main',

        // Images
        'image_id',

        // Role configs
        'status',
    ];

    public function __toString()
    {
        return sprintf('%s', $this->title);
    }

    public function getPersonTypeFormattedAttribute()
    {
        if (! $this->person_type) {
            return '';
        }

        return $this->person_type == 1 ? 'PJ' : 'PF';
    }
}
