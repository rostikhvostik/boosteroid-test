<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SongRequest
 * @package App\Http\Requests
 * @property string $email
 * @property int $duration
 */
class SongRequest extends FormRequest
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
            'email' => ['required', 'string', 'email'],
            'duration' => ['required', 'integer', 'min:0', 'not_in:0'],
        ];
    }
}
