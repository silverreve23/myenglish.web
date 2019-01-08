<?php

namespace App\Http\Controllers;

use App\Models\Repeats;
use App\Models\User;

class APIController extends Controller{
    public function getWord($user, $wordlang, $translang){
        $wordData = Repeats::getRandomWord($user, $wordlang, $translang);
        return response()->json($wordData);
    }
    public function failsPriority($word, $user){
        $upData = Repeats::updateFails($word, $user);
        return response()->json($upData);
    }
    public function successPriority($word, $user){
        $upData = Repeats::updateSuccess($word, $user);
        return response()->json($upData);
    }
    public function checkUser($email, $name, $passwd){
        $checkData = User::checkUser($email, $name, $passwd);
        return response()->json($checkData);
    }
    public function getPeriod($email){
        $user = User::getUser($email);
        return response($user->period ?? 5);
    }     
    public function getTransLang($email){
        $user = User::getUser($email);
        return response(@$user->wordlang.'-'.@$user->translang);
    }    
    public function getAutoChangeKeyLang($email){
        $user = User::getUser($email);
        return response($user->autochangekeylang ?? 0);
    }    
    public function getUpdate(){
        return "Update to new version 1.2.4?";
    }
}
