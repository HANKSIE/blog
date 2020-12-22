<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Blog;

class BlogEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $bid = $this->input('bid');
        $Blog = Blog::find($bid);
        return session('user')['id'] == $Blog->creator_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'max: 150'],
            'content' => ['required']
        ];
    }
}
