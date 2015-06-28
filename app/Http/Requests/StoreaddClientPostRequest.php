<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreaddClientPostRequest extends Request {

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
            'firstName'     =>'required|max:150',
            'lastName'      =>'required|max:150',
            'idNumber'      =>'required|max:50',
            'nationality'   =>'required|max:100',
            'phone'         =>'required|max:20',
            'email'         =>'required|max:100'
        ];
	}

}
