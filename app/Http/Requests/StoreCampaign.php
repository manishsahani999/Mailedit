<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCampaign extends FormRequest
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
            'subject'       => 'required',
            'from_name'     => 'required',
            'from_email'    => 'required',
            'reply_to'      => 'required',
            'name'          => 'required',
            'description'   => 'required',
            'htmltext'          => 'required',
            'text'          => 'required',
            'status'        => 'required',
        ];
    }
}
