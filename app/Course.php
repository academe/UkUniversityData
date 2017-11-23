<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table      = 'courses';
    protected $primaryKey = 'KISCOURSEID';
    public $timestamps    = false;

    public function scopeLikeKeyword($query, $keyword) {
        return $query->where('TITLE', 'like', "%" . $keyword . "%");
    }

    public function university() {
        return $this->belongsTo('App\University', 'UKPRN');
    }
}
