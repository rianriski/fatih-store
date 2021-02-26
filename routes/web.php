<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('FrontEnd\app');
});

Route::get('/login', function () {
    return view('FrontEnd\login');
});

// Route::view('/{any}', 'app')->where('any', '.*');

// controller login
Auth::routes(['verify' => true]);

Route::get('API/products', 'API\ProductController@index');
Route::get('API/products/condition/', 'API\ProductController@condition');
Route::get('API/products/price/', 'API\ProductController@price');
Route::get('API/products/cheapest/', 'API\ProductController@cheapest');
Route::get('API/products/expensive/', 'API\ProductController@expensive');
Route::get('API/products/best/', 'API\ProductController@best');
Route::get('API/products/category/', 'API\ProductController@category');
Route::get('API/products/search/', 'API\ProductController@search');
Route::get('API/products/similar/', 'API\ProductController@similar');

Route::get('API/posts/latest/', 'API\ArticleController@latest');
Route::get('API/posts/first/', 'API\ArticleController@first');
Route::get('API/posts/popular/', 'API\ArticleController@popular');
Route::get('API/posts/byid/', 'API\ArticleController@byid');

Route::get('API/categories', 'API\CategoryController@index');
Route::get('API/detail/', 'API\DetailProductController@all');

Route::group(['middleware' => ['auth', 'role:admin', 'verified']], function () {

    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');

    // penugasan
    Route::get('/hotel', 'Admin\HotelController@index')->name('hotels');
    Route::get('/hotel/create', 'Admin\HotelController@create')->name('hotels.create');
    Route::post('/hotel/store', 'Admin\HotelController@store')->name('hotels.store');
    Route::get('/hotel/search', 'Admin\HotelController@search')->name('hotels.search');
    Route::get('/hotel/{id}/edit', 'Admin\HotelController@edit')->name('hotels.edit');
    Route::post('/hotel/{id}/update', 'Admin\HotelController@update')->name('hotels.update');
    Route::post('/hotel/{id}/destroy', 'Admin\HotelController@destroy')->name('hotels.destroy');

    Route::get('/transactions/revenue', 'Admin\DashboardController@revenue')->name('dashboard.revenue');
    Route::get('/transactions/success', 'Admin\DashboardController@success')->name('dashboard.success');
    Route::get('/transactions/pending', 'Admin\DashboardController@pending')->name('dashboard.pending');
    Route::get('/transactions/payment', 'Admin\DashboardController@payment')->name('dashboard.payment');
    Route::get('/transactions/receipt', 'Admin\DashboardController@receipt')->name('dashboard.receipt');
    Route::get('/transactions/complained', 'Admin\DashboardController@complained')->name('dashboard.complained');
    Route::get('/transactions/failed', 'Admin\DashboardController@failed')->name('dashboard.failed');

    // customer
    Route::get('/customers/', 'Admin\CustomerController@index')->name('customers');
    Route::get('/customers/{id}/show', 'Admin\CustomerController@show')->name('customers.show');
    Route::get('/customers/{id}/edit', 'Admin\CustomerController@edit')->name('customers.edit');
    Route::get('/customers/search', 'Admin\CustomerController@search')->name('customers.search');
    Route::post('/customers/{id}/update', 'Admin\CustomerController@update')->name('customers.update');
    Route::post('/customers/{id}/destroy', 'Admin\CustomerController@destroy')->name('customers.destroy');

    // category
    Route::get('/products/categories', 'Admin\CategoryController@index')->name('categories');
    Route::get('/products/categories/create', 'Admin\CategoryController@create')->name('categories.create');
    Route::get('/products/categories/{id}/edit', 'Admin\CategoryController@edit')->name('categories.edit');
    Route::get('/products/categories/search', 'Admin\CategoryController@search')->name('categories.search');
    Route::post('/products/categories/{id}/update', 'Admin\CategoryController@update')->name('categories.update');
    Route::post('/products/categories/store', 'Admin\CategoryController@store')->name('categories.store');
    Route::post('/products/categories/{id}/destroy', 'Admin\CategoryController@destroy')->name('categories.destroy');

    // list product
    Route::get('/products/list', 'Admin\ProductController@index')->name('products')->middleware('verified');
    Route::get('/products/list/create', 'Admin\ProductController@create')->name('products.create');
    Route::get('/products/list/{id}/show', 'Admin\ProductController@show')->name('products.show');
    Route::get('/products/list/{id}/edit', 'Admin\ProductController@edit')->name('products.edit');
    Route::get('/products/list/search', 'Admin\ProductController@search')->name('products.search');
    Route::post('/products/list/{id}/update', 'Admin\ProductController@update')->name('products.update');
    Route::post('/products/list/{id}/destroy', 'Admin\ProductController@destroy')->name('products.destroy');
    Route::post('/products/list/store', 'Admin\ProductController@store')->name('products.store');

    // review
    Route::get('/products/review', 'Admin\ReviewController@index')->name('reviews');
    Route::get('/products/review/{id}/show', 'Admin\ReviewController@show')->name('reviews.show');
    Route::get('/products/review/{id}/edit', 'Admin\ReviewController@edit')->name('reviews.edit');
    Route::get('/products/review/search', 'Admin\ReviewController@search')->name('reviews.search');
    Route::post('/products/review/{id}/update', 'Admin\ReviewController@update')->name('reviews.update');
    Route::post('/products/review/{id}/destroy', 'Admin\ReviewController@destroy')->name('reviews.destroy');

    // transaction list
    Route::get('/transactions/list', 'Admin\TransactionController@index')->name('transactions');
    Route::get('/transactions/list/create', 'Admin\TransactionController@create')->name('transactions.create');
    Route::get('/transactions/list/{id}/edit', 'Admin\TransactionController@edit')->name('transactions.edit');
    Route::get('/transactions/list/search', 'Admin\TransactionController@search')->name('transactions.search');
    Route::post('/transactions/list/store', 'Admin\TransactionController@store')->name('transactions.store');
    Route::post('/transactions/list/{id}/destroy', 'Admin\TransactionController@destroy')->name('transactions.destroy');

    // returns
    Route::get('/transactions/return', 'Admin\InvoiceReturnController@index')->name('returns');
    Route::get('/transactions/return/{id}/show', 'Admin\InvoiceReturnController@show')->name('returns.show');
    Route::get('/transactions/return/search', 'Admin\InvoiceReturnController@search')->name('returns.search');
    Route::get('/transactions/return/{id}/edit', 'Admin\InvoiceReturnController@edit')->name('returns.edit');

    // shipping address
    Route::get('/shipping/address', 'Admin\ShippingAddressController@index')->name('shipping.addresses');
    Route::get('/shipping/address/create', 'Admin\ShippingAddressController@create')->name('shipping.addresses.create');
    Route::get('/shipping/address/{id}/show', 'Admin\ShippingAddressController@show')->name('shipping.addresses.show');
    Route::get('/shipping/address/{id}/edit', 'Admin\ShippingAddressController@edit')->name('shipping.addresses.edit');
    Route::get('/shipping/address/search', 'Admin\ShippingAddressController@search')->name('shipping.addresses.search');
    Route::post('/shipping/address/{id}/update', 'Admin\ShippingAddressController@update')->name('shipping.addresses.update');
    Route::post('/shipping/address/{id}/destroy', 'Admin\ShippingAddressController@destroy')->name('shipping.addresses.destroy');
    Route::post('/shipping/address/store', 'Admin\ShippingAddressController@store')->name('shipping.addresses.store');

    // invoice
    Route::get('/invoices', 'Admin\InvoiceController@index')->name('invoices');
    Route::get('/invoices/create', 'Admin\InvoiceController@create')->name('invoices.create');
    Route::get('/invoices/create/{user_id}', 'Admin\InvoiceController@dropdownUser');
    Route::get('/invoices/{id}/show', 'Admin\InvoiceController@show')->name('invoices.show');
    Route::get('/invoices/{id}/edit', 'Admin\InvoiceController@edit')->name('invoices.edit');
    Route::get('/invoices/{id}/pending', 'Admin\InvoiceController@pending')->name('invoices.pending');
    Route::get('/invoices/{id}/success', 'Admin\InvoiceController@success')->name('invoices.success');
    Route::get('/invoices/{id}/failed', 'Admin\InvoiceController@failed')->name('invoices.failed');
    Route::get('/invoices/search', 'Admin\InvoiceController@search')->name('invoices.search');
    Route::post('/invoices/store', 'Admin\InvoiceController@store')->name('invoices.store');
    Route::post('/invoices/store/total/{id}/{total}', 'Admin\InvoiceController@totalStore')->name('invoices.total_store');
    Route::post('/invoices/{id}/destroy', 'Admin\InvoiceController@destroy')->name('invoices.destroy');

    // coupon
    Route::get('/coupons', 'Admin\CouponController@index')->name('coupons');
    Route::get('/coupons/create', 'Admin\CouponController@create')->name('coupons.create');
    Route::get('/coupons/{id}/edit', 'Admin\CouponController@edit')->name('coupons.edit');
    Route::post('/coupons/store', 'Admin\CouponController@store')->name('coupons.store');
    Route::post('/coupons/{id}/update', 'Admin\CouponController@update')->name('coupons.update');
    Route::post('/coupons/{id}/destroy', 'Admin\CouponController@destroy')->name('coupons.destroy');

    // payment
    Route::get('/payments', 'Admin\PaymentController@index')->name('payments');
    Route::get('/payments/create', 'Admin\PaymentController@create')->name('payments.create');
    Route::get('/payments/{id}/show', 'Admin\PaymentController@show')->name('payments.show');
    Route::get('/payments/{id}/edit', 'Admin\PaymentController@edit')->name('payments.edit');
    Route::get('/payments/{id}/pending', 'Admin\PaymentController@pending')->name('payments.pending');
    Route::get('/payments/{id}/success', 'Admin\PaymentController@success')->name('payments.success');
    Route::get('/payments/{id}/failed', 'Admin\PaymentController@failed')->name('payments.failed');
    Route::post('/payments/store', 'Admin\PaymentController@store')->name('payments.store');
    Route::post('/payments/{id}/destroy', 'Admin\PaymentController@destroy')->name('payments.destroy');

    // receipt
    Route::get('/receipts', 'Admin\ReceiptController@index')->name('receipts');
    Route::get('/receipts/create', 'Admin\ReceiptController@create')->name('receipts.create');
    Route::get('/receipts/{id}/edit', 'Admin\ReceiptController@edit')->name('receipts.edit');
    Route::get('/receipts/search', 'Admin\ReceiptController@search')->name('receipts.search');
    Route::post('/receipts/store', 'Admin\ReceiptController@store')->name('receipts.store');
    Route::post('/receipts/{id}/update', 'Admin\ReceiptController@update')->name('receipts.update');
    Route::post('/receipts/{id}/destroy', 'Admin\ReceiptController@destroy')->name('receipts.destroy');

    // messages
    Route::get('/messages', 'Admin\MessageController@index')->name('messages');
    Route::get('/messages/create', 'Admin\MessageController@create')->name('messages.create');
    Route::get('/messages/{id}/edit', 'Admin\MessageController@edit')->name('messages.edit');
    Route::get('/messages/search', 'Admin\MessageController@search')->name('messages.search');
    Route::get('/messages/{message_id}/close', 'Admin\MessageController@close')->name('messages.chat.close');
    Route::post('/messages/store', 'Admin\MessageController@store')->name('messages.store');
    Route::post('/messages/store/{id}/{user_id}/{uuid}/chat', 'Admin\MessageController@chatStore')->name('messages.chat.store');
    Route::post('/messages/{id}/destroy', 'Admin\MessageController@destroy')->name('messages.destroy');

    // post category
    Route::get('/blog/categories', 'Admin\PostCategoryController@index')->name('post.categories');
    Route::get('/blog/categories/create', 'Admin\PostCategoryController@create')->name('post.categories.create');
    Route::get('/blog/categories/{id}/edit', 'Admin\PostCategoryController@edit')->name('post.categories.edit');
    Route::post('/blog/categories/{id}/update', 'Admin\PostCategoryController@update')->name('post.categories.update');
    Route::post('/blog/categories/store', 'Admin\PostCategoryController@store')->name('post.categories.store');
    Route::post('/blog/categories/{id}/destroy', 'Admin\PostCategoryController@destroy')->name('post.categories.destroy');

    // post
    Route::get('/blog/posts', 'Admin\PostController@index')->name('posts');
    Route::get('/blog/posts/create', 'Admin\PostController@create')->name('posts.create');
    Route::get('/blog/posts/{id}/edit', 'Admin\PostController@edit')->name('posts.edit');
    Route::get('/blog/posts/search', 'Admin\PostController@search')->name('posts.search');
    Route::post('/blog/posts/store', 'Admin\PostController@store')->name('posts.store');
    Route::post('/blog/posts/{id}/update', 'Admin\PostController@update')->name('posts.update');
    Route::post('/blog/posts/{id}/destroy', 'Admin\PostController@destroy')->name('posts.destroy');

    // comment
    Route::get('/blog/comments', 'Admin\CommentController@index')->name('comments');
    Route::get('/blog/comments/create', 'Admin\CommentController@create')->name('comments.create');
    Route::get('/blog/comments/{id}/edit', 'Admin\CommentController@edit')->name('comments.edit');
    Route::get('/blog/comments/search', 'Admin\CommentController@search')->name('comments.search');
    Route::post('/blog/comments/store', 'Admin\CommentController@store')->name('comments.store');
    Route::post('/blog/comments/{id}/update', 'Admin\CommentController@update')->name('comments.update');
    Route::post('/blog/comments/{id}/destroy', 'Admin\CommentController@destroy')->name('comments.destroy');

    // newsletter
    Route::get('/newsletters', 'Admin\NewsletterController@index')->name('newsletters');
    Route::get('/newsletters/create', 'Admin\NewsletterController@create')->name('newsletters.create');
    Route::get('/newsletters/{id}/edit', 'Admin\NewsletterController@edit')->name('newsletters.edit');
    Route::get('/newsletters/search', 'Admin\NewsletterController@search')->name('newsletters.search');
    Route::post('/newsletters/store', 'Admin\NewsletterController@store')->name('newsletters.store');
    Route::post('/newsletters/{id}/update', 'Admin\NewsletterController@update')->name('newsletters.update');
    Route::post('/newsletters/{id}/destroy', 'Admin\NewsletterController@destroy')->name('newsletters.destroy');
});

Route::group(['middleware' => ['auth', 'role:user', 'verified']], function () {

    Route::get('/home', 'User\HomeController@index')->name('home');

    // dashboard
    Route::get('/user/orders/success', 'User\HomeController@success')->name('orders.success');
    Route::get('/user/orders/pending', 'User\HomeController@pending')->name('orders.pending');
    Route::get('/user/orders/receipt', 'User\HomeController@receipt')->name('orders.receipt');
    Route::get('/user/orders/failed', 'User\HomeController@failed')->name('orders.failed');

    // orders
    Route::get('/user/orders', 'User\OrderController@index')->name('orders');
    Route::get('/user/orders/{id}/show', 'User\OrderController@show')->name('orders.show');
    Route::get('/user/orders/search', 'User\OrderController@search')->name('orders.search');

    // wishlist
    Route::get('/user/wishlist', 'User\WishlistController@index')->name('user.wishlist');
    Route::get('/user/wishlist/{id}/show', 'User\WishlistController@show')->name('user.wishlist.show');
    Route::post('/user/wishlist/{id}/destroy', 'User\WishlistController@destroy')->name('user.wishlist.destroy');

    // reviews
    Route::get('/user/reviews', 'User\ReviewController@index')->name('user.reviews');
    Route::get('/user/reviews/{id}/show', 'User\ReviewController@show')->name('user.reviews.show');
    Route::get('/user/reviews/{id}/edit', 'User\ReviewController@edit')->name('user.reviews.edit');
    Route::get('/user/reviews/search', 'User\ReviewController@search')->name('user.reviews.search');
    Route::post('/user/reviews/{id}/update', 'User\ReviewController@update')->name('user.reviews.update');

    // return
    Route::get('/user/returns', 'User\ProductReturnController@index')->name('user.returns');
    Route::get('/user/returns/create', 'User\ProductReturnController@create')->name('user.returns.create');
    Route::get('/user/returns/search', 'User\ProductReturnController@search')->name('user.returns.search');
    Route::get('/user/returns/{id}/show', 'User\ProductReturnController@show')->name('user.returns.show');
    Route::post('/user/returns/store', 'User\ProductReturnController@store')->name('user.returns.store');

    // messages
    Route::get('/user/messages', 'User\MessageController@index')->name('user.messages');
    Route::get('/user/messages/create', 'User\MessageController@create')->name('user.messages.create');
    Route::get('/user/messages/{id}/edit', 'User\MessageController@edit')->name('user.messages.edit');
    Route::post('/user/messages/store', 'User\MessageController@store')->name('user.messages.store');
    Route::post('/user/messages/store/{id}/{user_id}/{uuid}/chat', 'User\MessageController@chatStore')->name('user.messages.chat.store');
    Route::get('/user/messages/{message_id}/close', 'User\MessageController@close')->name('user.messages.chat.close');

    // blog comment
    Route::get('/user/comments', 'User\CommentController@index')->name('user.comments');
    Route::get('/user/comments/{id}/edit', 'User\CommentController@edit')->name('user.comments.edit');
    Route::post('/user/comments/{id}/update', 'User\CommentController@update')->name('user.comments.update');

    // newsletter
    Route::get('/user/newsletters', 'User\NewsletterController@index')->name('user.newsletters');
    Route::get('/user/newsletters/search', 'User\NewsletterController@search')->name('user.newsletters.search');

    // shipping address
    Route::get('/user/addresses', 'User\ShippingAddressController@index')->name('user.shipping.addresses');
    Route::get('/user/addresses/{id}/show', 'User\ShippingAddressController@show')->name('user.shipping.addresses.show');
    Route::get('/user/addresses/create', 'User\ShippingAddressController@create')->name('user.shipping.addresses.create');
    Route::get('/user/addresses/search', 'User\ShippingAddressController@search')->name('user.shipping.addresses.search');
    Route::get('/user/addresses/{id}/edit', 'User\ShippingAddressController@edit')->name('user.shipping.addresses.edit');
    Route::post('/user/addresses/store', 'User\ShippingAddressController@store')->name('user.shipping.addresses.store');
    Route::post('/user/addresses/{id}/update', 'User\ShippingAddressController@update')->name('user.shipping.addresses.update');
    Route::post('/user/addresses/{id}/destroy', 'User\ShippingAddressController@destroy')->name('user.shipping.addresses.destroy');

    // profile
    Route::get('/user/profile', 'User\ProfileController@index')->name('user.profile');
    Route::get('/user/profile/edit', 'User\ProfileController@edit')->name('user.profile.edit');
    Route::get('/user/profile/change', 'User\ProfileController@change')->name('user.change.password');
    Route::post('/user/profile/update', 'User\ProfileController@update')->name('user.profile.update');
    Route::post('/user/profile/update_password', 'User\ProfileController@updatePassword')->name('user.password.update');
});
