<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

/**
 * @property mixed Auth
 */
class StoreAddRentalAgreementPostRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [

        'dateOfAgreement'=>'required|max:20',
        'commencingDate'=>'required|max:20',
        'expireDate'=>'required|max:20',
        'rentalAmount'=>'required|max:20',
        'rentalDeposit'=>'required|max:20',
        'utilitiesDeposit'=>'required|max:20',
        'otherDeposit'=>'required|max:20',
        'premiseUse'=>'required|max:20'
		];
	}

}
