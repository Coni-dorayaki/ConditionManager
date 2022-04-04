<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conditions extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'condition' => 'required',
        'body' => 'required',
    );
}
