<?php namespace App\Http\Controllers;

use App\Address;
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
            'phoneNo'       =>  $request->phoneNo,
            'role'          =>  'tenant'

        ));
        $person->save();
        Session::put('ClientInsertedId', $person->id);
        Session::put('AddRole', 'client');
        Session::flash('flash_message', 'Client successfully added! Need to add the Address');
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

        $client=Client::find($id);
        $address=$client->addresses()->get();
        return view('showClient',compact('client','address'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $client=Client::findOrFail($id);
        return view('editClient',compact('client'));

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
		$client=Client::findOrFail($id);
        $input=$request->all();
        $client->fill($input)->save();
        Session::flash('flash_message', 'Client successfully Updated!');
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
        $client = Client::findOrFail($id);

        $client->addresses()->delete();
        $client->delete();

        Session::flash('flash_message', 'Client successfully deleted!');

        return redirect()->action('ClientController@index');
	}

}
