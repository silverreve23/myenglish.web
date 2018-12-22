<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller{

    public function savePeriod($period){
        User::changePeriod($period, auth()->user()->id);
    }
    public function saveAutoChangeKeyLang($value){
        User::changeAutoChangeKeyLang($value, auth()->user()->id);
    }
    public function dashboard(){
        $period = auth()->user()->period;
        $studied = auth()->user()->studied;
        $autochangekeylang = auth()->user()->autochangekeylang;
        return view('admin.dashboard', compact(
            'period', 'studied', 'autochangekeylang'
        ));
    }
}
