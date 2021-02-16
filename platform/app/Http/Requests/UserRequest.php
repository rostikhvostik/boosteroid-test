<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class UserRequest
 * @package App\Http\Requests
 * @property string $operator
 * @property int $total_duration
 */
class UserRequest extends FormRequest
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
            'operator' => ['sometimes', Rule::in(['<', '=', '>'])],
            'total_duration' => ['sometimes', 'integer', 'min:0', 'not_in:0'],
        ];
    }
}
