<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $table = 'record';

    public static $rules = array(
        'profiles_id' => 'required',
        'edited_at' => 'required',
    );
}
