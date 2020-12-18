<?php

namespace Modules\Profession\Controllers;

use Illuminate\Http\Request;
use Modules\FrontendController;
use Modules\Profession\Models\Professions;

class ProfessionController extends FrontendController
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

        $row = Professions::where('slug', $slug)->first();

        if (empty($page) || !$page->is_published) {
            abort(404);
        }
        $translation = $row->translateOrOrigin(app()->getLocale());

        $data = [
            'row' => $row,
            'translation' => $translation,
            'breadcrumbs' => [
                [
                    'name' => __('Professions'),
                    'url' => 'admin/module/professions'
                ],
            ],
            'seo_meta' => $row->getSeoMetaWithTranslation(app()->getLocale(), $translation),
            'body_class' => "page",
        ];
        return view('Profession::admin.detail', $data);
    }
}
