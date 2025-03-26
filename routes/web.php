<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\XmlController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Middleware\HasValidCaptcha;

/* 
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::domain(config('settings.routes.domain'))->middleware(['wwwRedirect'])->group(function () {
   


Route::get('/email/verify/{hash}', [App\Http\Controllers\Auth\RegisterController::class,'email_verify'])->name('email/verify');

Route::get('/user-thanks', function () {return view('thanks'); });
Route::get('/posts', [CartController::class, 'language']);
#XML LIST
Route::get('sitemap.xml',[XmlController::class,'sitemap']);
Route::get('press-release.xml',[XmlController::class,'xml_press_release']);
Route::get('infographics.xml',[XmlController::class,'xml_infographics']);
Route::get('other-pages.xml',[XmlController::class,'xml_others']);
Route::get('/read-more',[HomeController::class,'read_more']);
Route::get('create-transaction', [PaypalController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [PaypalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PaypalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PaypalController::class, 'cancelTransaction'])->name('cancelTransaction');
Route::post('/update_user_info', [UserController::class, 'update_user_info']);
Route::post('/inquiry', [UserController::class, 'save_inquiry']);
Route::post('/del_inquiry', [UserController::class, 'del_inquiry']);



Route::get('/signin',[HomeController::class,'signin'])->name('signin');
Route::get('/signup',[HomeController::class,'signin'])->name('signup');
Route::post('/signin',[App\Http\Controllers\Auth\RegisterController::class,'login'])->name('signin')->middleware(HasValidCaptcha::class);
Route::post('/signup',[App\Http\Controllers\Auth\RegisterController::class,'create'])->name('signup')->middleware(HasValidCaptcha::class);
Route::get('/forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget-password');
Route::post('/forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('/reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::get('/',[HomeController::class,'home']); 

 // Route::get('/upcoming-reports',[HomeController::class,'upcoming_report']); 
 //  Route::get('/ongoing-report',[HomeController::class,'on_going_report']);


 ///Services
Route::get('/syndicated-research',[ServiceController::class,'service_syndicated_research']);
Route::get('/competitive-analysis',[ServiceController::class,'service_competitive_analysis']);
Route::get('/company-profile',[ServiceController::class,'service_company_profile']);
Route::get('/biographies',[ServiceController::class,'service_biographies']);
Route::get('/customized-research',[ServiceController::class,'service_customised_research']);
Route::post('/Submitenquery',[ServiceController::class,'Submitenquery'])->name('Submitenquery')->middleware(HasValidCaptcha::class);

Route::domain(config('settings.routes.domain'))->middleware(['wwwRedirect'])->group(function () {
});
Route::get('/infographics',[HomeController::class,'infographics']);
Route::get('/infographics/{id}',[HomeController::class,'infographics_details']);
Route::get('/press-release',[HomeController::class,'press_release']);
Route::get('/press-release/{id}',[HomeController::class,'press_release_details']);
Route::get('/report-store',[HomeController::class,'research_report_main'])->name('report-store');
Route::get('/research-report',[HomeController::class,'research_report']);
Route::get('/report-store/{slug}',[HomeController::class,'research_report_details']);

Route::get('/terms-conditions',[HomeController::class,'terms_conditions']); 
Route::get('/refund-policy',[HomeController::class,'refund']);
Route::get('/privacy-policy',[HomeController::class,'privacy_policy']);
Route::get('/about-us',[HomeController::class,'about']);
Route::get('/contact-us',[HomeController::class,'contact']);
Route::post('/save-contact',[HomeController::class,'save_contact'])->name('save_contact')->middleware(HasValidCaptcha::class);
// Route::get('/blogs',[HomeController::class,'blogs']);
// Route::get('/blogs/{blog_id}',[HomeController::class,'blog_details']);
Route::get('/careers',[HomeController::class,'career']);
Route::post('/save_career',[HomeController::class,'save_career'])->name('save_career');

// Route::get('/services',[HomeController::class,'services']);
Route::post('/service-query',[HomeController::class,'save_service_query'])->name('save_service_query')->middleware(HasValidCaptcha::class);
Route::get('/thankyou',[HomeController::class,'thankyou']);
Route::get('/success-thankyou',[HomeController::class,'thankyou']);

Route::post('/request-toc',[HomeController::class,'save_request_toc'])->name('save_request_toc');

Route::post('/register',[HomeController::class,'register']);
Route::post('/sign',[HomeController::class,'login']);

Route::get('/report-store/search/{id:page_url}',[HomeController::class,'search_result']);

#Request
Route::post('/request_research',[HomeController::class,'request_research'])->name('request_research');

#Search
Route::get('autocomplete', [SearchController::class,'autocomplete'])->name('autocomplete');
Route::post('report_search', [SearchController::class,'report_search'])->name('report_search');
Route::get('search/search-result', [SearchController::class,'search_notfound'])->name('search_notfound');

Route::get('/report-store/category/{cat_name}',[HomeController::class, 'research_library_categorywise'])->name('report-store.categorywise');
Route::get('/report-store/country/{subcat_slug}',[HomeController::class, 'research_library_country'])->name('report-store.subcategorywise');

Route::get('/TRC/11',[AdminController::class,'login'])->name('TRC/11');
Route::post('/login_form',[AdminController::class,'login_form'])->name('login_form');
Route::get('/reload-captcha', [AdminController::class, 'reloadCaptcha']);


 Route::post('/update-results', [HomeController::class, 'updateResults'])->name('update-results');
 Route::get('/report-store/country/{subcat_slug}',[HomeController::class, 'research_library_region'])->name('report-store.subcategorywise');
 

#Forms

Route::get('/request-sample/{slug}',[HomeController::class,'request_sample'])->name('request_sample');
Route::post('/save-request-sample',[HomeController::class,'save_request_sample'])->name('save_request_sample')->middleware(HasValidCaptcha::class);

Route::get('/report-all-amounts',[HomeController::class,'report_all_amounts'])->name('report-all-amounts');

Route::post('/save-infographic-request',[HomeController::class,'save_request_infographic'])->name('save_request_infographic')->middleware(HasValidCaptcha::class);
Route::post('/save-blog-request',[HomeController::class,'save_request_blog'])->name('save_request_blog');

#Cart

Route::get('shopping-basket', [CartController::class, 'cart'])->name('shopping-basket');
Route::get('cart1', [CartController::class, 'cart1'])->name('cart1');
Route::post('ccavenue-payment-success', [CartController::class, 'ccavenue_payment_success'])->name('ccavenue_payment_success');
Route::post('ccavenue-payment-cancel', [CartController::class, 'ccavenue_payment_cancel'])->name('ccavenue_payment_cancel');

Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::post('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');

Route::get('add-to-cart-new', [CartController::class, 'add_to_cart_new'])->name('add-to-cart-new');
Route::get('add-to-cart-another', [CartController::class, 'add_to_cart_another'])->name('add-to-cart-another');
Route::post('save_cart_payment', [CartController::class, 'save_cart_payment'])->name('save_cart_payment')->middleware(HasValidCaptcha::class);
Route::post('payment/response', [CartController::class, 'paymentResponse']);

Route::post('/paypal', [PaypalController::class, 'payWithpaypal'])->name('paypal');
// route for check status of the payment
Route::get('/paypal/callback', [CartController::class, 'getPaymentStatus']);

Route::group(['prefix'=>'user','middleware' => ['auth']],function(){
    Route::get('/dashboard',[UserController::class,'dash_index'])->name('user/dashboard');
    Route::get('/logout',[UserController::class,'logout'])->name('user/logout');
    Route::post('/logout',[UserController::class,'logout'])->name('user/logout');
    Route::get('/infographic',[UserController::class,'infographic'])->name('user.infographic');
    Route::post('/infographic',[UserController::class,'save_infographic'])->name('user/save_infographic');
    Route::get('/infographic-list',[UserController::class,'infographic_list'])->name('user/infographic_list');
    Route::get('/filter_infographic',[UserController::class,'filter_infographic'])->name('user.filter_infographic');
    Route::get('/edit-infographic/{id}',[UserController::class,'edit_infographic']);
    Route::post('/update-infographic/{id}',[UserController::class,'save_edit_infographic'])->name('save_edit_infographic');

    #BLOG
    // Route::get('/blog',[UserController::class,'blog_form'])->name('user/blog');
    // Route::post('/blog',[UserController::class,'save_blog'])->name('user/save_blog');
    // Route::get('/blog-list',[UserController::class,'blog_list'])->name('user/blog_list');
    // Route::get('/edit-blog/{id}',[UserController::class,'edit_blog']);
    // Route::post('/update-blog/{id}',[UserController::class,'save_edit_blog'])->name('save_edit_blog');
    // Route::get('/delete-blog',[UserController::class,'delete_blog'])->name('user/delete_blog');
    // Route::get('/filter_blog',[UserController::class,'filter_blog'])->name('user.filter_blog');

    #REPORT UPLOAD
    Route::get('/report-upload',[UserController::class,'report_upload_form'])->name('user/report_upload');
    Route::post('/report-upload',[UserController::class,'save_report'])->name('user/save_report');
    Route::get('/showCategory',[UserController::class,'showCategory'])->name('user/showCategory');
    Route::get('/report-list',[UserController::class,'report_list'])->name('user/report_list');
    Route::get('/edit-report/{id}',[UserController::class,'edit_report']);
    Route::post('/update-report',[UserController::class,'update_report'])->name('update_report');
    Route::get('/delete-report',[UserController::class,'delete_report'])->name('user/delete_report');
    Route::get('/filter_report',[UserController::class,'filter_report'])->name('user.filter_report');
    

    ################ Press Release Uploads ##############################
    Route::get('/press_release',[UserController::class,'press_release'])->name('user.press_release');
    Route::post('/press_release',[UserController::class,'save_press_release'])->name('user/save_press_release');
    Route::get('/press_release_list',[UserController::class,'press_release_list'])->name('user.press_release_list');
    Route::get('/edit_press_release/{id}',[UserController::class,'edit_press_release'])->name('user.edit_press_release');
    Route::post('/update_press_release/{id}',[UserController::class,'save_edit_press_release'])->name('save_edit_press_release');
    Route::get('/delete_press_release',[UserController::class,'delete_press_release'])->name('user/delete_press_release');
    Route::get('/filter_press',[UserController::class,'filter_press'])->name('user.filter_press');
    
    # Import bulk Report Upload
    Route::post('/bulk-report-upload', [UserController::class, 'uploadReportImports']);

});

    Route::post('/change_passwprd', [UserController::class, 'change_passwprd']);

Route::group(['prefix'=>'TRC/11','middleware' => ['auth']],function(){

    // Route::get('/',[AdminController::class,'login']);
    // Route::get('/login',[AdminController::class,'login'])->name('TRC/11/login');
    // Route::post('/login_form',[AdminController::class,'login_form'])->name('login_form');
    // Route::get('/reload-captcha', [AdminController::class, 'reloadCaptcha']);
    Route::get('/dashboard',[AdminController::class,'dash_index'])->name('TRC/11/dashboard');
    Route::get('/profile/{id}',[AdminController::class,'profile']);
    Route::post('/profile/{id}',[AdminController::class,'update_profile'])->name('profile');
    Route::get('/logout',[AdminController::class,'logout']);

    Route::get('/infographic',[AdminController::class,'infographic'])->name('infographic');
    Route::post('/infographic',[AdminController::class,'save_infographic'])->name('TRC/11/save_infographic');
    Route::get('/infographic-list',[AdminController::class,'infographic_list'])->name('TRC/11/infographic_list');
    Route::get('/filter_infographic',[AdminController::class,'filter_infographic'])->name('filter_infographic');
    Route::get('/edit-infographic/{id}',[AdminController::class,'edit_infographic']);
    Route::post('/update-infographic/{id}',[AdminController::class,'save_edit_infographic'])->name('save_edit_infographic');
    Route::get('/delete-infographic',[AdminController::class,'delete_infographic'])->name('TRC/11/delete_infographic');

  //ckeditor
    // Route::post('/upload_image_description_ckeditor', 'AdminController@upload')->name('TRC.11.ckeditor.upload');
    Route::post('/upload_image_description_ckeditor',[AdminController::class,'upload'])->name('TRC.11.ckeditor.upload');


    #BLOG
    Route::get('/blog',[AdminController::class,'blog_form'])->name('TRC/11/blog');
    Route::post('/blog',[AdminController::class,'save_blog'])->name('TRC/11/save_blog');
    Route::get('/blog-list',[AdminController::class,'blog_list'])->name('TRC/11/blog_list');
    Route::get('/edit-blog/{id}',[AdminController::class,'edit_blog']);
    Route::post('/update-blog/{id}',[AdminController::class,'save_edit_blog'])->name('save_edit_blog');
    Route::get('/delete-blog',[AdminController::class,'delete_blog'])->name('TRC/11/delete_blog');
    Route::get('/filter_blog',[AdminController::class,'filter_blog'])->name('filter_blog');

    #REPORT UPLOAD
    Route::get('/report-upload',[AdminController::class,'report_upload_form'])->name('TRC/11/report_upload');
    Route::post('/report-upload',[AdminController::class,'save_report'])->name('TRC/11/save_report');
    Route::get('/showCategory',[AdminController::class,'showCategory'])->name('TRC/11/showCategory');
     Route::get('/showCountry',[AdminController::class,'showCountry'])->name('TRC/11/showCountry');
    Route::get('/report-list',[AdminController::class,'report_list'])->name('TRC/11/report_list');
    Route::get('/edit-report/{id}',[AdminController::class,'edit_report']);
    Route::post('/update-report',[AdminController::class,'update_report'])->name('update_report');
    Route::get('/delete-report',[AdminController::class,'delete_report'])->name('TRC/11/delete_report');
    Route::get('/filter_report',[AdminController::class,'filter_report'])->name('admin.filter_report');

    ################ Press Release Uploads ##############################
    Route::get('/press_release',[AdminController::class,'press_release'])->name('press_release');
    Route::post('/press_release',[AdminController::class,'save_press_release'])->name('TRC/11/save_press_release');
    Route::get('/press_release_list',[AdminController::class,'press_release_list'])->name('press_release_list');
    Route::get('/edit_press_release/{id}',[AdminController::class,'edit_press_release']);
    Route::post('/update_press_release/{id}',[AdminController::class,'save_edit_press_release'])->name('save_edit_press_release');
    Route::get('/delete_press_release',[AdminController::class,'delete_press_release'])->name('TRC/11/delete_press_release');
    Route::get('/filter_press',[AdminController::class,'filter_press'])->name('filter_press');


    ################ Services ##############################
    Route::get('/services',[AdminController::class,'services'])->name('services');
    Route::post('/services',[AdminController::class,'save_services'])->name('TRC/11/save_services');
    Route::get('/services_list',[AdminController::class,'services_list'])->name('services_list');
    Route::get('/edit_services/{id}',[AdminController::class,'edit_services']);
    Route::post('/update_services/{id}',[AdminController::class,'save_edit_services'])->name('save_edit_services');
    Route::get('/delete_services',[AdminController::class,'delete_services'])->name('TRC/11/delete_services');
    
    ################ Financial Research ##############################
    Route::get('/financial_research',[AdminController::class,'financial_research'])->name('financial_research');
    Route::post('/financial_research',[AdminController::class,'save_financial_research'])->name('save_financial_research');
    Route::get('/financial_list',[AdminController::class,'financial_list'])->name('financial_list');
    
    Route::get('/edit_financial_research/{id}',[AdminController::class,'edit_financial_research']);
    Route::post('/update_financial_research/{id}',[AdminController::class,'save_edit_financial_research'])->name('save_edit_financial_research');
    Route::get('/delete_financial_research',[AdminController::class,'delete_financial_research'])->name('TRC/11/delete_financial_research');

    #User
    Route::get('/users',[AdminController::class,'users_list'])->name('TRC/11/users_list');
      Route::get('/delete_user',[AdminController::class,'delete_user'])->name('TRC/11/delete_user');

    #Seo 
    Route::get('/add-seo-content',[AdminController::class,'seo_page'])->name('TRC/11/seo_page');
    Route::get('/seo-pages',[AdminController::class,'seo_pages_list'])->name('TRC/11/seo_page_list');
    Route::post('/save-seo-pages',[AdminController::class,'save_seo_pages'])->name('TRC/11/save_seo_pages');
    Route::get('/edit-seo-page/{id}',[AdminController::class,'edit_seo_page']);

    # Member
    Route::get('add-member',[AdminController::class,'add_member'])->name('TRC/11/add_member');
    Route::post('/member_form',[AdminController::class,'add_member_form'])->name('TRC/11/member_form');
    Route::get('all-member',[AdminController::class,'all_member'])->name('TRC/11/all_members');
    Route::get('/delete_member',[AdminController::class,'delete_member'])->name('TRC/11/delete_member'); 
    Route::get('member-details/{id}',[AdminController::class,'member_view']);
    Route::get('edit-member/{id}',[AdminController::class,'edit_member']);
    Route::post('edit-member/{id}',[AdminController::class,'update_member'])->name('edit_member');

        #DATA ANALYTICS
        Route::get('/data-analytics',[AdminController::class,'data_analytics_list'])->name('TRC/11/data_analytics_list');
        Route::get('/add-data-analytics',[AdminController::class,'add_data_analytic'])->name('TRC/11/add_data_analytic');
        Route::post('/save-data-analytics',[AdminController::class,'save_data_analytics'])->name('TRC/11/save_data_analytics');
        Route::get('/edit-data-analytics/{id}',[AdminController::class,'edit_data_analytic']);
        Route::post('/update-data-analytics/{id}',[AdminController::class,'update_data_analytics'])->name('update_data_analytics');
        Route::get('/delete_data_analytics',[AdminController::class,'delete_data_analytics'])->name('TRC/11/delete_data_analytics');


    ################ Research Library ##############################
    # Industries
    Route::get('/industries',[AdminController::class,'industries'])->name('industries');
    Route::post('/industries',[AdminController::class,'save_industries'])->name('save_industries');
    Route::get('/industries_list',[AdminController::class,'industries_list'])->name('industries_list');
    Route::get('/sub_industries',[AdminController::class,'sub_industries'])->name('sub_industries');
    Route::get('/edit_industries/{id}',[AdminController::class,'edit_industries']);
    Route::post('/update_industries/{id}',[AdminController::class,'save_edit_industries'])->name('save_edit_industries');
    Route::get('/delete_industries',[AdminController::class,'delete_industries'])->name('TRC/11/delete_industries');

    # Sub Industries
    Route::get('/sub_industries',[AdminController::class,'sub_industries'])->name('sub_industries');
    Route::post('/save_sub_industries',[AdminController::class,'save_sub_industries'])->name('save_sub_industries');
    Route::get('/sub_industries_list',[AdminController::class,'sub_industries_list'])->name('sub_industries_list');
    Route::get('/edit_sub_industries/{id}',[AdminController::class,'edit_sub_industries']);
    Route::post('/update_sub_industries/{id}',[AdminController::class,'save_edit_sub_industries'])->name('save_edit_sub_industries');
    Route::get('/delete_sub_industries',[AdminController::class,'delete_sub_industries'])->name('TRC/11/delete_sub_industries');

        # Region
    Route::get('/region',[AdminController::class,'region'])->name('region');
    Route::post('/region',[AdminController::class,'save_region'])->name('save_region');
    Route::get('/region_list',[AdminController::class,'region_list'])->name('region_list');
    Route::get('/edit_region/{id}',[AdminController::class,'edit_region']);
    Route::post('/update_region/{id}',[AdminController::class,'save_edit_region'])->name('save_edit_region');
    Route::get('/delete_region',[AdminController::class,'delete_region'])->name('TRC/11/delete_region');
    
    #Country
    Route::get('/country',[AdminController::class,'country'])->name('country');
    Route::post('/save_country',[AdminController::class,'save_country'])->name('TRC/11/save_country');
    Route::get('/country_list',[AdminController::class,'country_list'])->name('country_list');
    Route::get('/edit_country/{id}',[AdminController::class,'edit_country']);
    Route::post('/update_country/{id}',[AdminController::class,'save_edit_country'])->name('save_edit_country');
    Route::get('/delete_country',[AdminController::class,'delete_country'])->name('TRC/11/delete_country');



    #City
    Route::get('/city',[AdminController::class,'city'])->name('city');
    Route::post('/country',[AdminController::class,'save_city'])->name('TRC/11/save_city');
    Route::get('/city_list',[AdminController::class,'city_list'])->name('city_list');
    Route::get('/edit_city/{id}',[AdminController::class,'edit_city']);
    Route::post('/save_edit_city/{id}',[AdminController::class,'save_edit_city'])->name('save_edit_city');
    Route::get('/delete_city',[AdminController::class,'delete_city'])->name('TRC/11/delete_city');

    #Seo 
    Route::get('/add-seo-content',[AdminController::class,'seo_page'])->name('TRC/11/seo_page');
    Route::post('/save-seo-pages',[AdminController::class,'save_seo_pages'])->name('TRC/11/save_seo_pages');
    Route::get('/seo-pages',[AdminController::class,'seo_pages_list'])->name('TRC/11/seo_page_list');
    Route::get('/edit-seo-page/{id}',[AdminController::class,'edit_seo_page']);
    Route::post('/update-seo-page/{id}',[AdminController::class,'update_seo_page'])->name('TRC/11/update_seo_pages');


    //change password 
      Route::get('change-password',[AdminController::class,'change_password'])->name('change-password'); 
      Route::post('submitResetPasswordForm',[AdminController::class,'submitResetPasswordForm'])->name('TRC/11/submitResetPasswordForm');

    ################## Web Site Management ########################
    # Banner
    Route::get('/banner_list',[AdminController::class,'banner_list'])->name('banner_list');
    Route::get('/banner',[AdminController::class,'banner'])->name('banner');
    Route::post('/banner',[AdminController::class,'save_banner'])->name('save_banner');
    Route::get('/delete_banner',[AdminController::class,'delete_banner'])->name('TRC/11/delete_banner');
    Route::get('/edit_banner/{id}',[AdminController::class,'edit_banner']);
    Route::post('/update_banner/{id}',[AdminController::class,'save_edit_banner'])->name('save_edit_banner');

    # Testimonial
    Route::get('/testimonial_list',[AdminController::class,'testimonial_list'])->name('testimonial_list');
    Route::get('/testimonial',[AdminController::class,'testimonial'])->name('testimonial');
    Route::post('/testimonial',[AdminController::class,'save_testimonial'])->name('TRC/11/save_testimonial');
    Route::get('/delete_testimonial',[AdminController::class,'delete_testimonial'])->name('TRC/11/delete_testimonial');
    Route::get('/edit_testimonial/{id}',[AdminController::class,'edit_testimonial']);
    Route::post('/update_testimonial/{id}',[AdminController::class,'save_edit_testimonial'])->name('save_edit_testimonial');

    # About Us
    Route::get('/aboutus_list',[AdminController::class,'aboutus_list'])->name('aboutus_list');
    Route::get('/aboutus',[AdminController::class,'aboutus'])->name('aboutus');
    Route::post('/aboutus',[AdminController::class,'save_aboutus'])->name('TRC/11/save_aboutus');
    Route::get('/delete_aboutus',[AdminController::class,'delete_aboutus'])->name('TRC/11/delete_aboutus');
    Route::get('/edit_aboutus/{id}',[AdminController::class,'edit_aboutus']);
    Route::post('/update_aboutus/{id}',[AdminController::class,'save_edit_aboutus'])->name('save_edit_aboutus');

    # Vision & Mission
    Route::get('/vision_list',[AdminController::class,'vision_list'])->name('vision_list');
    Route::get('/vision',[AdminController::class,'vision'])->name('vision');
    Route::post('/vision',[AdminController::class,'save_vision'])->name('TRC/11/save_vision');
    Route::get('/delete_vision',[AdminController::class,'delete_vision'])->name('TRC/11/delete_vision'); 
    Route::get('/edit_vision/{id}',[AdminController::class,'edit_vision']);
    Route::post('/update_vision/{id}',[AdminController::class,'save_edit_vision'])->name('save_edit_vision');

    # Client
    Route::get('/client_list',[AdminController::class,'client_list'])->name('client_list');
    Route::get('/client',[AdminController::class,'client'])->name('client');
    Route::post('/client',[AdminController::class,'save_client'])->name('TRC/11/save_client');
    Route::get('/delete_client',[AdminController::class,'delete_client'])->name('TRC/11/delete_client'); 
    Route::get('/edit_client/{id}',[AdminController::class,'edit_client']);
    Route::post('/update_client/{id}',[AdminController::class,'save_edit_client'])->name('save_edit_client');

    # Privacy Policy
    Route::get('/privacy_list',[AdminController::class,'privacy_list'])->name('privacy_list');
    Route::get('/privacy',[AdminController::class,'privacy'])->name('privacy');
    Route::post('/privacy',[AdminController::class,'save_privacy'])->name('TRC/11/save_privacy');
    Route::get('/delete_privacy',[AdminController::class,'delete_privacy'])->name('TRC/11/delete_privacy'); 
    Route::get('/edit_privacy/{id}',[AdminController::class,'edit_privacy']);
    Route::post('/update_privacy/{id}',[AdminController::class,'save_edit_privacy'])->name('save_edit_privacy');

    # Refund Policy
    Route::get('/refund_list',[AdminController::class,'refund_list'])->name('refund_list');
    Route::get('/refund',[AdminController::class,'refund'])->name('refund');
    Route::post('/refund',[AdminController::class,'save_refund'])->name('TRC/11/save_refund');
    Route::get('/delete_refund',[AdminController::class,'delete_refund'])->name('TRC/11/delete_refund'); 
    Route::get('/edit_refund/{id}',[AdminController::class,'edit_refund']);
    Route::post('/update_refund/{id}',[AdminController::class,'save_edit_refund'])->name('save_edit_refund');

    # Terms & Conditions
    Route::get('/terms_list',[AdminController::class,'terms_list'])->name('terms_list');
    Route::get('/terms',[AdminController::class,'terms'])->name('terms');
    Route::post('/terms',[AdminController::class,'save_terms'])->name('TRC/11/save_terms');
    Route::get('/delete_terms',[AdminController::class,'delete_terms'])->name('TRC/11/delete_terms'); 
    Route::get('/edit_terms/{id}',[AdminController::class,'edit_terms']);
    Route::post('/update_terms/{id}',[AdminController::class,'save_edit_terms'])->name('save_edit_terms');

    # Contact us
    Route::get('/contactus_list',[AdminController::class,'contactus_list'])->name('contactus_list');
    Route::get('/contactus',[AdminController::class,'contactus'])->name('contactus');
    Route::post('/contactus',[AdminController::class,'save_contactus'])->name('TRC/11/save_contactus');
    Route::get('/delete_contactus',[AdminController::class,'delete_contactus'])->name('TRC/11/delete_contactus'); 
    Route::get('/edit_contactus/{id}',[AdminController::class,'edit_contactus']);
    Route::post('/update_contactus/{id}',[AdminController::class,'save_edit_contactus'])->name('save_edit_contactus');

    # Sample_request
    Route::get('/sample_request',[AdminController::class,'sample_request']);
    Route::get('/filter_sample',[AdminController::class,'filter_sample'])->name('filter_sample');
    # Speak To Analyst
    Route::get('/speak_analyst',[AdminController::class,'speak_analyst']);
    Route::get('/filter_speak',[AdminController::class,'filter_speak'])->name('filter_speak');
    # Request Customization
    Route::get('/request_customization',[AdminController::class,'request_customization']);
    Route::get('/filter_request',[AdminController::class,'filter_request'])->name('filter_request');
    # Covid Impact
    Route::get('/covid_impact',[AdminController::class,'covid_impact']);
    Route::get('/filter_covid',[AdminController::class,'filter_covid'])->name('filter_covid');

    # Sample Request Tire Exim
    Route::get('/tire_exim',[AdminController::class,'tire_exim']);
    Route::get('/filter_tire',[AdminController::class,'filter_tire'])->name('filter_tire');

    # Service Query
    Route::get('/customized_res',[AdminController::class,'customized_res']);
    Route::get('/filter_customized',[AdminController::class,'filter_customized'])->name('filter_customized');
    Route::get('/syndicate_res',[AdminController::class,'syndicate_res']);
    Route::get('/filter_syndicate',[AdminController::class,'filter_syndicate'])->name('filter_syndicate');
    Route::get('/consulting_res',[AdminController::class,'consulting_res']);
    Route::get('/filter_consulting',[AdminController::class,'filter_consulting'])->name('filter_consulting');
    Route::get('/full_analyst',[AdminController::class,'full_analyst']);
    Route::get('/filter_full',[AdminController::class,'filter_full'])->name('filter_full');

    # Other Query
    Route::get('/infographics_enq',[AdminController::class,'infographics_enq']);
    Route::get('/filter_infographics_enq',[AdminController::class,'filter_infographics_enq'])->name('filter_infographics_enq');
    Route::get('/search_query',[AdminController::class,'search_query']);
    Route::get('/filter_search',[AdminController::class,'filter_search'])->name('filter_search');
    Route::get('contactus_enq', [AdminController::class, 'contactus_enq'])->name('contactus_enq');
    Route::get('/filter_contactus_enq',[AdminController::class,'filter_contactus_enq'])->name('filter_contactus_enq');

    # HR Portal
    Route::get('/career_list',[AdminController::class,'career_list']);
    Route::get('/add_career',[AdminController::class,'add_career'])->name('add_career');
    Route::post('/add_career',[AdminController::class,'save_career'])->name('TRC/11/save_career');
    Route::get('/delete_career',[AdminController::class,'delete_career'])->name('TRC/11/delete_career'); 
    Route::get('/edit_career/{id}',[AdminController::class,'edit_career']);
    Route::post('/update_career/{id}',[AdminController::class,'save_edit_career'])->name('save_edit_career');

    Route::get('/applicants',[AdminController::class,'applicants']);
    Route::get('/delete_applicants',[AdminController::class,'delete_applicants'])->name('TRC/11/delete_applicants'); 


    Route::post('/filter_info',[AdminController::class,'filter_info'])->name('TRC/11/filter_info');


    
    # Export Excel Data

    Route::get('file-export', [AdminController::class, 'fileExport'])->name('file-export');
    # Sample_request
    Route::get('sample-export', [AdminController::class, 'sample_export'])->name('sample-export');
    # Speak To Analyst
    Route::get('speak_export', [AdminController::class, 'speak_export'])->name('speak_export');
    # Request Customization
    Route::get('request_export', [AdminController::class, 'request_export'])->name('request_export');
    # Covid Impact
    Route::get('covid_export', [AdminController::class, 'covid_export'])->name('covid_export');
    # Tire Exim Module
    Route::get('tire_export', [AdminController::class, 'tire_export'])->name('tire_export');
    # Service Query
    Route::get('customized_export', [AdminController::class, 'customized_export'])->name('customized_export');
    Route::get('syndicate_export', [AdminController::class, 'syndicate_export'])->name('syndicate_export');
    Route::get('consulting_export', [AdminController::class, 'consulting_export'])->name('consulting_export');
    Route::get('full_export', [AdminController::class, 'full_export'])->name('full_export');
    # Infographics(Enquiry)
    Route::get('infographics_enq_export', [AdminController::class, 'infographics_enq_export'])->name('infographics_enq_export');
    # Search (Query)
    Route::get('search_export', [AdminController::class, 'search_export'])->name('search_export');
    # Contact us enquiry
    Route::get('contactus_export', [AdminController::class, 'contactus_export'])->name('contactus_export');
    # Career applicants
    Route::get('applicants_export', [AdminController::class, 'applicants_export'])->name('applicants_export');
    # Blog
    Route::get('blog_export', [AdminController::class, 'blog_export'])->name('blog_export');
    Route::get('report_export', [AdminController::class, 'report_export'])->name('report_export');
    
    Route::get('press_export', [AdminController::class, 'press_export'])->name('press_export');



    Route::get('admin-profile',[AdminController::class,'admin_profile'])->name('admin_profile');

    Route::get('others-setting',[AdminController::class,'others']);
    
    # Import bulk Report Upload
    Route::post('/bulk-report-upload', [AdminController::class, 'uploadReportImports']);
   
});

