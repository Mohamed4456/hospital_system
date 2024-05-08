<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\DoctorController;
use App\Http\Controllers\Dashboard_Doctor\DiagnosticController;
use App\Http\Controllers\Dashboard_Doctor\InvoiceController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
    
       
        //############################# doctor route ##########################################
        Route::get('/doctor/dashboard', function () {
        return view('Dashboard.Doctor_dashboard.Dashboard.index');
        })->middleware(['auth:doctor'])->name('doctor.dashboard');

        Route::post('logout/doctor', [DoctorController::class, 'destroy'])->name('logout.doctor');
        



        Route::middleware(['auth:doctor'])->group(function () {

            Route::prefix('doctor')->group(function () {
    
               
            //############################# completed_invoices route ##########################################
            Route::get('completed_invoices', [InvoiceController::class,'completedInvoices'])->name('completedInvoices');
            //############################# end invoices route ################################################

            //############################# review_invoices route ##########################################
            Route::get('review_invoices', [InvoiceController::class,'reviewInvoices'])->name('reviewInvoices');
            //############################# end invoices route #############################################

            //############################# invoices route ##########################################
            Route::resource('invoices', InvoiceController::class);
            //############################# end invoices route ######################################


            //############################# review_invoices route ##########################################
            Route::post('add_review', [DiagnosticController::class,'addReview'])->name('add_review');
            //############################# end invoices route #############################################


            //############################# Diagnostics route ##########################################

            Route::resource('Diagnostics', DiagnosticController::class);

            //############################# end Diagnostics route ######################################


        
            });
        });



    
    
        require __DIR__.'/auth.php';





    });










