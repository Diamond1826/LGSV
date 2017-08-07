<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceLiegenschaft extends Model
{
    protected $fillable = [
    	'serviceID',
        'liegenschaftID', 
        'firma',
        'strasse',
        'plz',
        'ort',
        'tel',
        'ansprechsperson', 
    ];
    /**
    * target table
    * @var $table
    */
    protected $table = 'serviceLiegenschaften';
}
