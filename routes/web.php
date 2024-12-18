<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeviseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentMethodesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**Route::get('/', function () {
    return view('welcome');
});
*/

/**
 * Translator route
 */
Route::get('/lang/{lang}',
    [LanguageController::class, 'switchLang'])
        ->name('app_language');

Route::middleware('guest')->group(function(){
    Route::get('/', function () {
        return view('app.auth.login');
    });
});

Route::controller(LoginController::class)->group(function(){
    Route::get('/user_checker', 'userChecker')->name('user_checker');
    Route::get('/logout-user', 'logout')->name('app_logout');
    Route::post('/add_user', 'addUser')->name('app_add_user');
    Route::get('/resend-device-auth-code/{secret}', 'resendAuthCodeDv')->name('app_resend_device_auth_code');
    Route::post('/confirm-authentication', 'confirmAuth')->name('app_confirm_auth');
    Route::middleware('auth')->group(function(){
        Route::middleware('admin')->group(function(){
            Route::get('/add_user_page', 'addUserPage')->name('app_add_user_page');
        });
    });
    Route::middleware('guest')->group(function(){
        Route::get('/user-authentication/{secret}', 'userAuthentication')->name('app_user_authentication');
        Route::get('/email_reset_password_request', 'emailResetPasswordRequest')->name('app_email_reset_password_request');
        Route::post('/email_reset_password_post', 'emailResetPasswordPost')->name('app_email_reset_password_post');
    });
});

Route::controller(ProfileController::class)->group(function(){
    Route::middleware('auth')->group(function(){
        Route::get('/profile', 'profile')->name('app_profile');
        //Route::get('/email_password', 'emailPassword')->name('app_email_password');
        Route::get('/edit_profile_info', 'editProfileInfo')->name('app_edit_profile_info');

        Route::post('/save_photo', 'savePhoto')->name('app_save_photo');
        Route::post('/save_profile_info', 'saveProfileInfo')->name('app_save_profile_info');
    });

    Route::post('/change_email_address_post', 'changeEmailAddressPost')->name('app_change_email_address_post');
    Route::post('/change_password_post', 'changePasswordPost')->name('app_change_password_post');
    Route::get('/reset-password-page/{secret}', 'resetPassword')->name('app_reset_password');
    Route::get('/change_email_address/{token}', 'changeEmailAddress')->name('app_change_email_address');
    Route::get('/change_email_address_request/{token}', 'changeEmailAddressRequest')->name('app_change_email_address_request');
    Route::get('/change_password_request/{token}', 'changePasswordRequest')->name('app_change_password_request');
});

Route::controller(HomeController::class)->group(function(){
    Route::middleware('auth')->group(function(){
        /**Route::middleware('admin')->group(function(){
            Route::get('/user_management', 'userManagement')->name('app_user_management');
            Route::get('/user_management_info/{id:int}', 'userManagementInfo')->name('app_user_management_info');
            Route::post('/delete_user', 'deleteUser')->name('app_delete_user');
        });
        */
        Route::get('/login_history', 'loginHistory')->name('app_login_history');
    });
});

Route::controller(DashboardController::class)->group(function(){
    Route::middleware('auth')->group(function(){
        Route::get('/dashboard', 'dashboard')->name('app_dashboard');
    });
});

Route::controller(CustomerController::class)->group(function(){
    Route::middleware('auth')->group(function(){
        Route::get('/customers', 'customers')->name('app_customers');
        Route::get('/add_customer/{id:integer}', 'add_customer')->name('app_add_customer');

        Route::post('/save_customer', 'save_customer')->name('app_save_customer');
    });
});

Route::controller(RoomController::class)->group(function(){
    Route::middleware('auth')->group(function(){
        Route::get('/room_category', 'room_category')->name('app_room_category');
        Route::get('/rooms', 'rooms')->name('app_rooms');
        Route::get('/add_room_category/{id:integer}', 'add_room_category')->name('app_add_room_category');
        Route::get('/add_room/{id:integer}', 'add_room')->name('app_add_room');

        Route::post('/save_room_category', 'save_room_category')->name('app_save_room_category');
        Route::post('/save_room', 'save_room')->name('app_save_room');
    });
});

Route::controller(DeviseController::class)->group(function(){
    Route::middleware('auth')->group(function(){
        Route::get('/currency', 'currency')->name('app_currency');
        Route::get('/create_currency/{id:int}', 'create_currency')->name('app_create_currency');
        Route::get('/info_currency/{id:int}', 'info_currency')->name('app_info_currency');


        Route::post('/change_default_currency', 'change_default_currency')->name('app_change_default_currency');
        Route::post('/save_currency', 'save_currency')->name('app_save_currency');
        Route::post('/delete_currency', 'delete_currency')->name('app_delete_currency');
    });
});


Route::controller(ServiceController::class)->group(function(){
    Route::middleware('auth')->group(function(){
        Route::get('/services', 'services')->name('app_services');
        Route::get('/add_services/{id:int}', 'add_services')->name('app_add_services');

        Route::post('/save_service', 'save_service')->name('app_save_service');
    });
});

Route::controller(BookingController::class)->group(function(){
    Route::middleware('auth')->group(function(){
        Route::get('/booking', 'booking')->name('app_booking');
        Route::get('/add_booking/{id:int}/{reference:string}', 'add_booking')->name('app_add_booking');
        Route::get('/setup_reservation/{id:int}', 'setup_reservation')->name('app_setup_reservation');

        Route::post('/save_booking', 'save_booking')->name('app_save_booking');
        Route::post('/count_day', 'count_day')->name('app_count_day');
        Route::post('/save_service_assign', 'save_service_assign')->name('app_save_service_assign');
        Route::post('/delete_service_assign', 'delete_service_assign')->name('app_delete_service_assign');
        Route::post('/room_session', 'room_session')->name('app_room_session');
    });
});

Route::controller(PaymentMethodesController::class)->group(function(){
    Route::middleware('auth')->group(function(){
        Route::get('/payment_methods', 'paymentMethods')->name('app_payment_methods');
        Route::get('/add_new_payment_methods', 'addNewPaymentMethods')->name('app_add_new_payment_methods');
        Route::get('/info_payment_methods/{id:int}', 'infoPaymentMethods')->name('app_info_payment_methods');
        Route::get('/update_payment_methods/{id:int}', 'upDatePaymentMethods')->name('app_update_payment_methods');

        Route::post('/create_payment_methods', 'createPaymentMethods')->name('app_create_payment_methods');
        Route::post('/delete_payment_methods', 'deletePaymentMethods')->name('app_delete_payment_methods');
    });
});


