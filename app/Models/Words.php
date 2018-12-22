<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Words extends Model{
    public $tableName = 'words';
    protected function getRandomWord($user){
        return $this
            ->whereNotExists(function($query) use($user){
                $query->select(DB::raw('*'))
                    ->from('repeats')
                    ->whereColumn('repeats.word', 'words.word')
                    ->where('repeats.user', $user);
            })
            ->inRandomOrder()
            ->first();
    }
}
