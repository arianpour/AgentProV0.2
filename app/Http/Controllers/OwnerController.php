<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreaddClientPostRequest;
use App\Http\Requests\StoreaddClientPostRequestPostRequest;
use App\Http\Requests\StoreAddOwnerPostRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //TODO: change it to show the owner lists
        $clientList=User::findOrFail(Auth::user()->id)->client->where('role','owner');
        return view('owners',compact('clientList'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('addOwner');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAddClientPostRequest $request
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
            'role'          =>  'owner'

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
