<?php

use Illuminate\Support\Facades\Route;

/* start admin routes */
Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware'=>['auth']], function(){

    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
    Route::get('/change-password', [App\Http\Controllers\AdminController::class, 'changePassword']);
    Route::get('/updatePassword', [App\Http\Controllers\AdminController::class, 'updatePassword']);

    Route::get('/admin/testimonial/listing',[App\Http\Controllers\admin\TestimonialController::class,'index']);
    Route::get('/admin/testimonial/create',[App\Http\Controllers\admin\TestimonialController::class,'create']);
    Route::post('/admin/testimonial/store',[App\Http\Controllers\admin\TestimonialController::class,'store']);
    Route::get('/admin/testimonial/edit/{id}',[App\Http\Controllers\admin\TestimonialController::class,'edit']);
    Route::post('/admin/testimonial/update/{id}',[App\Http\Controllers\admin\TestimonialController::class,'update']);
    Route::get('/admin/testimonial/delete/{id}',[App\Http\Controllers\admin\TestimonialController::class,'destroy']);

    Route::get('/admin/metatag/listing',[App\Http\Controllers\admin\MetatagController::class,'index']);
    Route::get('/admin/metatag/create',[App\Http\Controllers\admin\MetatagController::class,'create']);
    Route::post('/admin/metatag/store',[App\Http\Controllers\admin\MetatagController::class,'store']);
    Route::get('/admin/metatag/edit/{id}',[App\Http\Controllers\admin\MetatagController::class,'edit']);
    Route::post('/admin/metatag/update/{id}',[App\Http\Controllers\admin\MetatagController::class,'update']);
    Route::get('/admin/metatag/delete/{id}',[App\Http\Controllers\admin\MetatagController::class,'destroy']);

    Route::get('/admin/blog_category/listing',[App\Http\Controllers\admin\BlogCategoryController::class,'index']);
    Route::get('/admin/blog_category/create',[App\Http\Controllers\admin\BlogCategoryController::class,'create']);
    Route::post('/admin/blog_category/store',[App\Http\Controllers\admin\BlogCategoryController::class,'store']);
    Route::get('/admin/blog_category/edit/{id}',[App\Http\Controllers\admin\BlogCategoryController::class,'edit']);
    Route::post('/admin/blog_category/update/{id}',[App\Http\Controllers\admin\BlogCategoryController::class,'update']);
    Route::get('/admin/blog_category/delete/{id}',[App\Http\Controllers\admin\BlogCategoryController::class,'destroy']);

    Route::get('/admin/blog/listing',[App\Http\Controllers\admin\BlogController::class,'index']);
    Route::get('/admin/blog/create',[App\Http\Controllers\admin\BlogController::class,'create']);
    Route::post('/admin/blog/store',[App\Http\Controllers\admin\BlogController::class,'store']);
    Route::get('/admin/blog/edit/{id}',[App\Http\Controllers\admin\BlogController::class,'edit']);
    Route::post('/admin/blog/update/{id}',[App\Http\Controllers\admin\BlogController::class,'update']);
    Route::get('/admin/blog/delete/{id}',[App\Http\Controllers\admin\BlogController::class,'destroy']);

    Route::get('/admin/user/listing',[App\Http\Controllers\AdminController::class,'listing']);
    Route::get('/admin/user/create',[App\Http\Controllers\AdminController::class,'create']);
    Route::post('/admin/user/store',[App\Http\Controllers\AdminController::class,'store']);
    Route::get('/admin/user/edit/{id}',[App\Http\Controllers\AdminController::class,'edit']);
    Route::post('/admin/user/update/{id}',[App\Http\Controllers\AdminController::class,'update']);
    Route::get('/admin/user/delete/{id}',[App\Http\Controllers\AdminController::class,'destroy']);
 
    Route::get('/admin/builder/listing', [App\Http\Controllers\admin\BuilderController::class, 'index']);//->name('home');
    Route::get('/admin/builder/create', [App\Http\Controllers\admin\BuilderController::class, 'create']);
    Route::post('/admin/builder/store', [App\Http\Controllers\admin\BuilderController::class, 'store']);
    Route::get('/admin/builder/edit/{id}', [App\Http\Controllers\admin\BuilderController::class, 'edit']);
    Route::post('/admin/builder/update/{id}', [App\Http\Controllers\admin\BuilderController::class, 'update']);
    Route::get('/admin/builder/delete/{id}', [App\Http\Controllers\admin\BuilderController::class, 'destroy']);

    Route::get('/admin/city/listing', [App\Http\Controllers\admin\CityController::class, 'index']);
    Route::get('/admin/city/create', [App\Http\Controllers\admin\CityController::class, 'create']);
    Route::post('/admin/city/store', [App\Http\Controllers\admin\CityController::class, 'store']);
    Route::get('/admin/city/edit/{id}', [App\Http\Controllers\admin\CityController::class, 'edit']);
    Route::post('/admin/city/update/{id}', [App\Http\Controllers\admin\CityController::class, 'update']);
    Route::get('/admin/city/delete/{id}', [App\Http\Controllers\admin\CityController::class, 'destroy']);

    Route::get('/admin/location/listing', [App\Http\Controllers\admin\LocationController::class, 'index']);
    Route::get('/admin/location/create', [App\Http\Controllers\admin\LocationController::class, 'create']);
    Route::post('/admin/location/store', [App\Http\Controllers\admin\LocationController::class, 'store']);
    Route::get('/admin/location/edit/{id}', [App\Http\Controllers\admin\LocationController::class, 'edit']);
    Route::post('/admin/location/update/{id}', [App\Http\Controllers\admin\LocationController::class, 'update']);
    Route::get('/admin/location/delete/{id}', [App\Http\Controllers\admin\LocationController::class, 'destroy']);

    Route::get('/admin/amenities/listing', [App\Http\Controllers\admin\AmenitiesController::class, 'index']);
    Route::get('/admin/amenities/create', [App\Http\Controllers\admin\AmenitiesController::class, 'create']);
    Route::post('/admin/amenities/store', [App\Http\Controllers\admin\AmenitiesController::class, 'store']);
    Route::get('/admin/amenities/edit/{id}', [App\Http\Controllers\admin\AmenitiesController::class, 'edit']);
    Route::post('/admin/amenities/update/{id}', [App\Http\Controllers\admin\AmenitiesController::class, 'update']);
    Route::get('/admin/amenities/delete/{id}', [App\Http\Controllers\admin\AmenitiesController::class, 'destroy']);

    Route::get('/admin/property/listing', [App\Http\Controllers\admin\PropertyController::class, 'index']);
    Route::get('/admin/property/create', [App\Http\Controllers\admin\PropertyController::class, 'create']);
    Route::post('/admin/property/store', [App\Http\Controllers\admin\PropertyController::class, 'store']);
    Route::get('/admin/property/edit/{id}', [App\Http\Controllers\admin\PropertyController::class, 'edit']);
    Route::post('/admin/property/update/{id}', [App\Http\Controllers\admin\PropertyController::class, 'update']);
    Route::get('/admin/property/delete/{id}', [App\Http\Controllers\admin\PropertyController::class, 'destroy']);
    Route::get('/admin/property/destroy_gallery/{id}/{pid}', [App\Http\Controllers\admin\PropertyController::class, 'destroy_gallery']);
    Route::get('/admin/property/destroy_unit_data/{id}/{pid}', [App\Http\Controllers\admin\PropertyController::class, 'destroy_unit_data']);
    Route::get('/admin/property/destroy_que_ans_data/{id}/{pid}', [App\Http\Controllers\admin\PropertyController::class, 'destroy_que_ans_data']);


    Route::get('/admin/jobs/listing', [App\Http\Controllers\admin\CareerJobsController::class, 'index']);
    Route::get('/admin/jobs/create', [App\Http\Controllers\admin\CareerJobsController::class, 'create']);
    Route::post('/admin/jobs/store', [App\Http\Controllers\admin\CareerJobsController::class, 'store']);
    Route::get('/admin/jobs/edit/{id}', [App\Http\Controllers\admin\CareerJobsController::class, 'edit']);
    Route::post('/admin/jobs/update/{id}', [App\Http\Controllers\admin\CareerJobsController::class, 'update']);
    Route::get('/admin/jobs/delete/{id}', [App\Http\Controllers\admin\CareerJobsController::class, 'destroy']);
    
    Route::get('/admin/enquiry/listing', [App\Http\Controllers\admin\EnquiryController::class, 'property_enquiry']);
    Route::get('/admin/job_enquiry/listing', [App\Http\Controllers\admin\EnquiryController::class, 'job_enquiry']);
    
    Route::get('/admin/socialconnect/listing', [App\Http\Controllers\admin\SocialconnectController::class, 'index']);//->name('home');
    Route::get('/admin/socialconnect/create', [App\Http\Controllers\admin\SocialconnectController::class, 'create']);
    Route::post('/admin/socialconnect/store', [App\Http\Controllers\admin\SocialconnectController::class, 'store']);
    Route::get('/admin/socialconnect/edit/{id}', [App\Http\Controllers\admin\SocialconnectController::class, 'edit']);
    Route::post('/admin/socialconnect/update/{id}', [App\Http\Controllers\admin\SocialconnectController::class, 'update']);
    Route::get('/admin/socialconnect/destroy/{id}', [App\Http\Controllers\admin\SocialconnectController::class, 'destroy']);
    
    
    Route::get('/admin/lifeatelitepro/listing', [App\Http\Controllers\admin\LifeateliteproController::class, 'index']);//->name('home');
    Route::get('/admin/lifeatelitepro/create', [App\Http\Controllers\admin\LifeateliteproController::class, 'create']);
    Route::post('/admin/lifeatelitepro/store', [App\Http\Controllers\admin\LifeateliteproController::class, 'store']);
    Route::get('/admin/lifeatelitepro/edit/{id}', [App\Http\Controllers\admin\LifeateliteproController::class, 'edit']);
    Route::post('/admin/lifeatelitepro/update/{id}', [App\Http\Controllers\admin\LifeateliteproController::class, 'update']);
    Route::get('/admin/lifeatelitepro/destroy/{id}', [App\Http\Controllers\admin\LifeateliteproController::class, 'destroy']);
    
    Route::get('/admin/news_update/listing', [App\Http\Controllers\admin\NewsUpdateController::class, 'index']);//->name('home');
    Route::get('/admin/news_update/create', [App\Http\Controllers\admin\NewsUpdateController::class, 'create']);
    Route::post('/admin/news_update/store', [App\Http\Controllers\admin\NewsUpdateController::class, 'store']);
    Route::get('/admin/news_update/edit/{id}', [App\Http\Controllers\admin\NewsUpdateController::class, 'edit']);
    Route::post('/admin/news_update/update/{id}', [App\Http\Controllers\admin\NewsUpdateController::class, 'update']);
    Route::get('/admin/news_update/destroy/{id}', [App\Http\Controllers\admin\NewsUpdateController::class, 'destroy']);


    /* start admin ajax routes */
    Route::post('/admin/ajax/get_model_by_brand',[App\Http\Controllers\AjaxController::class,'getModelByBrand']);
    Route::post('/admin/ajax/get_variant_by_model',[App\Http\Controllers\AjaxController::class,'getVariantByModel']);
    Route::post('/admin/ajax/get_location_data',[App\Http\Controllers\AjaxController::class,'getLocationByCity']);
    /* end admin ajax routes */
});
Route::get('admin', function () {
    return view('auth/login');
});
/* end admin routes */



// Route::get('/', function () {
//     return view('welcome');
// });

// front routes
Route::get('/',[App\Http\Controllers\FrontController::class,'index']);
Route::get('/about-us',[App\Http\Controllers\FrontController::class,'about_us']);
Route::get('/contact-us',[App\Http\Controllers\FrontController::class,'contact_us']);
Route::get('/developer',[App\Http\Controllers\FrontController::class,'developer_listing']);
Route::get('/city',[App\Http\Controllers\FrontController::class,'city_listing']);
Route::get('/blog',[App\Http\Controllers\FrontController::class,'blog_listing']);
Route::get('/blog-details/{slug}',[App\Http\Controllers\FrontController::class,'blog_details']);

Route::get('/developer/{slug}',[App\Http\Controllers\FrontController::class,'developer_profile']);
Route::get('/awards-recognition',[App\Http\Controllers\FrontController::class,'awards']);

Route::get('/property-in-{city}',[App\Http\Controllers\FrontController::class,'property_listing_by_city']);
Route::get('/property/{type}',[App\Http\Controllers\FrontController::class,'property_listing']);

Route::get('/hot-selling-projects',[App\Http\Controllers\FrontController::class,'custom_property']);
Route::get('/newly-launched-projects',[App\Http\Controllers\FrontController::class,'custom_property']);

Route::get('/property-details/{slug}',[App\Http\Controllers\FrontController::class,'property_details']);


Route::post('/saveEnquiryData',[App\Http\Controllers\FrontController::class,'saveEnquiryData']);


Route::get('/career',[App\Http\Controllers\FrontController::class,'career']);
Route::post('/saveJobData',[App\Http\Controllers\FrontController::class,'saveJobData']);

Route::get('/news-events',[App\Http\Controllers\FrontController::class,'news_events']); 
Route::get('/terms-conditions',[App\Http\Controllers\FrontController::class,'terms_condition']); 
Route::get('/privacy-policy',[App\Http\Controllers\FrontController::class,'privacy_policy']); 
Route::get('/faq',[App\Http\Controllers\FrontController::class,'faq']); 
Route::get('/sitemap.xml', [App\Http\Controllers\FrontController::class, 'sitemap']);