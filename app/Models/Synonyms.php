<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Synonyms extends Model{
    public $table = "synonyms";
    protected function getSynonyms($word){
        return $this
            ->where('word', $word)
            ->pluck('synonym');
    }
}
