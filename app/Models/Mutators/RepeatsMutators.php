<?php

namespace App\Models\Mutators;

trait RepeatsMutators {
    public function getFImageAttribute($value){
        return url($value);
    }
}