<?php

Route::group(['namespace' => 'Admin'], function() {

    Route::get('/', 'HomeController@index')->name('admin.dashboard');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');

    // Verify
    // Route::get('email/resend', 'Auth\VerificationController@resend')->name('admin.verification.resend');
    // Route::get('email/verify', 'Auth\VerificationController@show')->name('admin.verification.notice');
    // Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('admin.verification.verify');

    //forget password
      Route::get('forget-password/enter-mail', 'Dasboard\DashboardController@enter_mail')->name('enter.mail.page');
      Route::post('forget-password/code-generated', 'Dasboard\DashboardController@code_gen')->name('email.entered.code.generate');
      Route::get('forget-password/email-verify/{id}/{vcode}','Dasboard\DashboardController@resetPassowrd')->name('admin.forget.password.email.verify');
      Route::post('forget-password/new-password','Dasboard\DashboardController@newPassword')->name('admin.reset.new.password');

});



Route::group(['namespace' => 'Admin','middleware' => ['admin.auth:admin']], function() {  
    /*dashboard start*/
Route::get('/dashboard', 'Dasboard\DashboardController@dashboard')->name('admin.dashboard.home');
Route::get('/edit-profile', 'Dasboard\DashboardController@edit_view')->name('admin.edit.view');
Route::post('/update-profile', 'Dasboard\DashboardController@update')->name('update.admin');
//multi deletes
Route::post('/multi-adv-delete', 'Dasboard\DashboardController@del_adv')->name('multi.delete.adv');
Route::post('/multi-insp-delete', 'Dasboard\DashboardController@del_insp')->name('multi.delete.insp');
Route::post('/multi-prod-delete', 'Dasboard\DashboardController@del_prod')->name('multi.delete.prod');
Route::post('/multi-course-delete', 'Dasboard\DashboardController@del_course')->name('multi.delete.course');
Route::post('/multi-subject-delete', 'Dasboard\DashboardController@del_subject')->name('multi.delete.subject');
Route::post('/multi-paper-delete', 'Dasboard\DashboardController@del_paper')->name('multi.delete.paper');



//course management
Route::get('/manage-course','Course\CourseManagement@course_list')->name('course.list');
 Route::get('/manage-course/add','Course\CourseManagement@add_course_form')->name('course.add.form');
 Route::post('/manage-course/insert','Course\CourseManagement@insert_course')->name('course.insert');
 Route::get('/manage-course/edit/{id}','Course\CourseManagement@edit_course_view')->name('edit.course');
 Route::post('/manage-course/update','Course\CourseManagement@update_course')->name('course.update');
Route::get('/manage-course/active/{id}','Course\CourseManagement@active')->name('course.status.active');
Route::get('/manage-course/inactive/{id}','Course\CourseManagement@inactive')->name('course.status.inactive');
 Route::get('/manage-course/delete/{id}','Course\CourseManagement@delete')->name('course.status.delete');




 //subject management
 Route::get('/manage-subject','Subject\SubjectController@subject_list')->name('subject.list');
Route::get('/manage-subject/add','Subject\SubjectController@add_subject_form')->name('subject.add.form');
  Route::post('/manage-subject/insert','Subject\SubjectController@insert_subject')->name('subject.insert');
  Route::get('/manage-subject/edit/{id}','Subject\SubjectController@edit_subject_view')->name('edit.subject');
  Route::post('/manage-subject/update','Subject\SubjectController@update_subject')->name('subject.update');
Route::get('/manage-subject/active/{id}','Subject\SubjectController@active')->name('subject.status.active');
Route::get('/manage-subject/inactive/{id}','Subject\SubjectController@inactive')->name('subject.status.inactive');
 Route::get('/manage-subject/delete/{id}','Subject\SubjectController@delete')->name('subject.status.delete');




 //Paper management
  Route::get('/manage-paper','Paper\PaperController@paper_list')->name('paper.list');
Route::get('/manage-paper/add','Paper\PaperController@add_paper_form')->name('paper.add.form');
  Route::post('/manage-paper/insert','Paper\PaperController@insert_paper')->name('paper.insert');
  Route::get('/manage-paper/edit/{id}','Paper\PaperController@edit_paper_view')->name('edit.paper');
  Route::post('/manage-paper/update','Paper\PaperController@update_paper')->name('paper.update');
Route::get('/manage-paper/active/{id}','Paper\PaperController@active')->name('paper.status.active');
Route::get('/manage-paper/inactive/{id}','Paper\PaperController@inactive')->name('paper.status.inactive');
 Route::get('/manage-paper/delete/{id}','Paper\PaperController@delete')->name('paper.status.delete');



 //paid user
 Route::any('/paid-users/all-data','Dasboard\DashboardController@paid_user_list')->name('paid.users');
 Route::get('/paid-users/view/{id}','Dasboard\DashboardController@view_details')->name('view.details');
 //4/18/2022
 Route::any('/paid-users/success','Dasboard\DashboardController@paid_user_list_success')->name('success.details');
 Route::any('/paid-users/failed','Dasboard\DashboardController@paid_user_list_failed')->name('failed.details');
 Route::any('/paid-users/inprogress','Dasboard\DashboardController@paid_user_list_inprogress')->name('inprogress.details');
 Route::get('/paid-users/edit/{id}','Dasboard\DashboardController@edit_page_user')->name('edit.user.details');
 Route::post('/paid-users/upd','Dasboard\DashboardController@update_user')->name('user.update');
  Route::get('delete/{id}','Dasboard\DashboardController@delete_soft')->name('delete.soft');
  Route::post('exports','Dasboard\DashboardController@export_data')->name('manage.export');
  
 



 //banner Management
  Route::get('/banner-management','Banner\BannerManagement@banner_page')->name('banner.page');
  Route::post('check', 'Banner\BannerManagement@imgcheck')->name('check.img');
Route::post('/banner-management/upload', 'Banner\BannerManagement@upload_banner')->name('upload.banner');




//inspiration management
Route::get('/manage-inspiration','Inspiration\InspirationController@insp_list')->name('insp.list');
Route::get('/manage-inspiration/add','Inspiration\InspirationController@insp_add_form')->name('insp.add.form');
Route::post('/manage-inspiration/insert','Inspiration\InspirationController@insp_insert')->name('insp.insert');
Route::get('/manage-inspiration/active/{id}','Inspiration\InspirationController@active')->name('insp.status.active');
Route::get('/manage-inspiration/inactive/{id}','Inspiration\InspirationController@inactive')->name('insp.status.inactive');
Route::get('/manage-inspiration/delete/{id}','Inspiration\InspirationController@delete')->name('insp.status.delete');
Route::get('/manage-inspiration/edit/{id}','Inspiration\InspirationController@edit_page')->name('edit.insp');
Route::post('/manage-inspiration/update','Inspiration\InspirationController@update')->name('update.insp');
Route::get('/manage-inspiration/view/{id}','Inspiration\InspirationController@view')->name('view.insp');



//manage advisory
Route::get('/manage-advisory','Advisory\AdvisoryController@adv_list')->name('adv.list');
Route::get('/manage-advisory/add','Advisory\AdvisoryController@adv_add_form')->name('adv.add.form');
Route::post('/manage-advisory/insert','Advisory\AdvisoryController@adv_insert')->name('adv.insert');
Route::get('/manage-advisory/active/{id}','Advisory\AdvisoryController@active')->name('adv.status.active');
Route::get('/manage-advisory/inactive/{id}','Advisory\AdvisoryController@inactive')->name('adv.status.inactive');
Route::get('/manage-advisory/delete/{id}','Advisory\AdvisoryController@delete')->name('adv.status.delete');
Route::get('/manage-advisory/edit/{id}','Advisory\AdvisoryController@edit_page')->name('edit.adv');
Route::post('/manage-advisory/update','Advisory\AdvisoryController@update')->name('update.adv');
Route::get('/manage-advisory/view/{id}','Advisory\AdvisoryController@view')->name('view.adv');



//manage product
Route::get('/manage-product','Product\ProductController@prod_list')->name('prod.list');
Route::get('/manage-product/add','Product\ProductController@prod_add_form')->name('prod.add.form');
Route::post('/manage-product/insert','Product\ProductController@prod_insert')->name('prod.insert');
Route::get('/manage-product/active/{id}','Product\ProductController@active')->name('prod.status.active');
Route::get('/manage-product/inactive/{id}','Product\ProductController@inactive')->name('prod.status.inactive');
Route::get('/manage-product/delete/{id}','Product\ProductController@delete')->name('prod.status.delete');
Route::get('/manage-product/edit/{id}','Product\ProductController@edit_page')->name('edit.prod');
Route::post('/manage-product/update','Product\ProductController@update')->name('update.prod');
Route::get('/manage-product/view/{id}','Product\ProductController@view')->name('view.prod');



//contact us
Route::get('/contact-us','ContactUs\ContactUsController@contact_list')->name('contact.list');
Route::get('/contact-us/view/{id}','ContactUs\ContactUsController@contact_view')->name('contact.view');


//content management
Route::get('/content-management','Content\StaticController@static_list')->name('static.list');
Route::get('/content-management/edit/{id}','Content\StaticController@static_edit')->name('content.edit');
Route::post('/content-management/about-us/update','Content\StaticController@about_upd')->name('aboutus.update');
Route::post('/content-management/mission/update','Content\StaticController@mission_upd')->name('mission.update');


//our team
Route::get('/team-management','Team\TeamController@team_list')->name('team.list');
Route::get('/team-management/edit/{id}','Team\TeamController@team_edit_view')->name('team.edit');
Route::post('/team-management/update','Team\TeamController@team_update')->name('team.update');
Route::get('/team-management/view/{id}','Team\TeamController@team_view')->name('team.view');


//terms and conditions
Route::get('/terms_conditions', 'Dasboard\DashboardController@term_list')->name('term.list');
Route::get('/terms_conditions/edit/{id}', 'Dasboard\DashboardController@term_edit')->name('term.edit');
Route::post('/terms_conditions/update', 'Dasboard\DashboardController@term_upd')->name('term.update');



//footer management
Route::get('/footer-management', 'Footer\FooterController@footer_page')->name('footer.page');
Route::post('/footer-management/update', 'Footer\FooterController@footer_upd')->name('upload.footer');


//
Route::get('/users-promo-code/list', 'PromoCode\PromoCodeController@promo_list')->name('promo.list');
Route::get('/users-promo-code/details/{id}', 'PromoCode\PromoCodeController@promo_details')->name('promo.details');
Route::get('/users-promo-code/delete/{id}', 'PromoCode\PromoCodeController@delete_soft_promo')->name('promo.delete');

//get subject on papaer pages ajax
Route::post('/get-subject', 'Paper\PaperController@get_subject')->name('get.subject');


});