<?php

namespace App\Http\Controllers;

use App\Models\Amenities;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Builder;
use App\Models\CareerJobs;
use App\Models\City;
use App\Models\Property;
use Illuminate\Http\Request;
use DB;
use Artisan;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use App\Models\NewsUpdate;
class FrontController extends Controller
{
    function index()
    {

        Artisan::call('cache:clear');
        /*Artisan::call('route:cache');
         Artisan::call('config:cache');
         Artisan::call('view:clear');*/

        $data['hot_selling_projects'] = Property::select('property.title', 'property.slug', 'property.type', 'property.image', 'property.price', 'property.area', 'builders.title as builder', 'city.title as city', 'location.title as location')
            ->leftJoin('builders', 'property.builder', '=', 'builders.id')
            ->leftJoin('city', 'property.city', '=', 'city.id')
            ->leftJoin('location', 'property.location', '=', 'location.id')
            ->where(['property.status' => '1', 'property.hot_property' => 'yes'])->orderBy('property.sequence', 'asc')->limit(4)->get();

        $data['popular_city'] = City::select('city.*', DB::raw("( select count(property.city) from property where city.id = property.city ) as total_property"))->where(['city.status' => '1'])->orderBy('city.sequence', 'ASC')->limit(4)->get();
        $data['new_launch_projects'] = Property::select('property.title', 'property.slug', 'property.type', 'property.image', 'property.price', 'property.area', 'builders.title as builder', 'city.title as city', 'location.title as location')
            ->leftJoin('builders', 'property.builder', '=', 'builders.id')
            ->leftJoin('city', 'property.city', '=', 'city.id')
            ->leftJoin('location', 'property.location', '=', 'location.id')
            ->where(['property.status' => '1', 'property.new_launched' => 'yes'])->orderBy('property.id', 'desc')->limit(6)->get();
        $data['blogs'] = Blog::where(['status' => 'Active'])->orderBy('id', 'desc')->limit(3)->get();
        $data['builder'] = Builder::where(['status' => '1', 'display_home' => 'yes'])->orderBy('id', 'desc')->limit(10)->get();
        $data['city'] = City::where(['city.status' => '1'])->orderBy('sequence', 'ASC')->get();
        return view('home', $data);
    }

    function about_us()
    {
        return view('about-us');
    }
    function contact_us()
    {
        return view('contact-us');
    }
    function developer_listing()
    {
        $data['builder'] = Builder::where(['status' => '1'])->orderBy('id', 'asc')->get();
        return view('developer-listing', $data);
    }
    function developer_profile($slug)
    {
        $developer = Builder::where(['slug' => $slug])->orderBy('id', 'asc')->first();
        $data['builder'] = $developer;
        $data['developer_property_listing'] = $data['new_launch_projects'] = Property::select('property.title', 'property.slug', 'property.type', 'property.image', 'property.price', 'property.area', 'city.title as city', 'location.title as location')
            ->leftJoin('city', 'property.city', '=', 'city.id')
            ->leftJoin('location', 'property.location', '=', 'location.id')
            ->where(['property.status' => '1', 'property.builder' => $developer->id])->orderBy('property.id', 'desc')->get();
        return view('developer-profile', $data);
    }
    function city_listing()
    {
        $data['city'] = City::select('city.*', DB::raw("( select count(property.city) from property where city.id = property.city ) as total_property"))->where(['city.status' => '1'])->orderBy('city.sequence', 'ASC')->get();
        return view('city-listing', $data);
    }
    function blog_listing()
    {
        $data['market_insights'] = Blog::where(['status' => 'Active', 'category_id' => '3'])->orderBy('id', 'desc')->limit(100)->get();
        $data['buying_guides'] = Blog::where(['status' => 'Active', 'category_id' => '1'])->orderBy('id', 'desc')->limit(100)->get();
        $data['blogs'] = Blog::where(['status' => 'Active'])->orderBy('id', 'desc')->limit(100)->get();
        $data['category'] = BlogCategory::where(['status' => 'Active'])->orderBy('id', 'desc')->get();
        return view('blog-listing', $data);
    }

    function property_listing($type = '')
    {
        $type = (isset($type) && $type == 'residential-plots') ? $type = 'Residential Plots' : $type;
        $search = (isset($_GET['q']) && !empty($_GET['q'])) ? $_GET['q'] : '';
        $city_id = (isset($_GET['city']) && !empty($_GET['city'])) ? $_GET['city'] : '';
        if (isset($_GET['type']) && $_GET['type'] == 'residential-plots') {
            $_GET['type'] = "";
        }
        $type = (isset($_GET['type']) && !empty($_GET['type'])) ? $_GET['type'] : $type;
        $_GET['type'] = $type;
        $budget = (isset($_GET['budget']) && !empty($_GET['budget'])) ? $_GET['budget'] : '';
        $data['property_data'] = $data['new_launch_projects'] = Property::select('property.title', 'property.slug', 'property.type', 'property.image', 'property.price', 'property.area', 'city.title as city', 'location.title as location', 'builders.title as builder', 'builders.slug as builder_slug')
            ->leftJoin('builders', 'property.builder', '=', 'builders.id')
            ->leftJoin('city', 'property.city', '=', 'city.id')
            ->leftJoin('location', 'property.location', '=', 'location.id')
            ->where(['property.status' => '1'])->orderBy('property.id', 'desc')
            ->where(function ($query) use ($search, $city_id, $type, $budget) {
                if (!empty($search)) {
                    $query->where('property.title', 'LIKE', '%' . $search . '%');
                    $query->orWhere('property.overview', 'like', '%' . $search . '%');
                }
                if (!empty($city_id)) {
                    $query->where(['property.city' => $city_id]);
                }

                if (!empty($type)) {
                    $query->where(['property.type' => $type]);
                }
                if (isset($budget) && !empty($budget)) {
                    $budget_v = explode("-", $budget);
                    $query->whereBetween('property.filter_price', [$budget_v[0], $budget_v[1]]);
                }

            })->paginate(12);
        $data['city'] = City::getCItyData();
        $data['type'] = $type;
        return view('property-listing', $data);
    }

    function custom_property($param = '')
    {
        $routeInfo = \Route::current();
        $uri = $routeInfo->uri;
        $search = (isset($_GET['q']) && !empty($_GET['q'])) ? $_GET['q'] : '';
        $city_id = (isset($_GET['city']) && !empty($_GET['city'])) ? $_GET['city'] : '';
        $type = (isset($_GET['type']) && !empty($_GET['type'])) ? $_GET['type'] : '';
        $_GET['type'] = $type;
        $budget = (isset($_GET['budget']) && !empty($_GET['budget'])) ? $_GET['budget'] : '';
        $data['property_data'] = $data['new_launch_projects'] = Property::select('property.title', 'property.slug', 'property.type', 'property.image', 'property.price', 'property.area', 'city.title as city', 'location.title as location', 'builders.title as builder', 'builders.slug as builder_slug')
            ->leftJoin('builders', 'property.builder', '=', 'builders.id')
            ->leftJoin('city', 'property.city', '=', 'city.id')
            ->leftJoin('location', 'property.location', '=', 'location.id')
            ->where(['property.status' => '1'])->orderBy('property.id', 'desc')
            ->where(function ($query) use ($search, $city_id, $type, $budget, $uri) {
                if (!empty($search)) {
                    $query->where('property.title', 'LIKE', '%' . $search . '%');
                    $query->orWhere('property.overview', 'like', '%' . $search . '%');
                }
                if (!empty($city_id)) {
                    $query->where(['property.city' => $city_id]);
                }

                if (!empty($type)) {
                    $query->where(['property.type' => $type]);
                }
                if (isset($budget) && !empty($budget)) {
                    $budget_v = explode("-", $budget);
                    $query->whereBetween('property.filter_price', [$budget_v[0], $budget_v[1]]);
                }
                if ($uri == 'newly-launched-projects') {
                    $query->where(['property.new_launched' => 'yes']);
                }
                if ($uri == 'hot-selling-projects') {
                    $query->where(['property.hot_property' => 'yes']);
                }

            })->paginate(12);
        $data['city'] = City::getCItyData();

        if ($uri == 'newly-launched-projects') {
            $data['heading'] = "Newly Launched Projects";
            $data['sub_heading'] = "";
        }
        if ($uri == 'hot-selling-projects') {
            $data['heading'] = "Hottest Selling Projects";
            $data['sub_heading'] = "Discover our well-crafted properties for sale in Gurgaon, opening the door to a world of sophistication that surpasses all expectations.";
        }
        return view('property-custom-listing', $data);
    }

    function awards()
    {
        return view('awards-listing');
    }

    function property_listing_by_city($city = '')
    {
        $cityData = DB::table('city')->select('id', 'title', 'slug', 'description')->where(['status' => '1', 'slug' => ($city === 'all') ? 'gurugram' : $city])->first();
        $search = (isset($_GET['q']) && !empty($_GET['q'])) ? $_GET['q'] : '';
        $city_id = (isset($_GET['city']) && !empty($_GET['city'])) ? $_GET['city'] : $cityData->id;
        $type = (isset($_GET['type']) && !empty($_GET['type'])) ? $_GET['type'] : '';
        $budget = (isset($_GET['budget']) && !empty($_GET['budget'])) ? $_GET['budget'] : '';
        $_GET['city'] = $city_id;

        $data['property_data'] = $data['new_launch_projects'] = Property::select('property.title', 'property.slug', 'property.type', 'property.image', 'property.price', 'property.area', 'city.title as city', 'location.title as location', 'builders.title as builder', 'builders.slug as builder_slug')
            ->leftJoin('builders', 'property.builder', '=', 'builders.id')
            ->leftJoin('city', 'property.city', '=', 'city.id')
            ->leftJoin('location', 'property.location', '=', 'location.id')
            ->where(['property.status' => '1'])->orderBy('property.id', 'desc')
            ->where(function ($query) use ($search, $city_id, $type, $budget) {
                if (!empty($search)) {
                    $query->where('property.title', 'LIKE', '%' . $search . '%');
                    $query->orWhere('property.overview', 'like', '%' . $search . '%');
                }
                if (!empty($city_id)) {
                    $query->where(['property.city' => $city_id]);
                }
                if (!empty($type)) {
                    $query->where(['property.type' => $type]);
                }
                if (isset($budget) && !empty($budget)) {
                    $budget_v = explode("-", $budget);
                    $query->whereBetween('property.filter_price', [$budget_v[0], $budget_v[1]]);
                }
            })->paginate(12);

        $data['city'] = City::getCItyData();
        $data['city_data'] = $cityData;
        return view('property-listing-by-city', $data);
    }


    function blog_details($slug)
    {
        $data['recent_listing'] = Blog::where(['status' => 'Active'])->orderBy('id', 'desc')->limit(9)->get();
        $data['blog'] = Blog::where(['status' => 'Active', 'slug' => $slug])->first();
        //$data['category'] = BlogCategory::where(['status'=>'Active'])->orderBy('id', 'desc')->get();
        if (!isset($data['blog']->id)) //Check if the blog exists.
        {
            return redirect('/', 301); //Make a redirect
        }
        $data['top_rated_projects'] = Property::select('property.title', 'property.slug', 'property.type', 'property.image', 'property.price', 'property.area', 'builders.title as builder', 'city.title as city', 'location.title as location')
            ->leftJoin('builders', 'property.builder', '=', 'builders.id')
            ->leftJoin('city', 'property.city', '=', 'city.id')
            ->leftJoin('location', 'property.location', '=', 'location.id')
            ->where(['property.status' => '1'])
            ->where(function ($query) {
                $query->where('property.new_launched', 'yes')
                    ->orWhere('property.hot_property', 'yes');
            })
            ->orderByRaw("RAND()")->limit(8)->get();
        return view('blog-details', $data);
    }

    function property_details($slug)
    {
        $property = Property::select('property.*', 'city.title as city', 'location.title as location', 'builders.title as builder', 'builders.image as builder_image', 'builders.description as builder_desc', 'builders.location as builder_location', 'ps.title as pro_status')
            ->leftJoin('builders', 'property.builder', '=', 'builders.id')
            ->leftJoin('city', 'property.city', '=', 'city.id')
            ->leftJoin('location', 'property.location', '=', 'location.id')
            ->leftJoin('project_status as ps', 'property.property_status', '=', 'ps.id')
            ->where(['property.status' => '1', 'property.slug' => $slug])
            ->first();
        if (!isset($property->id)) //Check if the product exists.
        {
            return redirect('/', 301); //Make a redirect
        }
        $data['recent_listing'] = Property::where(['status' => 'Active'])->orderBy('id', 'desc')->limit(9)->get();
        $data['result'] = $property;
        $data['gallery'] = DB::table('tbl_property_gallery')->where(['pro_id' => $property->id])->get();
        $amenitie_ids = (!empty($property->amenities)) ? explode(',', $property->amenities) : array();
        $data['amenities'] = DB::table('amenities')->whereIn('id', $amenitie_ids)->get();
        $data['price_list'] = DB::table('tbl_property_price_list')->where(['pro_id' => $property->id])->get();
        $data['que_ans'] = DB::table('tbl_property_que_ans')->where(['pro_id' => $property->id])->get();
        $data['top_rated_projects'] = Property::select('property.title', 'property.slug', 'property.type', 'property.image', 'property.price', 'property.area', 'builders.title as builder', 'city.title as city', 'location.title as location')
            ->leftJoin('builders', 'property.builder', '=', 'builders.id')
            ->leftJoin('city', 'property.city', '=', 'city.id')
            ->leftJoin('location', 'property.location', '=', 'location.id')
            ->where(['property.status' => '1'])
            ->where(function ($query) {
                $query->where('property.new_launched', 'yes')
                    ->orWhere('property.hot_property', 'yes');
            })
            ->orderByRaw("RAND()")->limit(8)->get();
        return view('property-details', $data);
    }


    public function saveEnquiryData(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        if (isset($request->title)) {
            $daveData['title'] = $request->title;
        }
        $daveData['name'] = $request->name;
        $daveData['email'] = $request->email;
        $daveData['phone'] = $request->phone;
        if (isset($request->message)) {
            $daveData['message'] = $request->message;
        }
        $daveData['created_at'] = Carbon::now();
        DB::table('enquiry')->insert($daveData);

        /* start send mail */
        $_POST['title'] = 'EliteEdge Legacy Website - Enquiry';
        $_POST['to_mail'] = 'mehtasanyam1992@gmail.com';
        //$_POST['to_mail'] = 'anaseem711@gmail.com';
        $postParameter = $_POST;
        $curlHandle = curl_init('https://lightgray-squirrel-694334.hostingersite.com/real-estate-send-mail.php');
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $postParameter);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
        $curlResponse = curl_exec($curlHandle);
        curl_close($curlHandle);
        /* end send mail */

        return redirect()->back()->with('success', 'Thank You for your enquiry. We will get back shortly. !');
    }

    function career()
    {
        $data['jobs'] = CareerJobs::where(['status' => '1'])->orderBy('id', 'desc')->get();
        return view('career', $data);
    }

    public function saveJobData(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'resume' => 'mimes:png,jpg,jpeg,pdf,doc,pdf,docx,zip',
        ]);

        if ($request->hasFile('resume')) {
            $file_name = time() . '_.' . $request->resume->extension();
            $request->resume->move(public_path('uploads/resume'), $file_name);
        } else {
            $file_name = '';
        }
        $daveData['name'] = $request->name;
        $daveData['email'] = $request->email;
        $daveData['phone'] = $request->phone;
        $daveData['department'] = $request->department;
        $daveData['experience'] = $request->experience;
        $daveData['ctc'] = $request->ctc;
        $daveData['resume'] = $file_name;
        $daveData['created_at'] = Carbon::now();
        DB::table('enquiry_jobs')->insert($daveData);
        return redirect()->to('career')->with('success', 'Thank You for your interest. We will get back shortly. !');
    }

    function news_events()
    {
        $data['news'] = NewsUpdate::where(['status' => '1'])->orderBy('id', 'desc')->paginate(9);
        return view('news_events', $data);
    }
    function terms_condition()
    {
        return view('terms_condition');
    }
    function privacy_policy()
    {
        return view('privacy_policy');
    }
    function faq()
    {
        return view('faq');
    }

    public function sitemap()
    {
        $PropertyData = DB::table('property')->select('slug', 'created_at')->where(['status' => '1'])->get();
        $BlogData = DB::table('blogs')->select('slug', 'created_at')->where(['status' => '1'])->get();
        $BuilderData = Builder::select('slug', 'created_at')->where(['status' => '1'])->get();
        $cityData = City::getCItyData();
        return response()->view('sitemap', ['property' => $PropertyData, 'blog' => $BlogData, 'builder' => $BuilderData, 'city' => $cityData])->header('Content-Type', 'text/xml');
    }

}