<?php

namespace App\Http\Requests;

use App\Order;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
      
        return true;
    }

    public function rules()
    {
        return [
            'customer_name' => [
                'required',
            ],
        ];
    }
}
