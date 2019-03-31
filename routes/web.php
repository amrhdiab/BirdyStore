<?php

//********************************* FRONT-END ROUTES *********************************//
//Home Page
Route::get('/','Front\FrontEndController@index')->name('home');

//Authentication routes
Auth::routes();

//User Routes
Route::get('my-account','Front\UserController@index')->name('user.account');
Route::post('my-account','Front\UserController@update')->name('user.update');
Route::get('my-account/orders','Front\UserController@orders')->name('user.orders');
Route::get('my-account/reviews','Front\UserController@reviews')->name('user.reviews');
Route::get('my-account/orders/{order}','Front\UserController@singleOrder')->name('user.orders.single');
//Shopping Cart Routes
Route::get('my-account/cart','Front\ShoppingCartController@index')->name('cart');
Route::post('my-account/cart/add','Front\ShoppingCartController@add')->name('cart.add');
Route::delete('my-account/cart/remove','Front\ShoppingCartController@remove')->name('cart.remove');
Route::post('my-account/cart/update','Front\ShoppingCartController@update')->name('cart.update');
Route::get('my-account/cart/checkout','Front\ShoppingCartController@checkout')->name('cart.checkout');
Route::post('my-account/cart/checkout','Front\ShoppingCartController@pay')->name('cart.checkout.pay');

//Shop Routes
Route::group(['prefix'=>'shop'], function(){
    //All Products Shop Routes
    Route::get('all','Front\ShopController@index')->name('allProducts');
    Route::get('all/fetch_data','Front\ShopController@fetchData')->name('allProducts.fetchData');
    //Category Products Shop Routes
    Route::get('category/{category}','Front\ShopCatController@index')->name('categoryProducts');
    Route::get('category/{category}/fetch_data/','Front\ShopCatController@fetchData')->name('categoryProducts.fetchData');
    //Sub Category Products Shop Routes
    Route::get('category/{category}/{subCat}','Front\ShopSubCatController@index')->name('subCatProducts');
    Route::get('category/{category}/{subCat}/fetch_data/','Front\ShopSubCatController@fetchData')->name('subCatProducts.fetchData');
    //Single Product Route
    Route::get('product/{product}','Front\ProductController@index')->name('product');
    //Front end review submitting
    Route::post('product/review','Front\ProductController@reviewSubmit')->name('reviews.front.submit');
});

//Static Pages Routes

//Brands
Route::get('brands','Front\FrontEndController@AllBrands')->name('front.all.brands');
Route::get('brands/{brand}','Front\FrontEndController@singleBrand')->name('front.single.brand');
//Stores
Route::get('stores','Front\FrontEndController@AllStores')->name('front.all.stores');
Route::get('stores/{store}','Front\FrontEndController@singleStore')->name('front.single.store');
//Contact Us Page
Route::get('contact','Front\FrontEndController@contactUs')->name('front.contact');
Route::post('contact','Front\FrontEndController@sendMessage')->name('front.contact.send');
//About Us Page
Route::get('about','Front\FrontEndController@aboutUs')->name('front.about');
//Terms and Conditions Page
Route::get('terms','Front\FrontEndController@terms')->name('front.terms');
//Privacy Policy Page
Route::get('privacy','Front\FrontEndController@privacy')->name('front.privacy');
//Newsletter
Route::post('newsletter','Front\FrontEndController@newsletter')->name('front.newsletter');

//********************************* BACK-END ROUTES *********************************//

//The separate ADMIN LOGIN SYSTEM Routes
Route::group(['prefix'=>'admin'], function(){
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'Auth\AdminController@index')->name('admin.dashboard');
});

//Admin dashboard route
//Route::get('/admin', 'Auth\AdminController@index')->name('admin');

//Admin Panel Routes
Route::group(['prefix'=>'admin' , 'middleware'=>'auth:admin'], function(){
    /////////////////////////////> WEBSITE SETTINGS <////////////////////////
    Route::resource('settings','SettingController');
    /////////////////////////////> CATEGORIES </////////////////////////////
    //Categories Fetch data
    Route::get('/categories/data','CategoryController@fetchData')->name('categories.fetch');
    //Categories Fetch Single data
    Route::get('/categories/single-item','CategoryController@fetch_single')->name('categories.fetch.single');
    //Categories View data
    Route::get('/categories/view','CategoryController@view')->name('categories.view');
    //Categories Remove Single data
    Route::delete('/categories/delete-item','CategoryController@removeData')->name('categories.remove');
    //Categories Bulk Remove Single data
    Route::delete('/categories/delete-bulk','CategoryController@removeBulk')->name('categories.remove.bulk');
    //Resource route (Store & Index)
    Route::resource('categories','CategoryController');

    /////////////////////////////> SUB-CATEGORIES </////////////////////////////

    //Sub-Categories Fetch data
    Route::get('/sub_categories/data','SubCatsController@fetchData')->name('subcategories.fetch');
    //Sub-Categories Fetch Single data
    Route::get('/sub_categories/single-item','SubCatsController@fetch_single')->name('subcategories.fetch.single');
    //Sub-Categories View data
    Route::get('/sub_categories/view','SubCatsController@view')->name('subcategories.view');
    //Sub-Categories Remove Single data
    Route::delete('/sub_categories/delete-item','SubCatsController@removeData')->name('subcategories.remove');
    //Sub-Categories Bulk Remove Single data
    Route::delete('/sub_categories/delete-bulk','SubCatsController@removeBulk')->name('subcategories.remove.bulk');
    //Get all categories
    Route::get('sub_categories/all_categories','SubCatsController@getAllCategories')->name('getAllCategories');
    //Resource route (Store & Index)
    Route::resource('sub_categories','SubCatsController');

    /////////////////////////////> BRANDS </////////////////////////////

    //Brands Fetch data
    Route::get('brands/data','BrandController@fetchData')->name('brands.fetch');
    //Brands Fetch Single data
    Route::get('brands/single-item','BrandController@fetch_single')->name('brands.fetch.single');
    //Brands View data
    Route::get('brands/view','BrandController@view')->name('brands.view');
    //Brands Remove Single data
    Route::delete('brands/delete-item','BrandController@removeData')->name('brands.remove');
    //Brands Bulk Remove Single data
    Route::delete('brands/delete-bulk','BrandController@removeBulk')->name('brands.remove.bulk');
    //Get all Brands
    Route::get('brands/all_categories','BrandController@categoriesSelect')->name('categoriesSelect');
    //Resource route (Store & Index)
    Route::resource('brands','BrandController');

    /////////////////////////////> STORES </////////////////////////////

    //Stores Fetch data
    Route::get('stores/data','StoreController@fetchData')->name('stores.fetch');
    //Stores Fetch Single data
    Route::get('stores/single-item','StoreController@fetch_single')->name('stores.fetch.single');
    //Stores View data
    Route::get('stores/view','StoreController@view')->name('stores.view');
    //Stores Remove Single data
    Route::delete('stores/delete-item','StoreController@removeData')->name('stores.remove');
    //Stores Bulk Remove Single data
    Route::delete('stores/delete-bulk','StoreController@removeBulk')->name('stores.remove.bulk');
    //Get all Stores
    Route::get('stores/all_categories','StoreController@dataSelect')->name('dataSelect');
    //Get city options for the dropDown
    Route::get('stores/get-city','StoreController@selectCity')->name('selectCity');
    //Resource route (Store & Index)
    Route::resource('stores','StoreController');

/////////////////////////////> PRODUCTS </////////////////////////////

    //Products Fetch data
    Route::get('products/data','ProductController@fetchData')->name('products.fetch');
    //Products Fetch Single data
    Route::get('products/single-item','ProductController@fetch_single')->name('products.fetch.single');
    //Products View data
    Route::get('products/view','ProductController@view')->name('products.view');
    //Products Remove Single data
    Route::delete('products/delete-item','ProductController@removeData')->name('products.remove');
    //Products Bulk Remove Single data
    Route::delete('products/delete-bulk','ProductController@removeBulk')->name('products.remove.bulk');
    //Get all Stores For multi select
    Route::get('products/all_stores','ProductController@dataSelect')->name('products.dataSelect');
    //Resource route (Store & Index)
    Route::resource('products','ProductController');

    /////////////////////////////> ORDERS </////////////////////////////

    //Orders Fetch data
    Route::get('orders/data','OrderController@fetchData')->name('orders.fetch');
    //Orders View data
    Route::get('orders/view','OrderController@view')->name('orders.view');
    //Orders Remove Single data
    Route::delete('orders/delete-item','OrderController@removeData')->name('orders.remove');
    //Orders Bulk Remove Single data
    Route::delete('orders/delete-bulk','OrderController@removeBulk')->name('orders.remove.bulk');
    //Get status options for the dropDown
    Route::get('orders/get-status','OrderController@selectStatus')->name('selectStatus');
    //Resource route (Store & Index)
    Route::resource('orders','OrderController');

    /////////////////////////////> REVIEWS </////////////////////////////

    //Reviews Fetch data
    Route::get('reviews/data','ReviewController@fetchData')->name('reviews.fetch');
    //Reviews View data
    Route::get('reviews/view','ReviewController@view')->name('reviews.view');
    //Reviews Remove Single data
    Route::delete('reviews/delete-item','ReviewController@removeData')->name('reviews.remove');
    //Reviews Bulk Remove Single data
    Route::delete('reviews/delete-bulk','ReviewController@removeBulk')->name('reviews.remove.bulk');
    //Resource route (Store & Index)
    Route::resource('reviews','ReviewController');

    /////////////////////////////> MESSAGES </////////////////////////////

    //Get all messages
    Route::get('messages','MessageController@index')->name('messages.index');
    //Get single message
    Route::get('messages/{message}','MessageController@message')->name('messages.single');
    //Delete message
    Route::delete('messages/{message}','MessageController@delete')->name('messages.delete');
});

