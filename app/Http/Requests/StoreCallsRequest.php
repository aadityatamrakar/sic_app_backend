<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCallsRequest extends FormRequest
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
            'type' => 'required',
            'brand' => 'required',
            'product' => 'required',
            'model' => 'required',
            
            
            'customer_mobile' => 'min:10|max:10',
            'customer_phone' => 'min:10|max:10',
            
            
            
            
            
        ];
    }
}
