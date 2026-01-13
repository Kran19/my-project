<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ADMIN CONTROLLERS
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Admin\AuthController as AdminAuth;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\CategoryController as AdminCategory;
use App\Http\Controllers\Admin\BrandController as AdminBrand;
use App\Http\Controllers\Admin\ProductController as AdminProduct;
use App\Http\Controllers\Admin\OrderController as AdminOrder;
use App\Http\Controllers\Admin\MediaController as AdminMedia;
use App\Http\Controllers\Admin\TaxController as AdminTax;
use App\Http\Controllers\Admin\UserController as AdminUser;
use App\Http\Controllers\Admin\NotificationController as AdminNotification;
use App\Http\Controllers\Admin\CRMController as AdminCRM;
use App\Http\Controllers\Admin\ReportController as AdminReport;
use App\Http\Controllers\Admin\ShippingController as AdminShipping;
use App\Http\Controllers\Admin\SettingController as AdminSetting;
use App\Http\Controllers\Admin\InventoryController as AdminInventory;
use App\Http\Controllers\Admin\OfferController as AdminOffer;


/*
|--------------------------------------------------------------------------
| CUSTOMER CONTROLLERS
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Customer\AuthController as CustomerAuth;
use App\Http\Controllers\Customer\HomeController as CustomerHome;
use App\Http\Controllers\Customer\ProductController as CustomerProduct;
use App\Http\Controllers\Customer\CartController as CustomerCart;
use App\Http\Controllers\Customer\CheckoutController as CustomerCheckout;
use App\Http\Controllers\Customer\WishlistController as CustomerWishlist;
use App\Http\Controllers\Customer\PageController as CustomerPage;
use App\Http\Controllers\Customer\AccountController as CustomerAccount;
use App\Http\Controllers\Customer\OrderController as CustomerOrder;
use App\Http\Controllers\Customer\UserController as CustomerUser;



/*
|--------------------------------------------------------------------------
| ADMIN PANEL ROUTES
|--------------------------------------------------------------------------
*/



Route::prefix('admin')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | ADMIN AUTH
    |--------------------------------------------------------------------------
    */
    Route::get('/login', [AdminAuth::class, 'loginPage'])->name('admin.login');
    Route::post('/login', [AdminAuth::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminAuth::class, 'logout'])->name('admin.logout');

    /*
    |--------------------------------------------------------------------------
    | AUTHENTICATED ADMIN ROUTES
    |--------------------------------------------------------------------------
    */
    Route::middleware('admin.auth')->group(function () {

        // Dashboard
        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');
        // Add this route in your admin routes group
        Route::get('/dashboard/data', [AdminDashboard::class, 'getChartData'])->name('admin.dashboard.data');

        /*
        |--------------------------------------------------------------------------
        | CATEGORY MANAGEMENT
        |--------------------------------------------------------------------------
        */
        Route::prefix('categories')->group(function () {
            Route::get('/', [AdminCategory::class, 'index'])->name('admin.categories.index');
            Route::get('/create', [AdminCategory::class, 'create'])->name('admin.categories.create');
            Route::get('/{id}/edit', [AdminCategory::class, 'edit'])->name('admin.categories.edit');
            Route::get('/{id}', [AdminCategory::class, 'show'])->name('admin.categories.show');
        });

        /*
        |--------------------------------------------------------------------------
        | BRAND MANAGEMENT
        |--------------------------------------------------------------------------
        */
        Route::prefix('brands')->group(function () {
            Route::get('/', [AdminBrand::class, 'index'])->name('admin.brands.index');
        });

        /*
        |--------------------------------------------------------------------------
        | PRODUCT MANAGEMENT
        |--------------------------------------------------------------------------
        */
        Route::prefix('products')->group(function () {
            Route::get('/', [AdminProduct::class, 'index'])->name('admin.products.index');
            Route::get('/create', [AdminProduct::class, 'create'])->name('admin.products.create');
            Route::get('/{product}/edit', [AdminProduct::class, 'edit'])->name('admin.products.edit');


            Route::get('/attributes', [AdminProduct::class, 'attributes'])->name('admin.products.attributes');
            Route::get('/specifications', [AdminProduct::class, 'specifications'])->name('admin.products.specifications');
            Route::get('/tags', [AdminProduct::class, 'tags'])->name('admin.products.tags');

            Route::get('/variants', [AdminProduct::class, 'variants'])->name('admin.products.variants');

        });

        /*
 |--------------------------------------------------------------------------
 | ORDER MANAGEMENT
 |--------------------------------------------------------------------------
 */
        Route::prefix('orders')->name('admin.orders.')->group(function () {
            Route::get('/', [AdminOrder::class, 'index'])->name('index');
            Route::get('/data', [AdminOrder::class, 'getOrders'])->name('data');
            Route::get('/{order}', [AdminOrder::class, 'view'])->name('view');
            Route::post('/{order}/update-status', [AdminOrder::class, 'updateStatus'])->name('update-status');
            Route::post('/{order}/update-payment-status', [AdminOrder::class, 'updatePaymentStatus'])->name('update-payment-status');
            Route::post('/{order}/update-tracking', [AdminOrder::class, 'updateTracking'])->name('update-tracking');
            Route::delete('/{order}', [AdminOrder::class, 'destroy'])->name('destroy');
            Route::post('/bulk-delete', [AdminOrder::class, 'bulkDelete'])->name('bulk-delete');
            Route::get('/export', [AdminOrder::class, 'export'])->name('export');
            Route::get('/{order}/invoice', [AdminOrder::class, 'printInvoice'])->name('invoice');
        });

        /*
        |--------------------------------------------------------------------------
        | MEDIA MANAGER
        |--------------------------------------------------------------------------
        */
        Route::prefix('media')->group(function () {
            Route::get('/', [AdminMedia::class, 'index'])->name('admin.media.index');
            Route::get('/upload', [AdminMedia::class, 'upload'])->name('admin.media.upload');
        });



        /*
        |--------------------------------------------------------------------------
        | OFFERS MANAGEMENT
        |--------------------------------------------------------------------------
        */
        Route::prefix('offers')->group(function () {

            Route::get('/', [AdminOffer::class, 'index'])
                ->name('admin.offers.index');

            Route::get('/create', [AdminOffer::class, 'create'])
                ->name('admin.offers.create');


            Route::get('/edit', [AdminOffer::class, 'create'])
                ->name('admin.offers.edit');


        });


        /*
        |--------------------------------------------------------------------------
        | TAX SETTINGS
        |--------------------------------------------------------------------------
        */
        Route::prefix('taxes')->group(function () {
            Route::get('/', [AdminTax::class, 'index'])->name('admin.taxes.index');

        });

        /*
        |--------------------------------------------------------------------------
        | USER MANAGEMENT
        |--------------------------------------------------------------------------
        */
        Route::prefix('users')->name('admin.users.')->group(function () {

            // Pages
            Route::get('/', [AdminUser::class, 'index'])->name('index');
            Route::get('/create', [AdminUser::class, 'create'])->name('create');
            Route::get('/{user}/edit', [AdminUser::class, 'edit'])->name('edit');

            // AJAX / API (MUST BE BEFORE {user})
            Route::get('/data', [AdminUser::class, 'getCustomers'])->name('data');
            Route::post('/bulk-delete', [AdminUser::class, 'bulkDelete'])->name('bulk-delete');
            Route::post('/bulk-block', [AdminUser::class, 'bulkBlock'])->name('bulk-block');
            Route::get('/export', [AdminUser::class, 'export'])->name('export');

            Route::post('/{user}/toggle-status', [AdminUser::class, 'toggleStatus'])->name('toggle-status');
            Route::post('/{user}/toggle-block', [AdminUser::class, 'toggleBlock'])->name('toggle-block');

            // CRUD
            Route::post('/', [AdminUser::class, 'store'])->name('store');
            Route::put('/{user}', [AdminUser::class, 'update'])->name('update');
            Route::delete('/{user}', [AdminUser::class, 'destroy'])->name('destroy');
            Route::get('/{user}', [AdminUser::class, 'show'])->name('show');
        });



        /*
        |--------------------------------------------------------------------------
        | INVENTORY
        |--------------------------------------------------------------------------
        */
        Route::prefix('inventory')->group(function () {
            Route::get('/', [AdminInventory::class, 'index'])->name('admin.inventory.index');
            Route::get('/history', [AdminInventory::class, 'history'])->name('admin.inventory.history');
            Route::get('/{id}/update', [AdminInventory::class, 'updateStock'])->name('admin.inventory.update');
        });

        /*
        |--------------------------------------------------------------------------
        | NOTIFICATIONS
        |--------------------------------------------------------------------------
        */
        Route::get('/notifications', [AdminNotification::class, 'index'])->name('admin.notifications.index');

        /*
        |--------------------------------------------------------------------------
        | CRM
        |--------------------------------------------------------------------------
        */
        Route::prefix('crm')->group(function () {
            Route::get('/', [AdminCRM::class, 'index'])->name('admin.crm.index');
            Route::get('/popup', [AdminCRM::class, 'popup'])->name('admin.crm.popup');
            Route::get('/settings', [AdminCRM::class, 'settings'])->name('admin.crm.settings');
        });

        /*
        |--------------------------------------------------------------------------
        | REPORTS
        |--------------------------------------------------------------------------
        */
        Route::prefix('reports')->group(function () {
            Route::get('/', [AdminReport::class, 'index'])->name('admin.reports.index');
            Route::get('/sales', [AdminReport::class, 'sales'])->name('admin.reports.sales');
            Route::get('/customers', [AdminReport::class, 'customers'])->name('admin.reports.customers');
            Route::get('/products', [AdminReport::class, 'products'])->name('admin.reports.products');
        });

        /*
        |--------------------------------------------------------------------------
        | SHIPPING
        |--------------------------------------------------------------------------
        */
        Route::prefix('shipping')->group(function () {
            Route::get('/', [AdminShipping::class, 'index'])->name('admin.shipping.index');
            Route::get('/charges', [AdminShipping::class, 'charges'])->name('admin.shipping.charges');
        });

        /*
        |--------------------------------------------------------------------------
        | SETTINGS
        |--------------------------------------------------------------------------
        */
        Route::get('/settings', [AdminSetting::class, 'index'])->name('admin.settings.index');
    });

});


/*
|--------------------------------------------------------------------------
| CUSTOMER ROUTES
|--------------------------------------------------------------------------
*/
Route::name('customer.')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | HOME PAGE
    |--------------------------------------------------------------------------
    */
    Route::get('/', [CustomerHome::class, 'index'])->name('home.index');

    /*
    |--------------------------------------------------------------------------
    | CUSTOMER AUTH
    |--------------------------------------------------------------------------
    */
    Route::get('/login', [CustomerAuth::class, 'loginPage'])->name('login');
    Route::post('/login', [CustomerAuth::class, 'login'])->name('login.submit');

    Route::get('/register', [CustomerAuth::class, 'registerPage'])->name('register');
    Route::post('/register', [CustomerAuth::class, 'register'])->name('register.submit');

    Route::get('/verify', [CustomerAuth::class, 'verifyPage'])->name('verify');
    Route::post('/verify', [CustomerAuth::class, 'verify'])->name('verify.submit');
    Route::post('/resend-otp', [CustomerAuth::class, 'resendOTP'])->name('otp.resend');

    Route::post('/logout', [CustomerAuth::class, 'logout'])->name('logout');

    Route::get('/forgot-password', [CustomerAuth::class, 'showForgotPassword'])->name('forgot-password');

    /*
    |--------------------------------------------------------------------------
    | PRODUCTS
    |--------------------------------------------------------------------------
    */
    Route::get('/products', [CustomerProduct::class, 'listing'])->name('products.list');
    Route::get('/category/{slug}', [CustomerProduct::class, 'category'])->name('category.products');
    Route::get('/product/{slug}', [CustomerProduct::class, 'details'])->name('products.details');
    Route::get('/search', [CustomerProduct::class, 'search'])->name('products.search');
    Route::get('/products/{slug}/quick-view', [CustomerProduct::class, 'quickView'])->name('products.quick-view');

    // Cart Routes
    Route::prefix('cart')->group(function () {
        Route::get('/', [CustomerCart::class, 'index'])->name('cart');
        Route::post('/add', [CustomerCart::class, 'addItem'])->name('cart.add');
        Route::put('/update/{cartItemId}', [CustomerCart::class, 'updateQuantity'])->name('cart.update');
        Route::delete('/remove/{cartItemId}', [CustomerCart::class, 'removeItem'])->name('cart.remove');
        Route::post('/apply-coupon', [CustomerCart::class, 'applyCoupon'])->name('cart.apply-coupon');
        Route::post('/sync', [CustomerCart::class, 'syncCart'])->name('cart.sync');
        Route::get('/summary', [CustomerCart::class, 'getCartSummary'])->name('cart.summary');
        Route::get('/count', [CustomerCart::class, 'getCartCount'])->name('cart.count');
        Route::delete('/clear', [CustomerCart::class, 'clearCart'])->name('cart.clear');
    });

    Route::middleware(['customer.auth'])->group(function () {


        Route::prefix('checkout')->name('checkout.')->group(function () {
            Route::get('/', [CustomerCheckout::class, 'index'])->name('index');
            Route::post('/process', [CustomerCheckout::class, 'processCheckout'])->name('process');

            Route::post('/shipping/check', [CustomerCheckout::class, 'checkShipping'])
                ->name('shipping.check');

            Route::post('/payment/callback', [CustomerCheckout::class, 'paymentCallback'])
                ->name('payment.callback');

            Route::get('/payment/failed', [CustomerCheckout::class, 'paymentFailed'])
                ->name('payment.failed');

            Route::get('/confirmation/{order}', [CustomerCheckout::class, 'confirmation'])
                ->name('confirmation');

            Route::post('/buy-now', [CustomerCheckout::class, 'buyNow'])
                ->name('buy.now');

            Route::post(
                '/razorpay/order',
                [CustomerCheckout::class, 'createRazorpayOrder']
            )->name('razorpay.order');
        });


    });

    /*
    |--------------------------------------------------------------------------
    | WISHLIST
    |--------------------------------------------------------------------------
    */
    Route::get('/wishlist', [CustomerWishlist::class, 'index'])->name('wishlist');
    Route::post('/add', [CustomerWishlist::class, 'addItem'])->name('wishlist.add');

    /*
    |--------------------------------------------------------------------------
    | CMS STATIC PAGES
    |--------------------------------------------------------------------------
    */
    Route::prefix('page')->group(function () {
        Route::get('/about', [CustomerPage::class, 'about'])->name('page.about');
        Route::get('/contact', [CustomerPage::class, 'contact'])->name('page.contact');
        Route::get('/faq', [CustomerPage::class, 'faq'])->name('page.faq');
        Route::get('/terms', [CustomerPage::class, 'terms'])->name('page.terms');
        Route::get('/privacy-policy', [CustomerPage::class, 'privacy'])->name('page.privacy');
        Route::get('/shipping-policy', [CustomerPage::class, 'shipping'])->name('page.shipping-policy');
        Route::get('/size-guide', [CustomerPage::class, 'sizeGuide'])->name('page.size-guide');

    });

    /*
    |--------------------------------------------------------------------------
    | CUSTOMER ACCOUNT (LOGGED-IN AREA)
    |--------------------------------------------------------------------------
    */
    Route::middleware(['customer.auth'])->prefix('account')->name('account.')->group(function () {
        Route::get('/profile', [CustomerAccount::class, 'profile'])->name('profile');
        Route::get('/orders', [CustomerOrder::class, 'orders'])->name('orders');
        Route::get('/orders/{id}', [CustomerOrder::class, 'orderDetails'])->name('orders.details');
        Route::get('/addresses', [CustomerAccount::class, 'addresses'])->name('addresses');
        Route::get('/change-password', [CustomerAccount::class, 'changePassword'])->name('change-password');
    });

});

/*
|--------------------------------------------------------------------------
| FALLBACK 404 PAGE
|--------------------------------------------------------------------------
*/
Route::fallback(function () {
    return view('customer.errors.404');
})->name('customer.error.404');
