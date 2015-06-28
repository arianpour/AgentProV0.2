<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model {

	public function client(){
        return $this->belongsTo('App\Client');
    }
    public function addresses(){
        return $this->morphOne('App\Address','addressable');
    }

    public function renalAgreement(){
        return $this->hasMany('App\RentalAgreement');
    }
}
