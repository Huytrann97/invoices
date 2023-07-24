<?php

namespace App\Http\Requests;

use Carbon\Carbon;

class InvoiceByYearRequest extends ApiRequest
{
   
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'year' => ['required', 'date_format:Y',
                function ($attribute, $value, $fail) {
                    if ($value > Carbon::now()->format('Y')) {
                        $fail('The ' . $attribute . ' CAN NOT be greater than current year.' );
                    }
                },
            ],
        ];
    }
}
