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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', \App\Http\Livewire\Guest\Index::class)->name('index');
Route::get('sitemap.xml', \App\Http\Controllers\sitemapGeneratorController::class . '@index')->name('sitemap');
Route::get('verify-admin', \App\Http\Livewire\Guest\VerifyAdmin::class)->name('verify-admin');

Route::group([
    'middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified',],
    'prefix' => 'admin',
    'as' => 'admin.',
], static function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    /*
     * Roles route list
     */
    Route::middleware(['permission:role-list'])->get('/roles', \App\Http\Livewire\Admin\Roles\Index::class)->name('roles.index');
    Route::middleware(['permission:role-create'])->get('/roles/create', \App\Http\Livewire\Admin\Roles\Create::class)->name('roles.create');
    Route::middleware(['permission:role-edit'])->get('/roles/edit/{id}', \App\Http\Livewire\Admin\Roles\Edit::class)->name('roles.edit');
    Route::get('/roles/{id}', \App\Http\Livewire\Admin\Roles\Show::class)->name('roles.show');

    /*
     * Permission Management
     */
    Route::get('/permission', \App\Http\Livewire\Admin\Permissions\Index::class)->name('permission.index');

    /*
     * Users Route List
     */
    Route::middleware(['permission:user-list'])->get('/users', \App\Http\Livewire\Admin\User\Index::class)->name('user.index');
    Route::middleware(['permission:user-create'])->get('/user/create', \App\Http\Livewire\Admin\User\Create::class)->name('user.create');
    Route::middleware(['permission:user-edit'])->get('/user/edit/{id}', \App\Http\Livewire\Admin\User\Edit::class)->name('user.edit');
    Route::get('/user/profile', \App\Http\Livewire\Admin\Profile\Index::class)->name('user.profile');
    Route::get('/user/setting', \App\Http\Livewire\Admin\Profile\Setting::class)->name('user.setting');


    /*
     * Blog Route List
     */
    Route::group([
        'prefix' => 'blog',
        'as' => 'blog.',
    ], static function () {
        Route::middleware(['permission:blog-list'])->get('/blogs', \App\Http\Livewire\Admin\Blog\Article\Create::class)->name('index');
        Route::middleware(['permission:blog-category-list'])->get('/categories', \App\Http\Livewire\Admin\Blog\Category\Index::class)->name('category.index');
        Route::middleware(['permission:blog-category-create'])->get('/category/create', \App\Http\Livewire\Admin\Blog\Category\Create::class)->name('category.create');
        Route::middleware(['permission:blog-category-edit'])->get('/category/edit/{id}', \App\Http\Livewire\Admin\Blog\Category\Edit::class)->name('category.edit');
    });
});
