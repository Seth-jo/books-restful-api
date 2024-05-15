<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Genre;
use App\Models\Author;


class UpdateAuthorRequest extends FormRequest
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
        $method = $this->method();
        if($method == 'PUT'){
            return [
                'title' => ['required','string'],
                'isbn'=> ['required','string'],
                'genreId'=>['required',Rule::in(Genre::all()->pluck('id')->toArray())],
                'authorId'=>['required',Rule::in(Author::all()->pluck('id')->toArray())]
            ];
        }
        else {
            return [
                'title' => ['sometimes','required','string'],
                'isbn'=> ['sometimes','required','string'],
                'genreId'=>['sometimes','required',Rule::in(Genre::all()->pluck('id')->toArray())],
                'authorId'=>['sometimes','required',Rule::in(Author::all()->pluck('id')->toArray())]
            ];
        }
    }

    protected function prepareForValidation(){
        $this->merge([
            'genre_id' => $this->genreId,
            'author_id'=> $this->authorId
        ]);
    }
}
