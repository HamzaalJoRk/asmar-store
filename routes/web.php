<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\GameController;
use App\Http\Controllers\Front\AgentController;
use App\Http\Controllers\Front\TransactionController;
use App\Http\Controllers\Front\OrderController as FrontOrderController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AgentController as AdminAgentController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CurdAdminController;
use App\Http\Controllers\Admin\CurdGamesController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\Profile\PasswordController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProviderController;

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

//Auth::routes();

// route admin
Route::group(['prefix' => 'dashboard', 'as'=>'ad.'], function () {
    Route::get('/login', [AdminAuthController::class, 'form_login'])->name('login.form');
    Route::Post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    Route::Post('/loginAdmin', [AdminAuthController::class, 'loginAdmin'])->name('login');
});


Route::group(['prefix' => LaravelLocalization::setLocale().'/ad', 'as'=>'ad.', 'middleware' => ['auth.admin:admin',  'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function () {
    Route::get('/dashboard', function (){
        return view('admin.index');
    })->name('index');

    // Update controller from ProviderController to CurdGamesController
    Route::get('games/fetch-products', [CurdGamesController::class, 'fetchProducts'])->name('games.fetch-products');
    Route::resource('games',CurdGamesController::class);
    Route::get('games/packages/{id}',[CurdGamesController::class,'packages'])->name('games.packages');
    Route::post('games/packages/update/{id}',[CurdGamesController::class,'packagesUpdate'])->name('games.packages.update');
    Route::delete('games/packages/delete/{id}',[CurdGamesController::class,'packagesDestroy'])->name('games.packages.delete');
    Route::post('permissions',[CurdAdminController::class,'AddPermissions'])->name('permissions.add');

    //admins
    Route::resource('admins',AdminController::class);
    //users
    Route::resource('users',UserController::class);
    //agents
    Route::resource('agents',AdminAgentController::class);
    //providers
    Route::resource('providers',ProviderController::class);
    //banks
    Route::resource('banks',BankController::class);
    //transactions
    Route::controller(AdminTransactionController::class)->group(function(){
        Route::resource('transactions',AdminTransactionController::class);
        Route::get('/transactions/change_status/{id}','change_status')->name('transactions.change_status');
        Route::put('/transactions/cancel_status/{id}','cancel_status')->name('transactions.cancel_status');
    });

    //levels
    Route::resource('levels',LevelController::class);
    //order
    Route::controller(OrderController::class)->group(function(){
        Route::resource('orders',OrderController::class);
        Route::get('/orders/change_status/{id}','change_status')->name('orders.change_status');
        Route::put('/orders/cancel_status/{id}','cancel_status')->name('orders.cancel_status');
    });
     //settings routes
     Route::get('/settings/general', [SettingController::class,'general'])->name('settings.general');
     Route::resource('settings', SettingController::class)->only(['store']);

    //profile routes
    Route::get('/profile/edit', [ProfileController::class,'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class,'update'])->name('profile.update');
    //profile password routes
    Route::name('profile.')->namespace('Profile')->group(function () {
       Route::get('/password/edit', [PasswordController::class,'edit'])->name('password.edit');
       Route::put('/password/update', [PasswordController::class,'update'])->name('password.update');
   });
    //currencies
    Route::resource('currencies',CurrencyController::class);
    //countries
    Route::resource('countries',CountryController::class);
    //cities
    Route::resource('cities',CityController::class);

});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
//    Auth::routes();
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::Post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::Post('/login', [AuthController::class, 'loginPost'])->name('front.login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::Post('/register', [AuthController::class, 'registerPost'])->name('front.register');
    Route::get('/password/reset', [AuthController::class, 'reset'])->name('password.reset');
    Route::get('/reset-password', [AuthController::class, 'resetPassword'])->name('password.resetPassword');
    Route::Post('/password/reset', [AuthController::class, 'resetPost'])->name('front.reset.post');
    Route::Post('/reset-password/reset', [AuthController::class, 'resetSubmitPassword'])->name('front.submit.password');

    Route::get('/my-profile', [AuthController::class, 'myProfile'])->name('front.my-profile')->middleware('auth');
    Route::PUT('/my-profile', [AuthController::class, 'PostMyProfile'])->name('front.profile.update')->middleware('auth');

    Route::get('/', [HomeController::class, 'index'])->name('front.index');
    Route::get('/complete', [AuthController::class, 'completeRegister'])->name('front.completeRegister')->middleware('auth');
    Route::Post('/complete', [AuthController::class, 'completeRegisterStore'])->name('front.completeRegister.Post')->middleware('auth');
    Route::get('/account-level', [AuthController::class, 'accountLevel'])->name('front.account-level')->middleware('auth');
    Route::get('/index', [HomeController::class, 'index'])->name('front.index');
    Route::Post('/', [HomeController::class, 'uploadImage'])->name('front.upload.image');
    Route::get('/games/{slug}', [GameController::class, 'show'])->name('front.game.show');
    Route::Post('/games/order', [GameController::class, 'Order'])->name('front.game.order')->middleware('auth');
    Route::get('/get-cities/{country_id}', [HomeController::class, 'getCities'])->name('front.getCities');

        /********** Agents *********/
        Route::get('/agents', [AgentController::class, 'index'])->name('front.agents')->middleware('auth');

        /********** Transactions *********/
        Route::get('/transactions/create', [TransactionController::class, 'create'])->name('front.transactions.create')->middleware('auth');
        Route::get('/transactions/create/{id}', [TransactionController::class, 'stepTwo'])->name('front.transactions.stepTwo')->middleware('auth');
        Route::Post('/transactions/store', [TransactionController::class, 'store'])->name('front.transactions.store')->middleware('auth');
        Route::get('/transactions/{type?}', [TransactionController::class, 'index'])->name('front.transactions')->middleware('auth');
        Route::get('/orders/{type?}', [FrontOrderController::class, 'index'])->name('front.orders')->middleware('auth');

        /********** Providers *************/
        
});

Route::get('/old', [App\Http\Controllers\HomeController::class, 'root'])->name('root');
//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);
