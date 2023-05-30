<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'max:150', Rule::unique('projects')->ignore($this->project)],
            'content' => 'nullable|string',
            'link_project' => 'nullable|url',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'exists:technologies,id',
            'image' => 'nullable|image|max:1024',
        ];
    }

    public function messages() {
        return [
            'title.required' => "Il campo Titolo è richiesto",
            'title.max' => "Il titolo deve avere massimo 150 caratteri",
            'title.unique' => "Il titolo è già stato inserito",
            'content.string' => "Il campo descrizione deve essere di tipo stringa",
            'image.max' => "L'url dell'immagine deve avere massimo 255 caratteri",
            'image.url' => "L'url dell'immagine deve essere valida, esempio: http://www.miosito.com",
            'link_project.url' => "Il link del progetto deve essere valido",
        ];
    }
}
