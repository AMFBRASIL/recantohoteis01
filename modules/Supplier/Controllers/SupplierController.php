<?php
namespace Modules\Event\Controllers;

use App\Http\Controllers\Controller;
use Modules\Event\Models\Event;
use Illuminate\Http\Request;
use Modules\Location\Models\Location;
use Modules\Review\Models\Review;
use Modules\Core\Models\Attributes;
use DB;

class SupplierController extends Controller
{
    protected $eventClass;
    protected $locationClass;
    public function __construct()
    {
        $this->eventClass = Event::class;
        $this->locationClass = Location::class;
    }

    public function callAction($method, $parameters)
    {
        if(!Event::isEnable())
        {
            return redirect('/');
        }
        return parent::callAction($method, $parameters); // TODO: Change the autogenerated stub
    }
    public function index(Request $request)
    {
        $is_ajax = $request->query('_ajax');
        $list = call_user_func([$this->eventClass,'search'],$request);
        $markers = [];
        if (!empty($list)) {
            foreach ($list as $row) {
                $markers[] = [
                    "id"      => $row->id,
                    "title"   => $row->title,
                    "lat"     => (float)$row->map_lat,
                    "lng"     => (float)$row->map_lng,
                    "gallery" => $row->getGallery(true),
                    "infobox" => view('Event::frontend.layouts.search.loop-gird', ['row' => $row,'disable_lazyload'=>1,'wrap_class'=>'infobox-item'])->render(),
                    'marker'  => url('images/icons/png/pin.png'),
                ];
            }
        }
        $limit_location = 15;
        if( empty(setting_item("event_location_search_style")) or setting_item("event_location_search_style") == "normal" ){
            $limit_location = 1000;
        }
        $data = [
            'rows'               => $list,
            'list_location'      => $this->locationClass::where('status', 'publish')->limit($limit_location)->with(['translations'])->get()->toTree(),
            'event_min_max_price' => $this->eventClass::getMinMaxPrice(),
            'markers'            => $markers,
            "blank"              => 1,
            "seo_meta"           => $this->eventClass::getSeoMetaForPageList()
        ];
        $layout = setting_item("event_layout_search", 'normal');
        if ($request->query('_layout')) {
            $layout = $request->query('_layout');
        }
        if ($is_ajax) {
            return $this->sendSuccess([
                'html'    => view('Event::frontend.layouts.search-map.list-item', $data)->render(),
                "markers" => $data['markers']
            ]);
        }
        $data['attributes'] = Attributes::where('service', 'event')->with(['terms','translations'])->get();

        if ($layout == "map") {
            $data['body_class'] = 'has-search-map';
            $data['html_class'] = 'full-page';
            return view('Event::frontend.search-map', $data);
        }
        return view('Event::frontend.search', $data);
    }

    public function detail(Request $request, $slug)
    {
        $row = $this->eventClass::where('slug', $slug)->with(['location','translations','hasWishList'])->first();;
        if ( empty($row) or !$row->hasPermissionDetailView()) {
            return redirect('/');
        }
        $translation = $row->translateOrOrigin(app()->getLocale());
        $event_related = [];
        $location_id = $row->location_id;
        if (!empty($location_id)) {
            $event_related = $this->eventClass::where('location_id', $location_id)->where("status", "publish")->take(4)->whereNotIn('id', [$row->id])->with(['location','translations','hasWishList'])->get();
        }
        $review_list = $row->getReviewList();
        $data = [
            'row'          => $row,
            'translation'       => $translation,
            'event_related' => $event_related,
            'booking_data' => $row->getBookingData(),
            'review_list'  => $review_list,
            'seo_meta'  => $row->getSeoMetaWithTranslation(app()->getLocale(),$translation),
            'body_class'=>'is_single'
        ];
        $this->setActiveMenu($row);
        return view('Event::frontend.detail', $data);
    }
}
