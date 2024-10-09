<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\Admin\ProjectController; 
use App\Http\Controllers\Admin\ReviewController; 
use App\Http\Controllers\Admin\ContactMailController; 
use App\Http\Controllers\Admin\GalleryController; 
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\User\UserController;

//admin part start
Route::group(['prefix' =>'admin/', 'middleware' => ['auth', 'is_admin']], function(){
    Route::get('dashboard', [HomeController::class, 'adminHome'])->name('admin.dashboard')->middleware('is_admin');
    //profile
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::put('profile/{id}', [AdminController::class, 'adminProfileUpdate']);
    Route::post('changepassword', [AdminController::class, 'changeAdminPassword']);
    Route::put('image/{id}', [AdminController::class, 'adminImageUpload']);
    //profile end
    //admin registration
    Route::get('register','App\Http\Controllers\Admin\AdminController@adminindex');
    Route::post('register','App\Http\Controllers\Admin\AdminController@adminstore');
    Route::get('register/{id}/edit','App\Http\Controllers\Admin\AdminController@adminedit');
    Route::put('register/{id}','App\Http\Controllers\Admin\AdminController@adminupdate');
    Route::get('register/{id}', 'App\Http\Controllers\Admin\AdminController@admindestroy');
    //admin registration end
    //agent registration
    Route::get('agent-register','App\Http\Controllers\Admin\AdminController@agentindex');
    Route::post('agent-register','App\Http\Controllers\Admin\AdminController@agentstore');
    Route::get('agent-register/{id}/edit','App\Http\Controllers\Admin\AdminController@agentedit');
    Route::put('agent-register/{id}','App\Http\Controllers\Admin\AdminController@agentupdate');
    Route::get('agent-register/{id}', 'App\Http\Controllers\Admin\AdminController@agentdestroy');
    // certificate update
    // Route::post('image-upload', 'App\Http\Controllers\Admin\AdminController@agentCertificateUpdate')->name('image.upload.post');
    //agent registration end
    //user registration
    Route::get('user-register','App\Http\Controllers\Admin\AdminController@userindex');
    Route::post('user-register','App\Http\Controllers\Admin\AdminController@userstore');
    Route::get('user-register/{id}/edit','App\Http\Controllers\Admin\AdminController@useredit');
    Route::put('user-register/{id}','App\Http\Controllers\Admin\AdminController@userupdate');
    Route::get('user-register/{id}', 'App\Http\Controllers\Admin\AdminController@userdestroy');
    //user registration end
    //code master 
    Route::resource('softcode','App\Http\Controllers\Admin\SoftcodeController');
    Route::resource('master','App\Http\Controllers\Admin\MasterController');
    //code master end
    //company details
    Route::resource('company-detail','App\Http\Controllers\Admin\CompanyDetailController');
    //company details end
    //slider 
    Route::resource('sliders','App\Http\Controllers\Admin\SliderController');
    Route::get('activeslider','App\Http\Controllers\Admin\SliderController@activeslider');
    //slider end
    Route::resource('seo-settings','App\Http\Controllers\Admin\SeoSettingController');


    Route::resource('role','App\Http\Controllers\RoleController');
    Route::post('roleupdate','App\Http\Controllers\RoleController@roleUpdate');
    Route::resource('staff','App\Http\Controllers\StaffController');

    // client 
    Route::get('/client', [ClientController::class, 'index'])->name('admin.client');
    Route::post('/client', [ClientController::class, 'store']);
    Route::get('/client/{id}/edit', [ClientController::class, 'edit']);
    Route::post('/client/{id}', [ClientController::class, 'update']);
    Route::get('/client/{id}', [ClientController::class, 'delete']);

    

    // service  
    Route::get('/service', [ServiceController::class, 'index'])->name('admin.service');
    Route::post('/service', [ServiceController::class, 'store']);
    Route::get('/service/{id}/edit', [ServiceController::class, 'edit']);
    Route::put('/service/{id}', [ServiceController::class, 'update']);
    Route::get('/service/{id}', [ServiceController::class, 'delete']);

    

    // blog Category 
    Route::get('/blog-category', [BlogController::class, 'category'])->name('admin.blog_category');
    Route::post('/blog-category', [BlogController::class, 'categorystore']);
    Route::get('/blog-category/{id}/edit', [BlogController::class, 'categoryedit']);
    Route::put('/blog-category/{id}', [BlogController::class, 'categoryupdate']);
    Route::get('/blog-category/{id}', [BlogController::class, 'categorydelete']);

    // blog  
    Route::get('/blog', [BlogController::class, 'index'])->name('admin.blog');
    Route::post('/blog', [BlogController::class, 'store']);
    Route::get('/blog/{id}/edit', [BlogController::class, 'edit']);
    Route::put('/blog/{id}', [BlogController::class, 'update']);
    Route::get('/blog/{id}', [BlogController::class, 'delete']);
    

    // gallery Category 
    Route::get('/gallery-category', [GalleryController::class, 'category'])->name('admin.gallery_category');
    Route::post('/gallery-category', [GalleryController::class, 'categorystore']);
    Route::get('/gallery-category/{id}/edit', [GalleryController::class, 'categoryedit']);
    Route::put('/gallery-category/{id}', [GalleryController::class, 'categoryupdate']);
    Route::get('/gallery-category/{id}', [GalleryController::class, 'categorydelete']);

    Route::get('/gallery', [GalleryController::class, 'index'])->name('admin.gallery');
    Route::post('/gallery', [GalleryController::class, 'store']);
    Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit']);
    Route::put('/gallery/{id}', [GalleryController::class, 'update']);
    Route::get('/gallery/{id}', [GalleryController::class, 'delete']);

    // photo
    Route::get('/photo', [ImageController::class, 'index'])->name('admin.photo');
    Route::post('/photo', [ImageController::class, 'store']);
    Route::get('/photo/{id}/edit', [ImageController::class, 'edit']);
    Route::put('/photo/{id}', [ImageController::class, 'update']);
    Route::get('/photo/{id}', [ImageController::class, 'delete']);

    // contact mail 
    Route::get('/contact-mail', [ContactMailController::class, 'index'])->name('admin.contact-mail');
    Route::get('/contact-mail/{id}/edit', [ContactMailController::class, 'edit']);
    Route::put('/contact-mail/{id}', [ContactMailController::class, 'update'])->name('admin.contact.update');
    
    
    Route::get('/project-image/{id}', [ProjectController::class, 'image'])->name('projectimage');
    Route::post('/project-image', [ProjectController::class, 'imageStore']);
    Route::get('/project-image-delete/{id}', [ProjectController::class, 'imageDelete']);

    Route::get('/project', [ProjectController::class, 'index'])->name('admin.project');
    Route::post('/project', [ProjectController::class, 'store']);
    Route::get('/project/{id}/edit', [ProjectController::class, 'edit']);
    Route::put('/project/{id}', [ProjectController::class, 'update']);
    Route::get('/project/{id}', [ProjectController::class, 'delete']);

    Route::get('/reviews', [ReviewController::class, 'index'])->name('admin.reviews');
    Route::post('/reviews', [ReviewController::class, 'store']);
    Route::get('/reviews/{id}/edit', [ReviewController::class, 'edit']);
    Route::put('/reviews/{id}', [ReviewController::class, 'update']);
    Route::get('/reviews/{id}', [ReviewController::class, 'delete']);


});
//admin part end