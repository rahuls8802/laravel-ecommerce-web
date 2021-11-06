<?php

use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\User\UserDashboardComponent;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeComponent::class);

Route::get('/shop', ShopComponent::class);

Route::get('/cart', CartComponent::class)->name('product.cart');

Route::get('/checkout', CheckoutComponent::class);

// Product Details Page Routes starts here
Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');

// Route for Categories
Route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category');

//Route for Search
Route::get('/search', SearchComponent::class)->name('product.search');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

//Group middleware For User or Customer
Route::middleware([
    'auth:sanctum', 'verified'
])->group(function () {
    // User/customer dashboard component Routes
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});

// Group middleware For User Admin
Route::middleware([
    'auth:sanctum', 'verified', 'authadmin'
])->group(function () {
    // Admin dashboard component Routes
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    // Admin Categories Route
    Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
    // Admin add category Route
    Route::get('/admin/category/add', AdminAddCategoryComponent::class)->name('admin.addcategory');
    // Admin Edit category Rote
    Route::get('/admin/category/edit/{category_slug}', AdminEditCategoryComponent::class)->name('admin.editcategory');
    // Admin Product page route
    Route::get('/admin/products', AdminProductComponent::class)->name('admin.products');
    //Admin Add Product
    Route::get('/admin/product/add', AdminAddProductComponent::class)->name('admin.addproduct');
});
