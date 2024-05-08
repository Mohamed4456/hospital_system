<?php

namespace App\Interfaces\doctor_dashboard;

interface InvoicesRepositoryInterface
{
    // Get Invoices Doctor
    public function index();
     // edit status Invoices Doctor
     public function reviewInvoices();

    // Get completedInvoices Doctor
    public function completedInvoices();
    
}