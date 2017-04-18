<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDealersRequest extends FormRequest
{
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
            
            'shop_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'min:10|max:10|required|unique:dealers,mobile,'.$this->route('dealer'),
            'phone' => 'min:10|max:10',
            'city' => 'required',
            'password' => 'required',
        ];
    }
}
