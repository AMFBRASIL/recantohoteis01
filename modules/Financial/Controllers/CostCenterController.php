<?php

namespace Modules\Financial\Controllers;

use Illuminate\Http\Request;
use Modules\Financial\Models\CostCenter;
use Modules\FrontendController;

class CostCenterController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request, $slug)
    {

    }

    public function detail()
    {
        $slug = request()->route('slug');

        $row = CostCenter::query()->where('slug', $slug)->first();

        if (empty($page) || !$page->is_published) {
            abort(404);
        }
        $translation = $row->translateOrOrigin(app()->getLocale());

        $data = [
            'row' => $row,
            'translation' => $translation,
            'breadcrumbs' => [
                [
                    'name' => __('Financial'),
                    'url' => 'admin/module/financial'
                ],
            ],
            'seo_meta' => $row->getSeoMetaWithTranslation(app()->getLocale(), $translation),
            'body_class' => "page",
        ];
        return view('Financial::admin.costCenter.detail', $data);
    }
}
