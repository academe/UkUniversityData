<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $table      = 'institutions';
    protected $primaryKey = 'UKPRN';
    public $timestamps    = false;
    
    public function courses()
    {           
        return $this->hasMany('App\Course', 'UKPRN');
    }




}
