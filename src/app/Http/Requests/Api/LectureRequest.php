<?php

declare(strict_types=1);

namespace App\Http\Requests\Api;

use App\Models\Lecture;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LectureRequest extends FormRequest
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
        $lectureId = $this->route('lecture');

        if ($lectureId instanceof Lecture) {
            $lectureId = $lectureId->getKey();
        }

        return [
            'topic' => [
                'required',
                'string',
                'max:255',
                Rule::unique(Lecture::getModel()->getTable(), 'topic')->ignore($lectureId),
            ],
            'description' => ['required', 'string'],
        ];
    }
}
