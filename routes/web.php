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

/*
|--------------------------------------------------------------------------
| Frontend Pages Route
|--------------------------------------------------------------------------
*/
Route::get('/','Frontend\PagesController@index')->name('index');

/*
|--------------------------------------------------------------------------
| FRONTEND P R O D U C T PAGES ROUTE
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'product'],function(){

    /*
    |--------------------------------------------------------------------------
    | All Product Page Route
    |--------------------------------------------------------------------------
    */
    Route::get('/','Frontend\ProductController@product')->name('product');

    /*
    |--------------------------------------------------------------------------
    | Show Single Product Details Route
    |--------------------------------------------------------------------------
    */
    Route::get('/{slug}','frontend\ProductController@show')->name('products.show');

    /*
    |--------------------------------------------------------------------------
    | Search Route ******
    |--------------------------------------------------------------------------
    | V.I.P* NOTE: 
    |               If you just make url /search then it will think search is 
    |               new {slug} then it will make problem
    |               so make this url like --> /new/search
    |--------------------------------------------------------------------------
    */
    Route::get('/new/search','Frontend\PagesController@search')->name('search');

    /*
    |--------------------------------------------------------------------------
    | Category Route
    |--------------------------------------------------------------------------
    */
    Route::get('/category','Frontend\CategoryController@index')->name('category.index');
    Route::get('/category/{id}','Frontend\CategoryController@show')->name('category.show');

});



/*
|--------------------------------------------------------------------------
| Backend Pages Route
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin'],function(){

    Route::get('/','Backend\PagesController@index')->name('admin.index');

    /*
    |--------------------------------------------------------------------------
    | Admin Login, Logout Route
    |--------------------------------------------------------------------------
    */
    Route::get('/login','Auth\Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit','Auth\Admin\LoginController@login')->name('admin.login.submit');
    Route::post('/logout/submit','Auth\Admin\LoginController@logout')->name('admin.logout');


    /*
    |--------------------------------------------------------------------------
    | Admin Password-Reset Send Email link Route
    |--------------------------------------------------------------------------
    */
    Route::get('/password/reset','Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email','Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');


    /*
    |--------------------------------------------------------------------------
    | Admin Password-Reset Route
    |--------------------------------------------------------------------------
    */
    Route::get('/password/reset/{token}','Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset','Auth\Admin\ResetPasswordController@reset')->name('admin.password.reset.email');
    


    /*
    |--------------------------------------------------------------------------
    | Product CRUD < CREATE, READ, UPDATE, DELETE >
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'product'],function(){
        
        /* C R E A T E  PART */
        Route::get('/create','Backend\ProductController@create')->name('admin.product.create');
        Route::post('/store','Backend\ProductController@store')->name('admin.product.store');

        /* R E A D  PART */
        Route::get('/manage','Backend\ProductController@index')->name('admin.product.manage'); //show all product

        /* U P D A T E  PART */
        Route::get('/edit/{id}','Backend\ProductController@edit')->name('admin.product.edit');
        Route::post('/update/{id}','Backend\ProductController@update')->name('admin.product.update');

        /* D E L E T E  PART */
        Route::get('/delete/{id}','Backend\ProductController@delete')->name('admin.product.delete');
        Route::get('/view/{id}','Backend\ProductController@show')->name('admin.product.show');
    
    });


    /*
    |--------------------------------------------------------------------------
    | ORDER ROUTE <---> CRUD < CREATE, READ, UPDATE, DELETE >
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'order'],function(){
    
        /* C R E A T E  PART */
        /* Route::get('create','Backend\OrderController@create')->name('admin.category.create');
        Route::post('store','Backend\OrderController@store')->name('admin.category.store'); */

        /* R E A D  PART */
        Route::get('manage','Backend\OrderController@index')->name('admin.order'); //show all order

        Route::get('view/{id}','Backend\OrderController@show')->name('admin.order.show'); //show single order
        /* Route::get('view/{id}','Backend\OrderController@show'); */ // for url method

        /* U P D A T E  PART */
        /* Route::get('edit/{id}','Backend\OrderController@edit');
        Route::post('update/{id}','Backend\OrderController@update'); */

        /* D E L E T E  PART */
        Route::get('delete/{id}','Backend\OrderController@delete')->name('admin.order.delete');
        /* Route::post('delete/{id}','Backend\OrderController@delete'); */ // for url method

        /* C O M P L E T E D  PART */
        Route::post('completed/{id}','Backend\OrderController@completed')->name('admin.order.completed');

        /* P A I D  PART */
        Route::post('paid/{id}','Backend\OrderController@paid')->name('admin.order.paid');

        /* SHIPPING C-H-A-R-G-E  PART */
        Route::post('charge-update/{id}','Backend\OrderController@chargeUpdate')->name('admin.order.charge');

        /* SHIPPING I-N-V-O-I-C-E  PART */
        Route::get('invoice/{id}','Backend\OrderController@generateInvoice')->name('admin.order.invoice');
    
    });

    

    /*
    |--------------------------------------------------------------------------
    | Category CRUD < CREATE, READ, UPDATE, DELETE >
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'category'],function(){
        
        /* C R E A T E  PART */
        Route::get('/create','Backend\CategoryController@create')->name('admin.category.create');
        Route::post('/store','Backend\CategoryController@store')->name('admin.category.store');

        /* R E A D  PART */
        Route::get('/manage','Backend\CategoryController@index')->name('admin.category.manage'); //show all category

        /* U P D A T E  PART */
        Route::get('/edit/{id}','Backend\CategoryController@edit')->name('admin.category.edit');
        Route::post('/update/{id}','Backend\CategoryController@update')->name('admin.category.update');

        /* D E L E T E  PART */
        Route::get('/delete/{id}','Backend\CategoryController@delete')->name('admin.category.delete');
        Route::get('/view/{id}','Backend\CategoryController@show')->name('admin.category.show');
    
    });

    /*
    |--------------------------------------------------------------------------
    | Brand CRUD < CREATE, READ, UPDATE, DELETE >
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'brand'],function(){
        
        /* C R E A T E  PART */
        Route::get('/create','Backend\BrandController@create')->name('admin.brand.create');
        Route::post('/store','Backend\BrandController@store')->name('admin.brand.store');

        /* R E A D  PART */
        Route::get('/manage','Backend\BrandController@index')->name('admin.brand.manage'); //show all Brand

        /* U P D A T E  PART */
        Route::get('/edit/{id}','Backend\BrandController@edit')->name('admin.brand.edit');
        Route::post('/update/{id}','Backend\BrandController@update')->name('admin.brand.update');

        /* D E L E T E  PART */
        Route::get('/delete/{id}','Backend\BrandController@delete')->name('admin.brand.delete');
        Route::get('/view/{id}','Backend\BrandController@show')->name('admin.brand.show');
    
    });

    /*
    |--------------------------------------------------------------------------
    | Division CRUD < CREATE, READ, UPDATE, DELETE >
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'division'],function(){
        
        /* C R E A T E  PART */
        Route::get('/create','Backend\DivisionController@create')->name('admin.division.create');
        Route::post('/store','Backend\DivisionController@store')->name('admin.division.store');

        /* R E A D  PART */
        Route::get('/manage','Backend\DivisionController@index')->name('admin.division.manage'); //show all Brand

        /* U P D A T E  PART */
        Route::get('/edit/{id}','Backend\DivisionController@edit')->name('admin.division.edit');
        Route::post('/update/{id}','Backend\DivisionController@update')->name('admin.division.update');

        /* D E L E T E  PART */
        Route::get('/delete/{id}','Backend\DivisionController@delete')->name('admin.division.delete');
        Route::get('/view/{id}','Backend\DivisionController@show')->name('admin.division.show');
    
    });

    /*
    |--------------------------------------------------------------------------
    | District CRUD < CREATE, READ, UPDATE, DELETE >
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'district'],function(){
        
        /* C R E A T E  PART */
        Route::get('/create','Backend\DistrictController@create')->name('admin.district.create');
        Route::post('/store','Backend\DistrictController@store')->name('admin.district.store');

        /* R E A D  PART */
        Route::get('/manage','Backend\DistrictController@index')->name('admin.district.manage'); //show all Brand

        /* U P D A T E  PART */
        Route::get('/edit/{id}','Backend\DistrictController@edit')->name('admin.district.edit');
        Route::post('/update/{id}','Backend\DistrictController@update')->name('admin.district.update');

        /* D E L E T E  PART */
        Route::get('/delete/{id}','Backend\DistrictController@delete')->name('admin.district.delete');
        Route::get('/view/{id}','Backend\DistrictController@show')->name('admin.district.show');
    
    });


    /*
    |--------------------------------------------------------------------------
    | SLIDER CRUD < CREATE, READ, UPDATE, DELETE > MAKE ALL SLIDER BY SAME PRO.
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'slider'],function(){
        
        /* C R E A T E  PART */
        /* Route::get('create','Backend\SliderController@create')->name('admin.slider.create'); */
        Route::post('store','Backend\SliderController@store')->name('admin.slider.store');

        /* R E A D  PART */
        Route::get('manage','Backend\SliderController@manage')->name('admin.slider.manage'); //show all product

        /* U P D A T E  PART */
        Route::get('edit/{id}','Backend\SliderController@edit');
        /* Route::post('update/{id}','Backend\SliderController@update'); */
        Route::post('update/{id}','Backend\SliderController@update')->name('admin.slider.update');

        /* D E L E T E  PART */
        Route::get('delete/{id}','Backend\SliderController@delete')->name('admin.slider.delete');
        Route::get('view/{id}','Backend\SliderController@show')->name('admin.slider.show');
    
    });

});

/*
|--------------------------------------------------------------------------
| AUTHENTICATION route 
|--------------------------------------------------------------------------
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| User route 
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'user'],function(){

    Route::get('/token/{token}','Frontend\VerificationController@verify')->name('user.verification');
    Route::get('/dashboard','Frontend\UserController@dashboard')->name('user.dashboard');
    Route::get('/profile','Frontend\UserController@profile')->name('user.profile');
    Route::post('/profile/update','Frontend\UserController@profileUpdate')->name('user.profile.update');

});


/*
|--------------------------------------------------------------------------
| Cart route 
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'carts'],function(){

    Route::get('/','Frontend\CartController@index')->name('carts');
    Route::post('/store','Frontend\CartController@store')->name('carts.store');
    Route::post('/update/{id}','Frontend\CartController@update')->name('carts.update');
    Route::post('/delete/{id}','Frontend\CartController@delete')->name('carts.delete');

});

/*
|--------------------------------------------------------------------------
| Check-Out route
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'checkouts'],function(){

    Route::get('/','Frontend\CheckoutController@index')->name('checkouts');
    Route::post('/store','Frontend\CheckoutController@store')->name('checkouts.store');

});


/*
|--------------------------------------------------------------------------
| MULTIPLE DISTRICT SELECT WITH DIVISION
|--------------------------------------------------------------------------
| API route AJAX
|--------------------------------------------------------------------------
*/
Route::get('get-districts/{id}',function($id){

    return json_encode(App\Models\District::where('division_id', $id)->get());
});


