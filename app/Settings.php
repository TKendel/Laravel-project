<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable=[
    	'name','contact_number','contact_address','email',
    ];
}
