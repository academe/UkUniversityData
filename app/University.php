<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $table      = 'universities';
    protected $primaryKey = 'UKPRN';
    public $timestamps    = false;

    public function courses()
    {           
        return $this->hasMany('App\Course', 'UKPRN');
    }

    public function scopeIsInstitution($query) {
        //Join ignores some values as they do not exist on both unistats data and learning provider data,
        // looks to be because they are colleges or collections rather than a university
        return $query->join('institutions', 'institutions.UKPRN', '=', 'universities.UKPRN');
    }


}
