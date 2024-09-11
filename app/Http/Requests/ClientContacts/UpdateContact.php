<?php

namespace App\Http\Requests\ClientContacts;

use App\Http\Requests\CoreRequest;

class UpdateContact extends CoreRequest
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
            'contact_name' => 'required',
            'email' => 'email:rfc|unique:client_contacts,email,' . $this->route('client_contact').',id,company_id,' . company()->id,

        ];
    }

}
