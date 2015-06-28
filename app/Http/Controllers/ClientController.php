<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Client;
use App\Http\Requests\StoreaddClientPostRequest;
use App\User;
use Auth;
use Session;

use Illuminate\Http\Request;


class ClientController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $clientList=User::findOrFail(Auth::user()->id)->client->where('role','tenant');

        return view('clients',compact('clientList'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		return view('addClient');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreaddClientPostRequest $request
     * @return Response
     */
	public function store(StoreaddClientPostRequest $request)
	{

        $person = new Client(array(
            'firstName'     =>  $request->firstName,
            'lastName'      =>  $request->lastName,
            'user_id'       =>  Auth::user()->id,
            'nationality'   =>  $request->nationality,
            'email'         =>  $request->email,
            'idNumber'      =>  $request->idNumber,
            'phoneNo'       =>  $request->phone,
            'role'          =>  'tenant'

        ));

        $person->save();
        Session::put('ClientInsertedId', $person->id);
        Session::put('AddRole', 'client');
        return redirect('address/create');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return $id;
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
