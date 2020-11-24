<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepairRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'car_id' => 'required',
            'description' => 'required',
            'parts_cost' => 'required',
            'repair_cost' => 'required',
            'repair_time' => 'required'
        ];
    }
}
