<?php

use App\Actions\Fortify\CreateNewUser as FortifyAuth;
use App\Http\Controllers\Admin\ActionCategoriesController;
use App\Http\Controllers\Admin\ActionProductController;
use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ClientsController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FiltersController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\NewslettersController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\PageBannerController;
use App\Http\Controllers\Admin\PageConfigController;
use App\Http\Controllers\Admin\PageContentController;
use App\Http\Controllers\Admin\ProductMediaController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\ProductSizesController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\Admin\StyleController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\ProductsController as ProductsFrontController;
use App\Http\Controllers\Profile\OrdersController as OrdersProfileController;
use App\Http\Controllers\Profile\ProfileController;
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

Route::group(['middleware' => ['language']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/logout', [FortifyAuth::class, 'logout']);
    Route::post('/changeCurrency', [BaseController::class, 'currency']);
    Route::match(['get', 'post'], '/checkProductStock', [ProductsFrontController::class, 'check_product_stock']);
    Route::post('/getSuggestedProducts', [BaseController::class, 'getSuggestedProducts']);
    Route::get('/back_to_shopping', [ManageProductList::class, 'back_to_shopping']);

    Route::group(['prefix' => 'filter'], function () {
        Route::match(['get', 'post'], '/price', [ManageProductList::class, 'filterPrice']);
    });

    Route::match(['get', 'post'], '/sortProducts', [ManageProductList::class, 'sortProducts']);
    Route::match(['get', 'post'], '/searchAPI', [ManageProductList::class, 'searchProductsAPI']);
    Route::match(['get', 'post'], '/product/getSize', [ProductsFrontController::class, 'searchProductSizeAPI']);


    Route::match(['get', 'post'], '/reset', [ProductsFrontController::class, 'resetFilter']);
    Route::match(['get', 'post'], '/clear', [ManageProductList::class, 'clearSearch']);

    Route::group(['prefix' => 'search'], function () {
        Route::match(['get', 'post'], '/', [ProductsFrontController::class, 'searchProducts']);
        Route::match(['get', 'post'], '/{id}/{slug}', [ProductsFrontController::class, 'searchProductsCategory'])->where(['slug' => '.*']);
//        Route::match(['get', 'post'], '/{category}/{subcategory}', [ManageProductList::class, 'searchProductsCategoryAndSubcategory']);
//        Route::match(['get', 'post'], '/{category}/{subcategory}/{child}', [ManageProductList::class, 'searchProductsCategoryAndSubcategoryAndChild']);
//        Route::match(['get', 'post'], '/{category}/{subcategory}/{title}/{subtitle}', [ManageProductList::class, 'searchProductsCategoryAndSubcategoryAndTitleAndSubtitle']);

    });


    Route::group(['prefix' => 'list'], function () {
        Route::get('/', [ProductsFrontController::class, 'getProducts']);
        Route::group(['prefix' => '{product}'], function () {
            Route::get('/', [ProductsFrontController::class, 'show_product']);
            Route::post('/add_to_cart', [CartController::class, 'add_to_cart']);
        });
    });
    Route::get('/view-product/{product}', [ProductsFrontController::class, 'show_product_modal']);
    Route::group(['prefix' => 'show'], function () {
        Route::group(['prefix' => '{product}'], function () {
            Route::get('/', [ProductsFrontController::class, 'show_product']);
            Route::post('/', [ProductsFrontController::class, 'make_review']);
            Route::post('/addToCart', [ProductsFrontController::class, 'add_to_cart']);
        });
        Route::get('/ordered/{product}', [FrontController::class, 'showOrderedProduct']);
    });

    Route::group(['prefix' => 'contact'], function () {
        Route::get('/', [ContactController::class, 'show']);
        Route::match(['post', 'get'], '/make_request', [ContactController::class, 'make_request']);
        Route::match(['post', 'get'], '/help', [ContactController::class, 'help']);
    });
    Route::get('/page/{page}', [PagesController::class, 'render_page_content']); //about, privacy_policy, terms_and_conditions, faq
    Route::get('/sitemap', [FrontController::class, 'render_sitemap']);
    Route::post('/subscribe', [HomeController::class, 'subscribe']);

    Route::get('/error', function () {
        return view('front.src.pages.404');
    });

    Route::group(['prefix' => 'wishlist'], function () {
        Route::get('/', [CartController::class, 'wishlist']);
        Route::post('/delete/{index}', [CartController::class, 'delete_product_from_wishlist']);
    });


    Route::group(['prefix' => 'cart'], function () {
        Route::get('/', [CartController::class, 'cart']);
        Route::match(['get', 'post'], '/plus/{index}', [CartController::class, 'plusProductFromCart']);
        Route::match(['get', 'post'], '/minus/{index}', [CartController::class, 'minusProductFromCart']);
        Route::post('/delete/{index}', [CartController::class, 'delete_product_from_cart']);
    });

    Route::group(['prefix' => 'checkout'], function () {
        Route::get('/', [CheckoutController::class, 'checkout']);
        Route::post('/apply-coupon', [CheckoutController::class, 'applyCoupon']);
        Route::post('/placeOrder', [CheckoutController::class, 'placeOrder']);
    });

    Route::get('/successOrdered', [CheckoutController::class, 'successOrdered']);
    Route::get('/change/{sessionName}/{value}', [FrontController::class, 'set_session']);

    Route::group(['middleware' => ['auth']], function () {
        Route::post('/send-code-email', [ProfileController::class, 'sendCodeEmail']);
        Route::post('/send-code-phone', [ProfileController::class, 'sendCodePhone']);
        Route::post('/check-code', [ProfileController::class, 'checkCode']);
        Route::post('/changePassword', [ProfileController::class, 'changePassword']);
        Route::post('/changeCurrencyRate', [ConfigurationController::class, 'changeCurrencyRate']);

        Route::group(['prefix' => 'invoice'], function () {
            Route::get('/{order}', [OrdersProfileController::class, 'show_invoice']);
            Route::post('/pdf/{order}', [OrdersProfileController::class, 'download_invoice']);

        });

        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', [ProfileController::class, 'view_profile']);
            Route::post('/', [ProfileController::class, 'update_profile']);

        });
        Route::match(['get', 'post'], '/{id}/order_tracking', [FrontController::class, 'show_order_tracking']);
    });

    /* cart modal */
    Route::post('add-to-cart-modal/{id}', [CartController::class, 'add_to_cart']);

    /* wishlist */
    Route::get('add-to-wishlist/{id}', [CartController::class, 'add_to_wishlist']);
    Route::delete('remove-from-wishlist', [CartController::class, 'remove_product_from_wishlist']);

    Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
        Route::get('/', [DashboardController::class, 'dashboard']);
        Route::get('/clearTelescope', [PageConfigController::class, 'clearTelescope']);

        Route::group(['prefix' => 'shipping'], function () {
            Route::get('/', [ShippingController::class, 'show']);
            Route::post('/setShipping', [ShippingController::class, 'store']);
        });
        Route::group(['prefix' => 'company_info'], function () {
            Route::get('/', [PageConfigController::class, 'show']);
            Route::post('/set_shop_information', [PageConfigController::class, 'set_shop_information']);
            Route::post('/add_shipping_fee', [PageConfigController::class, 'add_shipping_fee']);

        });

        Route::group(['prefix' => 'products'], function () {
            Route::get('/', [ProductsController::class, 'list']);
            Route::get('/revert', [ProductsController::class, 'revert']);
        });

        Route::group(['prefix' => 'product'], function () {
            Route::get('/add', [ProductsController::class, 'add']);
            Route::post('/store', [ProductsController::class, 'store']);
            Route::get('/clone/{id}', [ProductsController::class, 'clone']);
            Route::get('/show/{id}', [ProductsController::class, 'edit']);
            Route::get('/{id}/{status}', [ProductsController::class, 'change_status']);

            Route::group(['prefix' => 'upload/{id}/image'], function () {
                Route::post('/', [ProductMediaController::class, 'upload']);
                Route::post('/{imgId}/delete', [ProductMediaController::class, 'delete']);
            });

            Route::group(['prefix' => 'size/{id}'], function () {
                Route::post('/save', [ProductSizesController::class, 'save']);
                Route::post('/delete/{sizeId}', [ProductSizesController::class, 'delete']);
            });

        });

        Route::get('/reviews', [ReviewController::class, 'show']);
        Route::group(['prefix' => 'review'], function () {
            Route::get('/{id}/{status}', [ReviewController::class, 'change_status']);

        });

        Route::get('/newsletters', [NewslettersController::class, 'list']);
        Route::group(['prefix' => 'newsletter'], function () {
            Route::get('/add', [NewslettersController::class, 'add']);
            Route::get('/show/{id}', [NewslettersController::class, 'edit']);
            Route::get('/preview/{id}', [NewslettersController::class, 'show']);
            Route::post('/store', [NewslettersController::class, 'store']);
            Route::group(['prefix' => 'send/{id}'], function () {
                Route::post('/', [NewslettersController::class, 'send']);
                Route::get('/', [NewslettersController::class, 'send_page']);
            });
            Route::get('/send_to_all/{id}', [NewslettersController::class, 'send_to_all']);
            Route::group(['prefix' => 'upload/{id}/image'], function () {
                Route::post('/', [NewslettersController::class, 'upload_media']);
                Route::post('/{imgId}/delete', [NewslettersController::class, 'delete_media']);
            });
        });

        Route::group(['prefix' => 'banners'], function () {
            Route::get('/', [BannersController::class, 'list']);
            Route::post('/add_category_banners', [BannersController::class, 'add_category_banners']);
        });
        Route::group(['prefix' => 'banner'], function () {
            Route::get('/add', [BannersController::class, 'add']);
            Route::post('/store', [BannersController::class, 'store']);
            Route::get('/show/{id}', [BannersController::class, 'edit']);
            Route::get('/{place}/{id}/{order}', [BannersController::class, 'change_order']);
            Route::get('/{id}/{status}', [BannersController::class, 'change_status']);
        });

        Route::group(['prefix' => 'customization'], function () {
            Route::get('/', [StyleController::class, 'customization']);
            Route::get('/set_style/{style}', [StyleController::class, 'set_style']);
        });

        Route::get('/section_banners', [PageBannerController::class, 'list']);
        Route::group(['prefix' => 'section_banner'], function () {
            Route::get('/add', [PageBannerController::class, 'add']);
            Route::post('/store', [PageBannerController::class, 'store']);
            Route::get('/show/{id}', [PageBannerController::class, 'edit']);
            Route::get('/{id}/{status}', [PageBannerController::class, 'change_status']);
        });

        Route::get('/pages', [PageContentController::class, 'list']);
        Route::group(['prefix' => 'page'], function () {
            Route::get('/add', [PageContentController::class, 'add']);
            Route::post('/store', [PageContentController::class, 'store']);
            Route::get('/show/{id}', [PageContentController::class, 'edit']);
            Route::get('/{id}/{status}', [PageContentController::class, 'change_status']);
        });

        Route::get('/coupons', [CouponController::class, 'list']);
        Route::group(['prefix' => 'coupon'], function () {
            Route::get('/add', [CouponController::class, 'add']);
            Route::post('/store', [CouponController::class, 'store']);
            Route::get('/show/{id}', [CouponController::class, 'edit']);
            Route::get('/{id}/{status}', [CouponController::class, 'change_status']);
        });

        Route::get('/clients', [ClientsController::class, 'list']);
        Route::group(['prefix' => 'client'], function () {
            Route::get('/add', [ClientsController::class, 'add']);
            Route::post('/store', [ClientsController::class, 'store']);
            Route::get('/show/{id}', [ClientsController::class, 'edit']);
            Route::get('/{id}/{status}', [ClientsController::class, 'change_status']);
        });

        Route::get('/categories', [CategoriesController::class, 'list']);
        Route::group(['prefix' => 'category'], function () {
            Route::get('/add', [CategoriesController::class, 'add']);
            Route::get('/show/{id}', [CategoriesController::class, 'edit']);
            Route::post('/store', [CategoriesController::class, 'store']);
            Route::post('/{id}/{status}', [CategoriesController::class, 'change_status']);
            Route::get('/get_children/{id}', [CategoriesController::class, 'getChildren']);
            Route::get('/get_parents/{id}', [CategoriesController::class, 'getParents']);
            Route::group(['prefix' => 'count_products'], function () {
                Route::get('/{id}', [CategoriesController::class, 'countProducts']);
                Route::get('/', [CategoriesController::class, 'countProductsCategories']);
            });
        });

        Route::get('/filters', [FiltersController::class, 'list']);
        Route::group(['prefix' => 'filter'], function () {
            Route::get('/add', [FiltersController::class, 'add']);
            Route::post('/store', [FiltersController::class, 'store']);
            Route::get('/show/{id}', [FiltersController::class, 'edit']);
            Route::get('/{id}/{status}', [FiltersController::class, 'change_status']);
        });

        Route::get('/actions', [ActionProductController::class, 'list']);
        Route::group(['prefix' => 'action'], function () {
            Route::get('/add', [ActionProductController::class, 'add']);
            Route::post('/store', [ActionProductController::class, 'store']);
            Route::get('/show/{id}', [ActionProductController::class, 'edit']);
            Route::get('/{id}/{status}', [ActionProductController::class, 'change_status']);
        });

        Route::get('/action_categories', [ActionCategoriesController::class, 'list']);
        Route::group(['prefix' => 'action_category'], function () {
            Route::get('/add', [ActionCategoriesController::class, 'add']);
            Route::post('/store', [ActionCategoriesController::class, 'store']);
            Route::get('/show/{id}', [ActionCategoriesController::class, 'edit']);
            Route::get('/{id}/{status}', [ActionCategoriesController::class, 'change_status']);
        });

        Route::group(['prefix' => 'languages'], function () {
            Route::match(['get', 'post'], '/', [LanguageController::class, 'languages']);
            Route::post('/update', [LanguageController::class, 'change_language_variable']);
            Route::match(['get', 'post'], '/generate', [LanguageController::class, 'generate_languages']);
        });

        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', [PageConfigController::class, 'profile']);
            Route::group(['prefix' => 'settings'], function () {
                Route::match(['get', 'post'], '/', [PageConfigController::class, 'settings']);
                Route::get('/delete_logo', [PageConfigController::class, 'delete_logo']);
            });
        });

        Route::get('/orders', [OrdersController::class, 'list']);
        Route::group(['prefix' => 'order'], function () {
            Route::get('/{id}/changeStatus/{status}', [OrdersController::class, 'change_order_status']);
            Route::get('/invoice/{id}', [OrdersController::class, 'invoice']);
        });

        Route::group(['prefix' => 'video'], function () {
            Route::get('/', [VideoController::class, 'list']);
            Route::get('/add', [VideoController::class, 'add']);
            Route::post('/store', [VideoController::class, 'store']);
            Route::get('/show/{id}', [VideoController::class, 'edit']);
            Route::get('/{id}/{status}', [VideoController::class, 'change_status']);

        });
    });


    Route::get('/authenticated', function () {
        if (session('is_from_checkout')) {
            return redirect()->back();
        }
        return redirect('/admin');
    })->middleware(['auth', 'verified']);

});

