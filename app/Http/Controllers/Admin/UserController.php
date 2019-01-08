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
        $translang = auth()->user()->translang;
        $translangs = array('ua', 'ru', 'en');
        $wordlang = auth()->user()->wordlang;
        $wordlangs = array('ua', 'ru', 'en');
        $autochangekeylang = auth()->user()->autochangekeylang;
        return view('admin.dashboard', compact(
            'period', 'studied', 'autochangekeylang',
            'translang', 'wordlang', 'translangs', 'wordlangs'
        ));
    }
}
