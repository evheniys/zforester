<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class FileLog extends Model {

	//
    protected $table = "filelog";
    protected $fillable = array('userid','fileid');

}
