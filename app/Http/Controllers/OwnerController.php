<?php namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

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
            'phone'       =>  $request->phoneNo,
            'role'          =>  'owner'

        ));
        $person->save();
        Session::put('ClientInsertedId', $person->id);
        Session::put('AddRole', 'client');
        Session::flash('flash_message', 'Owner successfully added! Need to add the Address');

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
        $owner=Client::find($id);
        $address=$owner->addresses()->get();
        return view('showOwner',compact('owner','address'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $owner=Client::findOrFail($id);
        return view('editOwner',compact('owner'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param StoreaddClientPostRequest $request
     * @return Response
     */
	public function update($id,StoreaddClientPostRequest $request)
	{
		$owner=Client::findOrFail($id);
        $input=$request->all();
        $owner->fill($input)->save();
        Session::flash('flash_message', 'Owner successfully Updated!');
        return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $owner = Client::findOrFail($id);

        $owner->delete();
        //TODO: have to remove the address too
        Session::flash('flash_message', 'Owner successfully deleted!');

        return redirect()->action('OwnerController@index');

    }

}
