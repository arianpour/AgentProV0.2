<?php namespace App\Http\Controllers;

use App\Address;
use App\Client;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreAddressPostRequest;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AddressController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('addAddress');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAddressPostRequest $request
     * @return Response
     */
	public function store(StoreAddressPostRequest $request)
	{

        $address= new Address(array(
            'unit'=> $request->unit,
            'street'=>$request->street,
            'postCode'=>$request->postcode,
            'city'=>$request->city,
            'state'=>$request->state,
            'country'=>$request->country,
        ));
        switch(Session::get('AddRole')){
            case "client":
                $client= Client::find(Session::get('ClientInsertedId'));
                $client->addresses()->save($address);
                break;
            case "property":
                $property=Property::find(Session::get('PropertyInsertedId'));
                $property->addresses()->save($address);
                break;
        }

        return redirect('rentalagreement/create');	}

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
