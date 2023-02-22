<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\FabricsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RetributionController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SeamoerController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SellingPointController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TradeMarkController;
use App\Http\Controllers\UnitController;
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
    return view('auth.login ');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route Employees
Route::resource('Employees',EmployeController::class);
Route::post('/Employees/ajax_search',[EmployeController::class,'ajax_search'])->name('ajax_search');
Route::get('/edit-employee/{id}',[EmployeController::class,'editEmployess']);
Route::post('Employees-update',[EmployeController::class,'updateEmployees'])->name('Employees-update');
Route::post('Employees-delete',[EmployeController::class,'deleteEmployees'])->name('Employees-delete');
//Route Seamoer
Route::resource('Seamoer-create',SeamoerController::class);
Route::get('edit-Seamoer/{id}',[SeamoerController::class,'editSeamoer']);
Route::post('Seamoer-update',[SeamoerController::class,'updateSeamoer'])->name('Seamoer-update');
Route::post('Seamoer-delete',[SeamoerController::class,'deleteSeamoer'])->name('Seamoer-delete');
Route::get('Seamoer-checkup/{id}',[SeamoerController::class,'deletecheckup'])->name('Seamoer-checkup');
//Routes Retribution
Route::resource('Retribution',RetributionController::class);
Route::get('edit-Retribution/{id}',[RetributionController::class,'editRetribution']);
Route::post('Retribution-update',[RetributionController::class,'updateRetribution'])->name('Retribution-update');
Route::post('Retribution-delete',[RetributionController::class,'deleteRetribution'])->name('Retribution-delete');
Route::get('Retribution-checkup/{id}',[RetributionController::class,'deletecheckup'])->name('Retribution-checkup');
// Route Supplier
Route::resource('Supplier',SupplierController::class);
Route::get('edit-Supplier/{id}',[SupplierController::class,'editSupplier']);
Route::post('Supplier-update',[SupplierController::class,'updateSupplier'])->name('Supplier-update');
Route::post('Supplier-delete',[SupplierController::class,'deleteSupplier'])->name('Supplier-delete');
//Route design
Route::resource('Products-design',DesignController::class);
Route::post('design-update',[DesignController::class,'updatedesign'])->name('design-update');
Route::post('design-delete',[DesignController::class,'deletedesign'])->name('design-delete');
//Route section
Route::resource('Products-section',SectionController::class);
Route::post('section-update',[SectionController::class,'updatesection'])->name('section-update');
Route::post('section-delete',[SectionController::class,'deletesection'])->name('section-delete');
//Route fabrice
Route::resource('Products-fabrice',FabricsController::class);
Route::post('fabrice-update',[FabricsController::class,'updatefabrice'])->name('fabrice-update');
Route::post('fabrice-delete',[FabricsController::class,'deletefabrice'])->name('fabrice-delete');
//Route unit
Route::resource('Products-unit',UnitController::class);
Route::post('unit-update',[UnitController::class,'updateunit'])->name('unit-update');
Route::post('unit-delete',[UnitController::class,'deleteunit'])->name('unit-delete');
//Route Products-tradeMark
Route::resource('Products-tradeMark',TradeMarkController::class);
Route::post('tradeMark-update',[TradeMarkController::class,'updatetradeMark'])->name('tradeMark-update');
Route::post('tradeMark-delete',[TradeMarkController::class,'deletetradeMark'])->name('tradeMark-delete');
// Route Products
Route::resource('Products-ctreate',ProductController::class);
Route::get('/edit-Products/{id}',[ProductController::class,'editProducts'])->name('edit-Products');
Route::post('Products-update',[ProductController::class,'updateProducts'])->name('Products-update');
Route::post('Products-delete',[ProductController::class,'deleteProducts'])->name('Products-delete');
//
Route::resource('Sale-point',SellingPointController::class);
Route::resource('Sale-menu',SaleController::class);
Route::get('edit-Sale-menu/{id}',[SaleController::class,'editSale']);
Route::post('Sale-menu-update',[SaleController::class,'updateSale'])->name('Sale-menu-update');
Route::post('Sale-menu-delete',[SaleController::class,'deleteSale'])->name('Sale-menu-delete');

Route::resource('Sale-reference',SaleController::class);
Route::get('/print-invoice/{id}',[SaleController::class,'printInvoice']);
//Route purchases
Route::resource('purchases-menu',PurchaseController::class);
Route::get('edit-purchases/{id}',[PurchaseController::class,'editpurchases']);
Route::post('purchases-update',[PurchaseController::class,'updatepurchases'])->name('purchases-update');
Route::post('purchases-delete',[PurchaseController::class,'deletepurchases'])->name('purchases-delete');
Route::get('/{page}', [AdminController::class,'index']);


