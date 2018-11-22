<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Words extends Model{
    public $tableName = 'words';
    protected function getRandomWord(){
        return $this
            ->inRandomOrder()
            ->first();
    }
}
