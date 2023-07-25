<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class CreateInvoiceRequest extends ApiRequest
{


    public function rules()
    {
        return [
            'name' => 'required|string',
            'date' => 'required|date_format:Y-m',
            'price' => 'required|numeric',
        ];
    }
}
