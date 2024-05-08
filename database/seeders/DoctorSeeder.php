<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctors = Doctor::factory()->count(30)->create();
        $Appointments=Appointment::all();
       

        // randmon one Appointments to doctore 
        // foreach($doctors as $doctor)
        // {
        //     $appointments=Appointment::all()->random()->id;
        //     $doctor->doctorappointments()->attach($appointments);
        // }


        // randmon one or more Appointments to doctore 

        Doctor::all()->each(function ($doctor) use ($Appointments) {
            $doctor->doctorappointments()->attach(
               $Appointments->random(rand(1,7))->pluck('id')->toArray()
            );
        });


    }
}
