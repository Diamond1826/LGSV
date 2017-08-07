<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mieter extends Model
{
    protected $fillable = [
    	'mieterID',
        'nachname', 
        'vorname', 
        'strasse', 
        'plz', 
        'ort',
        'tel', 
        'email',
    ];
    /**
    * target table
    * @var $table
    */
    protected $table = 'mieter';
}
