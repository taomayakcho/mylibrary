<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Book extends Model
{
    protected $table = 'books';

    public $primaryKey = 'id';

    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
