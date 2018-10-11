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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/terms', function() {
    return view('promotion.terms');
});
Route::prefix('campaign')->group(function() {
    Route::get('/new', function() {
        return 'create';
    });
    Route::get('/offer', function() {
        return 'edit';
    });
    Route::get('/{code}/{ref_id?}', function( \App\Campaign\Promotion $promotion, \App\Campaign\Referrer $referrer ) {
        return view('promotion.offer');
    });
    Route::post('/{code}/{ref_id?}/register', function( \Illuminate\Http\Request $request, \App\Campaign\Promotion $promotion, \App\Campaign\Referrer $referrer ) {
        return redirect(route('new-registration', compact('promotion', 'referrer')));
    });
    Route::get('/{code}/{ref_id?}/thank-you', function( \App\Campaign\Promotion $promotion, \App\Campaign\Referrer $referrer ) {
        dd($promotion);
    })->name('new-registration');
});
