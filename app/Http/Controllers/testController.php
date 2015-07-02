<?php namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class testController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $clients=Client::lists('name','id');
        return view('testView',compact('clients'));
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
     * @param Request $request
     * @return Response
     * @internal param int $id
     */
	public function show(Request $request)
	{
        dd($request);


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
