<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Words;
use App\Models\User;

class Repeats extends Model{
    public $tableName = 'repeats';
    protected $fillable = array(
        'word', 'user'
    );
    protected function updateFails($word, $user){
        return $this
            ->where('user', $user)
            ->where('word', $word)
            ->increment('priority');
    }
    protected function updateSuccess($word, $user){
        $data = $this
            ->where('user', $user)
            ->where('word', $word)
            ->first();
        if($data->priority < 2)
            User::where('email', $user)
                ->increment("studied");
        return $data->decrement('priority');
    }
    protected function getRandomWord($user){
        
        $repeatWord = $this
            ->where('user', $user)
            ->where('priority', '>', 0)
            ->inRandomOrder()
            ->first();
        if(!$repeatWord){
            $dataWord = Words::getRandomWord($user);
            $this->insert(array(
                'word' => $dataWord->word,
                'trans' => $dataWord->trans,
                'user' => $user,
                'created_at' => date("Y-m-d h:i:s")
            ));
            return $dataWord;
        }
        return $repeatWord;
    }
}
