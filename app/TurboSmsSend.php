<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TurboSmsSend extends Model {

    protected $table = "turbosmssent";
    protected $fillable = array('phone','text','status');

}
