<?php

namespace App\Http\Requests;

use App\Enums\ShippingMethods;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class OrderCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'billing' => [
                'first_name' => ['required', 'string', 'max:255', 'min:1'],
                'last_name' => ['required', 'string', 'max:255', 'min:1'],
                'email' => ['required', 'string', 'email', 'max:255', 'min:1'],
                'phone' => ['required', 'string', 'max:255', 'min:1'],
                'address_1' => ['required', 'string', 'max:255', 'min:1'],
                'address_2' => ['required', 'string', 'max:255', 'min:1'],
                'city' => ['required', 'string', 'max:255', 'min:1'],
                'country' => ['required', 'string', 'max:255', 'min:1'],
                'postcode' => ['required', 'string', 'max:255', 'min:1'],
            ],
            'shipping' => [
                'first_name' => ['required', 'string', 'max:255', 'min:1'],
                'last_name' => ['required', 'string', 'max:255', 'min:1'],
                'address_1' => ['required', 'string', 'max:255', 'min:1'],
                'address_2' => ['required', 'string', 'max:255', 'min:1'],
                'city' => ['required', 'string', 'max:255', 'min:1'],
                'state' => ['required', 'string', 'max:255', 'min:1'],
                'postcode' => ['required', 'string', 'min:1', 'max:9999'],
                'country' => ['required', 'string', 'min:1', 'max:255'],
                'lines_method' => ['required', new EnumValue(ShippingMethods::class)],
            ],
        ];

    }
}
