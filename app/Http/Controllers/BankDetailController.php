<?php namespace App\Http\Controllers;

use App\BankDetail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreBankDetailPostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BankDetailController extends Controller {

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
        return view('addBankDetail');	}

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBankDetailPostRequest $request
     * @return Response
     * @internal param $id
     */
	public function store(StoreBankDetailPostRequest $request)
	{

        $bank = new BankDetail(array(
            'bankName'     =>  $request->bankName,
            'accountNo'    =>  $request->accountNo,
            'client_id'    => Session::get('clientInsertedId'),

        ));
        $bank->save();
        Session::flash('flash_message', 'Bank details successfully added! Need to add the Address');
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
