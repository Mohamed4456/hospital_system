<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Dashboard\AmbulanceController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\SingleServiceController;
use App\Http\Controllers\Dashboard\InsuranceController;
use App\Http\Controllers\Dashboard\PatientController;
use App\Http\Controllers\Dashboard\PaymentAccountController;
use App\Http\Controllers\Dashboard\ReceiptAccountController;

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



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
        


        Route::get('/', function () {
            return view('welcome');
        });
        
   //############################# admin route ##########################################
        Route::get('/admin/dashboard', function () {
            return view('Dashboard.Admin.Dashboard.index');
        })->middleware(['auth:admin'])->name('admin.dashboard');
        
        //############################# user route ##########################################
        Route::get('/user/dashboard', function () {
            return view('Dashboard.User.Dashboard.index');
        })->middleware(['auth:web'])->name('user.dashboard');
        //############################# admin logout ##########################################
       
       
       
        Route::post('logout/admin', [AdminController::class, 'destroy'])->name('logout.admin');
        



        Route::middleware(['auth:admin'])->group(function () {

        Route::resource('Sections', SectionController::class);
        #####################  Doctors    ####################
        Route::resource('Doctors', DoctorController::class);
        Route::post('update_password', [DoctorController::class, 'update_password'])->name('update_password');
        Route::post('update_status', [DoctorController::class, 'update_status'])->name('update_status');

        #######################Services###########################
        Route::resource('Service', SingleServiceController::class);

        ####################### Group Services#####################

        Route::view('Add_GroupServices','livewire.GroupServices.empty')->name('Add_GroupServices');
    
        ######################## Insurances #######################
        Route::resource('insurance', InsuranceController::class);

        #######################Ambulace###########################
        Route::resource('Ambulance', AmbulanceController::class);


         #######################Patients###########################
         Route::resource('Patients', PatientController ::class);

    #######################Single_Invoices###########################
    Route::view('single_invoices','livewire.single_invoices.index')->name('single_invoices');
    Route::view('Print_single_invoices','livewire.single_invoices.print')->name('Print_single_invoices');
    
    Route::resource('Receipt', ReceiptAccountController::class);

    //############################# end Receipt route ######################################

    //############################# Payment route ##########################################

    Route::resource('Payment', PaymentAccountController::class);
    

    //############################# end Payment route ######################################


   //############################# Group_invoices route ##########################################

   Route::view('group_invoices','livewire.group_invoices.index')->name('group_invoices');

   Route::view('group_Print_single_invoices','livewire.group_invoices.print')->name('group_Print_single_invoices');

   //############################# end Group_invoices route ######################################


});



    
    
        require __DIR__.'/auth.php';





    });










Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Route::get('/user/dashboard/valex', [DashboardController::class, 'index']);

