<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\invoiceController;
use App\Http\Controllers\productController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\reportController;
use App\Http\Controllers\userController;
use App\Http\Middleware\tokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;

// Frontend View Routes
Route::get('/', [homeController::class, 'homePage']);
Route::get('/userRegistration', [userController::class, 'RegistrationPage']);
Route::get('/userLogin', [userController::class, 'userLoginPage']);
Route::get('/sendOtp', [userController::class, 'sendOtpPage']);
Route::get('/verifyOtp', [userController::class, 'verifyOtpPage']);
Route::get('/resetPassword', [userController::class, 'resetPasswordPage']);
//..................................................................................

Route::get('/dashboard', [DashboardController::class, 'dashboardPage'])->name('dashboardPage')->middleware(tokenVerificationMiddleware::class);
Route::get('/categoryPage', [categoryController::class, 'categoryPage'])->name('categoryPage')->middleware(tokenVerificationMiddleware::class);
Route::get('/customerPage', [customerController::class, 'customerPage'])->name('customerPage')->middleware(tokenVerificationMiddleware::class);
Route::get('/productPage', [productController::class, 'productPage'])->name('productPage')->middleware(tokenVerificationMiddleware::class);
Route::get('/invoicePage', [invoiceController::class, 'invoicePage'])->name('invoicePage')->middleware(tokenVerificationMiddleware::class);
Route::get('/reportPage', [reportController::class, 'reportPage'])->name('reportPage')->middleware(tokenVerificationMiddleware::class);
Route::get('/salePage', [reportController::class, 'salePage'])->name('salePage')->middleware(tokenVerificationMiddleware::class);
Route::get('/userProfile', [profileController::class, 'userProfilePage'])->middleware(tokenVerificationMiddleware::class);

//................................................................................

//Backend Controllers Route
//User API
Route::post('/user-registration', [UserController::class, 'userRegistration']);
Route::post('/user-login', [UserController::class, 'userLogin']);
Route::get('/user-logout', [UserController::class, 'logout']);
Route::post('/send-otp', [UserController::class, 'sendOTP']);
Route::post('/verify-otp', [UserController::class, 'verifyOTP']);
Route::post('/reset-password', [UserController::class, 'resetPassword'])->middleware(tokenVerificationMiddleware::class);
Route::get('/user-profile', [profileController::class, 'userProfile'])->middleware(tokenVerificationMiddleware::class);
Route::post('/user-profile-update', [profileController::class, 'userProfileUpdate'])->middleware(tokenVerificationMiddleware::class);

// Category API
Route::get('/category-list', [categoryController::class, 'categoryList'])->middleware(tokenVerificationMiddleware::class);
Route::post('/category-create', [categoryController::class, 'createCategory'])->middleware(tokenVerificationMiddleware::class);
Route::post('/category-destroy', [categoryController::class, 'categoryDestroy'])->middleware(tokenVerificationMiddleware::class);
Route::post('/category-by-id', [categoryController::class, 'categoryByID'])->middleware(tokenVerificationMiddleware::class);
Route::post('/category-update', [categoryController::class, 'categoryUpdate'])->middleware(tokenVerificationMiddleware::class);

//Customer API
Route::post('/customer-create', [CustomerController::class, 'customerCreate'])->middleware(tokenVerificationMiddleware::class);
Route::get('/customer-list', [CustomerController::class, 'customerList'])->middleware(tokenVerificationMiddleware::class);
Route::post('/customer-delete', [CustomerController::class, 'customerDelete'])->middleware(tokenVerificationMiddleware::class);
Route::post('/customer-by-id', [CustomerController::class, 'customerById'])->middleware(tokenVerificationMiddleware::class);
Route::post('/customer-update', [CustomerController::class, 'customerUpdate'])->middleware(tokenVerificationMiddleware::class);

//product API
Route::post('/product-create', [productController::class, 'productCreate'])->middleware(tokenVerificationMiddleware::class);
Route::get('/product-list', [productController::class, 'productList'])->middleware(tokenVerificationMiddleware::class);
Route::post('/product-by-id', [productController::class, 'productById'])->middleware(tokenVerificationMiddleware::class);
Route::post('/product-delete', [productController::class, 'productDelete'])->middleware(tokenVerificationMiddleware::class);
Route::post('/product-update', [productController::class, 'productUpdate'])->middleware(tokenVerificationMiddleware::class);

//Invoice API
Route::post('/invoice-create', [invoiceController::class, 'invoiceCreate'])->middleware(tokenVerificationMiddleware::class);
Route::get('/invoice-select', [invoiceController::class, 'invoiceSelect'])->middleware(tokenVerificationMiddleware::class);
Route::post('/invoice-details', [invoiceController::class, 'invoiceDetails'])->middleware(tokenVerificationMiddleware::class);
Route::post('/invoice-delete', [invoiceController::class, 'invoiceDelete'])->middleware(tokenVerificationMiddleware::class);

//Dashboard Summary
Route::get('/dashboard-summary', [DashboardController::class, 'summary'])->middleware(tokenVerificationMiddleware::class);

// Report Generation
Route::get("/sales-report/{FormDate}/{ToDate}", [ReportController::class, 'salesReport'])->middleware([TokenVerificationMiddleware::class]);
