<?php namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddRAgreementStepOnePostRequest;
use App\Http\Requests\StoreAddRentalAgreementPostRequest;
use App\Property;
use App\RentalAgreement;
use Auth;
use App\User;
use App\HelperFunction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RentalAgreementController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $agreementList=User::findOrFail(Auth::user()->id)->rentalAgreement;

        return view('agreements',compact('agreementList'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

        $clientList=User::findOrFail(Auth::user()->id)
            ->client->where('role','tenant')->lists('name','id');
        $ownerList=User::findOrFail(Auth::user()->id)
            ->client->where('role','owner')->lists('name','id');


		return view('addAgreementStepOne',compact('clientList','ownerList'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @param StoreAddRAgreementStepOnePostRequest $request
     * @return Response
     */
    public function stepOne(StoreAddRAgreementStepOnePostRequest $request)
    {

        Session::put('client_id', $request->tenant);
        Session::put('owner_id', $request->owner);

        $propertyList=Client::findOrFail($request->owner)->property()->get();


        $adds=array();
        foreach($propertyList as $property){

            array_push($adds,$property->addresses()->get()->lists('unit_street','id'));
        }

        return view('addAgreement',compact('adds'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAddRentalAgreementPostRequest $request
     * @return Response
     */
	public function store(StoreAddRentalAgreementPostRequest $request)
	{

        $agreement= new RentalAgreement(array(

            'client_id'         =>  $request->client_id,
            'owner_id'          =>  $request->owner_id,
            'property_id'       =>  $request->property_id,
            'user_id'           =>  Auth::user()->id,
            'dateOfAgreement'   =>  $request->dateOfAgreement,
            'commencingDate'    =>  $request->commencingDate,
            'expireDate'        =>  $request->expireDate,
            'rentalAmount'      =>  $request->rentalAmount,
            'rentalDeposit'     =>  $request->rentalDeposit,
            'utilitiesDeposit'  =>  $request->utilitiesDeposit,
            'otherDeposit'      =>  $request->otherDeposit,
            'premiseUse'        =>  $request->premiseUse
        ));

        $agreement->save();
        Session::flash('flash_message', 'Agreement successfully added! ');

        return view('review');

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
