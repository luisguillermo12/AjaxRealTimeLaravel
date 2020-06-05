<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    
    protected $table =  'question';

    protected $fillable = ['id', 'user_id' , 'pregunta'];

    protected $primarykey = 'id';

    public $timestamps = true;
}
