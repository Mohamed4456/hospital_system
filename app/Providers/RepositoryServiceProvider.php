<?php

namespace App\Providers;

use App\Interfaces\Ambulances\AmbulanceRepositoryInterface;
use App\Interfaces\doctor_dashboard\DiagnosisRepositoryInterface;
use App\Interfaces\doctor_dashboard\InvoicesRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Repository\Sections\SectionRepository;
use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Interfaces\Finance\PaymentRepositoryInterface;
use App\Interfaces\Finance\ReceiptRepositoryInterface;
use App\Repository\Doctors\DoctorRepository;
use App\Repository\Services\SingleServiceRepository;
use App\Interfaces\Services\SingleServiceRepositoryInterface;
use App\Interfaces\insurances\insuranceRepositoryInterface;
use App\Interfaces\Patients\PatientRepositoryInterface;
use App\Repository\Ambulances\AmbulanceRepository;
use App\Repository\doctor_dashboard\DiagnosisRepository;
use App\Repository\doctor_dashboard\InvoicesRepository;
use App\Repository\Finance\PaymentRepository;
use App\Repository\Finance\ReceiptRepository;
use App\Repository\insurances\insuranceRepository;
use App\Repository\Patients\PatientRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //admin
        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);
        $this->app->bind(DoctorRepositoryInterface::class, DoctorRepository::class);
        $this->app->bind(SingleServiceRepositoryInterface::class, SingleServiceRepository::class);
        $this->app->bind(insuranceRepositoryInterface::class, insuranceRepository::class);
        $this->app->bind(AmbulanceRepositoryInterface::class, AmbulanceRepository::class);
        $this->app->bind(PatientRepositoryInterface::class, PatientRepository::class);
        $this->app->bind(ReceiptRepositoryInterface::class, ReceiptRepository::class);
        $this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);


         // doctor
        $this->app->bind(InvoicesRepositoryInterface::class, InvoicesRepository::class);
        $this->app->bind(DiagnosisRepositoryInterface::class, DiagnosisRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
