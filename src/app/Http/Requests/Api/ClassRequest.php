<?php

declare(strict_types=1);

namespace App\Http\Requests\Api;

use App\Models\StudentClass;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClassRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $classId = $this->route('class');

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique(StudentClass::getModel()->getTable(), 'name')->ignore($classId),
            ],
        ];
    }
}
