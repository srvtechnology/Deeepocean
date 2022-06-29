<?php


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

// Route::get('/', function () {
//     return view('frontend.pages.landing_page');
// });
//Route::get('/', 'RegController@index')->name('index.page');

Auth::routes();
Route::group(['namespace' => 'Frontend'], function() {
    Route::get('/', 'RegController@index')->name('index.page');
     Route::get('/sign-up/one', 'RegController@reg_one')->name('reg.one.show');

Route::post('/sign-up', 'RegController@reg_step_one')->name('reg.one');
Route::get('/sign-up/{slug}', 'RegController@reg_step_two_view')->name('reg.two');
Route::post('/sign-up/two', 'RegController@reg_step_two_insert')->name('reg.two.post');
Route::get('/payment/{slug}', 'RegController@payment')->name('pay');

//fetch paper using ajax
Route::post('/paper-fetch', 'RegController@paper_fetch')->name('fetch.paper');

//fetch paper details using ajax
Route::post('/paper-fetch-details', 'RegController@paper_fetch_details')->name('fetch.paper.details');


//payment
Route::get('/cashfree-payment-gateway', 'CashfreeController@cashfree_payment_gateway');
Route::post('/order', 'CashfreeController@order');
Route::post('/return-url', 'CashfreeController@return_url');

Route::get('/success-payment/{id}', 'CashfreeController@success_payment')->name('success.payment');
Route::get('/fail-payment/{id}', 'CashfreeController@fail_payment')->name('fail.payment');

//contact us
  Route::post('/contact-us', 'RegController@contact_us')->name('contact.us');

  Route::get('/privacy-policy', 'RegController@p_p')->name('p.p');


Route::post('/check-promo', 'RegController@chk_promo')->name('check.promo');

});


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/config-clear', function() {
    $status = Artisan::call('config:clear');
    return '<h1>Configurations cleared</h1>';
});

//Clear cache:
Route::get('/cache-clear', function() {
    $status = Artisan::call('cache:clear');
    return '<h1>Cache cleared</h1>';
});

//Clear configuration cache:
Route::get('/config-cache', function() {
    $status = Artisan::call('config:cache');
    return '<h1>Configurations cache cleared</h1>';
});


//Clear route cache:
Route::get('/route-cache', function() {
    $status = Artisan::call('route:clear');
    return '<h1>route cache cleared</h1>';
});


//Clear view cache:
Route::get('/view-cache', function() {
    $status = Artisan::call('view:clear');
    return '<h1>view cache cleared</h1>';
});


//Clear event cache:
Route::get('/event-cache', function() {
    $status = Artisan::call('event:clear');
    return '<h1>event cache cleared</h1>';
});




Route::get('/cron-job-payment-update', 'Frontend\CashfreeController@cron_job_payment_status');




/*

//cron
C:\xampp\htdocs\deepocean-1\app\Http\Controllers\Frontend\CashfreeController.php

C:\xampp\htdocs\deepocean-1\routes\web.php



//admin filter   and USER SUCCSS FAILED INPROGRESS PAYMENTS

C:\xampp\htdocs\deepocean-1\routes\admin.php

C:\xampp\htdocs\deepocean-1\app\Http\Controllers\Admin\Dasboard\DashboardController.php

C:\xampp\htdocs\deepocean-1\resources\views\admin\pages\users\paid_users_list.blade.php

C:\xampp\htdocs\deepocean-1\resources\views\admin\include\left_part.blade.php



//gst
C:\xampp\htdocs\deepocean-1\resources\views\frontend\pages\reg_two.blade.php

C:\xampp\htdocs\deepocean-1\app\Http\Controllers\Frontend\RegController.php

C:\xampp\htdocs\deepocean-1\resources\views\admin\pages\users\view_details_page.blade.php

C:\xampp\htdocs\deepocean-1\resources\views\admin\pages\users\paid_users_list.blade.php


//edit user
C:\xampp\htdocs\deepocean-1\resources\views\admin\pages\users\edit.blade.php

C:\xampp\htdocs\deepocean-1\resources\views\admin\pages\users\paid_users_list.blade.php

C:\xampp\htdocs\deepocean-1\app\Http\Controllers\Admin\Dasboard\DashboardController.php

C:\xampp\htdocs\deepocean-1\routes\admin.php







//register form email twice and upi

C:\xampp\htdocs\deepocean-1\resources\views\frontend\pages\reg.blade.php

C:\xampp\htdocs\deepocean-1\app\Http\Controllers\Frontend\RegController.php

C:\xampp\htdocs\deepocean-1\resources\views\admin\pages\users\view_details_page.blade.php

ALTER TABLE `users` ADD `upi` VARCHAR(255) NULL AFTER `mobile`;

ALTER TABLE `users` ADD `trans_type` ENUM('PPY','GPY','PTM','BNK','UPI') NULL AFTER `mobile`, ADD `trans_number` VARCHAR(255) NULL AFTER `trans_type`, ADD `bank_name` VARCHAR(255) NULL AFTER `trans_number`, ADD `acc_no` VARCHAR(255) NULL AFTER `bank_name`, ADD `ifsc_code` VARCHAR(255) NULL AFTER `acc_no`, ADD `bank_user_name` VARCHAR(255) NULL AFTER `ifsc_code`;






//update user mail part
C:\xampp\htdocs\deepocean-1\app\Http\Controllers\Admin\Dasboard\DashboardController.php

C:\xampp\htdocs\deepocean-1\app\Mail\UserUpdateEmail.php

C:\xampp\htdocs\deepocean-1\resources\views\mail\update_user.blade.php




//soft delete  and export function   ( alreday done above)
C:\xampp\htdocs\deepocean-1\app\Http\Controllers\Admin\Dasboard\DashboardController.php

C:\xampp\htdocs\deepocean-1\resources\views\admin\pages\users\paid_users_list.blade.php

C:\xampp\htdocs\deepocean-1\routes\admin.php

C:\xampp\htdocs\deepocean-1\resources\views\admin\pages\users\view_details_page.blade.php

//side bar scrrol
C:\xampp\htdocs\deepocean-1\resources\views\admin\pages\promo_code\promo_user_list.blade.php


