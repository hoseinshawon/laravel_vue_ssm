<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = ['remember_token'];

    protected $hidden = ['password', 'remember_token'];
}
