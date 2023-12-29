<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'status' => 'required',
            // 'image' => 'required'

        ];
    }
    public function messages()
    {
        return [
            'name.required' =>'Không được bỏ trống',
            'slug.required' =>' slug Không được bỏ trống',
            'price.required' =>' price Không được bỏ trống',
            'description.required' =>' description Không được bỏ trống',
            'quantity.required' =>'quantity Không được bỏ trống',
            'status.required' =>' status Không được bỏ trống',
            //  'image.required' =>'image  Không được bỏ trống'
        ];
    }
}
