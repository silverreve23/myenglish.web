<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Words extends Model{
    public $tableName = 'words';
    protected function getRandomWord($user, $wordlang, $translang){
        return $this
            ->whereNotExists(function($query) 
                use($user, $wordlang, $translang){
                    $query->select(DB::raw('*'))
                        ->from('repeats')
                        ->whereColumn('repeats.word', 'words.word')
                        ->where('repeats.user', $user)
                        ->where('repeats.wordlang', $wordlang)
                        ->where('repeats.translang', $translang);
            })
            ->where('wordlang', $wordlang)
            ->where('translang', $translang)
            ->inRandomOrder()
            ->first();
    }
}
