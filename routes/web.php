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

Route::get('/', function ( \Illuminate\Http\Request $request ) {
    \App\Http\Controllers\PageViewController::recordPageView($request);
    $utm_source = "direct";
    $utm_campaign="none";
    $utm_medium="na";
    $utm_content="na";
    extract( $_GET, EXTR_OVERWRITE );
    $query = http_build_query(compact('utm_source','utm_campaign','utm_medium','utm_content'));
    return redirect("/campaign/contest?$query");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/terms', function() {
    return view('promotion.terms');
});
Route::get('/unsubscribe/{ref_id}/{sec_token}', 'ReferralOfferViewController@unsubscribe')->name('unsubscribe');
Route::get('/confirm/{ref_id}/{sec_token}', 'ReferralOfferViewController@verify')->name('verify');
Route::prefix('campaign')->group(function() {
    Route::get('/new', function() {
        return 'create';
    });
    Route::get('/offer', function() {
        return 'edit';
    });
    Route::get('/contest/{ref_id?}', 'ReferralOfferViewController@displayOffer')->name('registration.new');
    Route::post('/{code}/register', 'ReferralOfferViewController@registerVisitor')->name('registration.create');
    Route::get('/{code}/{new_ref_id}/thank-you', 'ReferralOfferViewController@successfulRegistration')->name('registration.success');
    Route::get('/{code}/error', 'ReferralOfferViewController@rejectedRegistration')->name('registration.error');
    Route::get('/{code}/contest', 'ReferralOfferViewController@rejectedRegistration')->name('contest.offer');
});

Route::get( '/email', function(){
    $referrer = factory( App\Campaign\Referrer::class )->create();
    return view( 'email.text.referral-program-notice', compact('referrer'));
} );
