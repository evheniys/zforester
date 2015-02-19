<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Files;
use Carbon\Carbon;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Request;

class FilesController extends Controller {

    public function __construct()
    {
    //    $this->middleware('auth');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $files = Files::all();
        return view('downloads',compact('files'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('uploadfile');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
        if (Request::hasFile('attachedfile')) {

           // $allowedext = array("png", "jpg", "jpeg");
            $filef = Request::file('attachedfile');
            $destinationPath =  'upload';
            $filename = $filef->getClientOriginalName();
            $extension = $filef->getClientOriginalExtension();
            $mimetype = $filef->getClientMimeType();




            $file = Request::all();
                if(!File::exists(public_path().'/'.$destinationPath)) {
                    if(!File::makeDirectory(public_path().'/'.$destinationPath)) {
                        abort(503);
                    }
                }
                $upload_success = Request::file('attachedfile')->move(public_path().'/'.$destinationPath, $filename);
                $file['filename'] = $destinationPath.'/'.$upload_success->getFilename();
                $file['mimetype'] = $mimetype;
                $file['published_at'] = Carbon::now();
                Files::create($file);
        }
        return redirect('/files/add');


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

    public function download($id)
    {
        //
        $file = Files::find($id);
        dd($file);
    }

}
