<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller{

    public function savePeriod($period){
        User::changePeriod($period, auth()->user()->id);
    }
    
    public function dashboard(){
        $period = auth()->user()->period;
        return view('admin.dashboard', array(
            'period' => $period
        ));
    }
}
