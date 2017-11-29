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

    public function institution() {
        return $this->belongsTo('App\Institution', 'UKPRN');
    }

    public function scopeIsForUniversity($query) {
        $query->join('universities', 'universities.UKPRN', 'courses.UKPRN')->select('courses.*');
    }

    public function getYearAbroadLabelAttribute() {
        switch((int)$this->YEARABROAD) {
            case 0:
                return "Not available";
            case 1: 
                return "Optional";
            case 2:
                return "Compulsory";
            default:
                return "Unknown";
        }
    }

    public function getKismodeLabelAttribute() {
        switch((int)$this->KISMODE) {
            case 1:
                return "Full-time";
            case 2: 
                return "Part-time";
            case 3:
                return "Both";
            default:
                return "Unknown";
        }
    }

    public function getSandwhichLabelAttribute() {
        switch((int)$this->SANDWHICH) {
            case 0:
                return "Not available";
            case 1: 
                return "Optional";
            case 2:
                return "Compulsory";
            default:
                return "Unknown";
        }
    }

    public function getFoundationLabelAttribute() {
        switch((int)$this->FOUNDATION) {
            case 0:
                return "Not available";
            case 1: 
                return "Optional";
            case 2:
                return "Compulsory";
            default:
                return "Unknown";
        }
    }

}
