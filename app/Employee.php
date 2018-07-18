<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['firstname', 'lastname', 'company_id', 'email', 'phone'];

    //relationships

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
