<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model {

	//
    protected $table = "userlog";
    protected $fillable = array('userid','activity','ipaddress');

}
