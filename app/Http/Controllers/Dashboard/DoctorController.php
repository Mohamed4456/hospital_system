<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Interfaces\Doctors\DoctorRepositoryInterface;


class DoctorController extends Controller
{
    private $Doctors;

    public function __construct(DoctorRepositoryInterface $Doctors)
    {
        $this->Doctors = $Doctors;
    }


    public function index()
    {
    return $this->Doctors->index();
    }

    
    public function create()
    {
        return $this->Doctors->create();
    }

    
    public function store(Request $request)
    {
        return $this->Doctors->store($request);
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return $this->Doctors->edit($id);
    }


    public function update(Request $request, $id)
    {
        return $this->Doctors->update($request);
    }


    public function destroy( Request $request)
    {
        return $this->Doctors->destroy($request);
    }
    

    public function update_password( Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);
        return $this->Doctors->update_password($request);
    }

    public function update_status( Request $request)
    {
        return $this->Doctors->update_status($request);
    }

}
