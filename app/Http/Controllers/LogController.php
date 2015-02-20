<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{


        $lastday = Carbon::now('Europe/Kiev')->subDay();

        $fcount = DB::table('filelog')
            ->where('created_at','>',$lastday)
            ->count();

        if ($fcount > 0) {

        $flog = DB::table('filelog')
            ->join('users', 'filelog.userid', '=', 'users.id')
            ->join('files', 'filelog.fileid', '=', 'files.id')
            ->where('filelog.created_at', '>', $lastday)
            ->get(array('users.phonenumber', 'files.filename', 'filelog.created_at'));
    }
        $ucount = DB::table('userlog')
            ->where('created_at','>',$lastday)
            ->count();
        if ($ucount > 0) {

        }

        return view('log',['fcount' =>$fcount,'flogs'=>$flog]);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
