<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\BannerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

## Login And Register

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

## My profile And Edit Profile

Route::post('/profile',[AuthController::class,'profile']);
Route::post('/update_profile',[AuthController::class,'update_profile']);
Route::post('/forget_password',[AuthController::class,'forget_pass']);
//Route::post('/reset_password',[AuthController::class,'reset_password']);


## Banner And Add Banner
Route::post('/add_banner',[AuthController::class,'add_banner']);
Route::get('/show_banner',[AuthController::class,'show_banner']);
Route::post('/trade_portfolio',[AuthController::class,'trade_portfolio']);
Route::get('/trade-portfolio-list',[AuthController::class,'all_trade_portfolio']);
Route::post('/trade-portfolio-search',[AuthController::class,'trade_portfolio_search']);

Route::post('/company-share-buy',[AuthController::class,'company_share_buy']);
Route::post('/company-share-sell',[AuthController::class,'company_share_sell']);
Route::get('/user-shares-ledger',[AuthController::class,'user_shares_ledger']);
Route::post('/companywise-user-share-ledger',[AuthController::class,'companywise_user_share_ledger']);

/** modified */

Route::post('/shares_graph',[AuthController::class,'shares_graph']);
Route::post('/companywise_shares_graph',[AuthController::class,'companywise_shares_graph']);
Route::post('/user_dashboard',[AuthController::class,'user_dashboard']);
Route::post('/user_wallet_activity',[AuthController::class,'user_wallet_activity']);
Route::post('/user_wallet_details',[AuthController::class,'user_wallet_details']);

Route::post('/token_watch_list',[AuthController::class,'token_watch_list']);
Route::post('/saved_stocks_list',[AuthController::class,'saved_stocks_list']);
Route::post('/portfolio_statistics',[AuthController::class,'portfolio_statistics']);
Route::post('/all_transactions',[AuthController::class,'all_transactions']);
Route::post('/datewise_transactions',[AuthController::class,'datewise_transactions']);

Route::post('/income_transactions',[AuthController::class,'income_transactions']);
Route::post('/card_details',[AuthController::class,'card_details']);

Route::post('/card_settings',[AuthController::class,'card_settings']);

Route::post('/trade_balance',[AuthController::class,'trade_balance']);
Route::post('/send_money',[AuthController::class,'send_money']);
Route::post('/add_fund',[AuthController::class,'add_fund']);
Route::post('/add_bank',[AuthController::class,'add_bank']);
Route::get('/send-email', [AuthController::class, 'mail_index']);

Route::get('/email-varification/{id}', [AuthController::class, 'email_varification']);

Route::post('/forget-password-new', [AuthController::class, 'forget_password_new']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/logout',[AuthController::class,'logout']);
Route::post('/change_password',[AuthController::class,'reset_password']);

