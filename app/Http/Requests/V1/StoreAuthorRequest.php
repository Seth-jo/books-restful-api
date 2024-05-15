<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Genre;

class StoreAuthorRequest extends FormRequest
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
            'name' => ['required','string'],
            ''=> ['required','boolean'],
            'genreId'=>['required',Rule::in(Genre::all()->pluck('id')->toArray())],

        ];
    }

    protected function prepareForValidation(){
        $this->merge([
            'genre_id' => $this->genreId
        ]);
    }
}
