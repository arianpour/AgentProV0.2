<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
class Client extends Model {


    protected $fillable = ['firstName','lastName','email','phoneNo',
    'idNumber','nationality','role','user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function property(){
        return $this->hasMany('App\Property');
    }

    public function addresses(){
        return $this->morphOne('App\Address','addressable');
    }
    public function bankDetails(){
        return $this->hasMany('App\BankDetail');
    }
    public function renalAgreement(){
        return $this->hasMany('App\RentalAgreement');
    }
}
