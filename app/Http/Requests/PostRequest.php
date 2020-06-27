<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (request()->isMethod('PUT')) {
            return auth()->user()->id == request()->author_id;
        }

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
            'title' => 'required|string|max:50|unique:posts,title',
            'body' => 'required|string|max:500',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,svg',
            'tags' => 'required'

        ];
    }
}
