<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreCollaboratorRequest extends FormRequest
{
    /**
     * Los inputs a ser agregados al request (compartidos con el Update request).
     */
    public static function inputMergeArray(FormRequest $request, $patch = false): array
    {
        $mergeArray = [];

        if ($request->has('firstName')) {
            $mergeArray['first_name'] = $request->firstName;
        }

        if ($request->has('lastName')) {
            $mergeArray['last_name'] = $request->lastName;
        }

        if ($request->has('teamId')) {
            $mergeArray['team_id'] = $request->teamId;
        }

        if ($request->has('countryId')) {
            $mergeArray['country_id'] = $request->countryId;
        }

        return $mergeArray;
    }

    /**
     * Las reglas de validación (compartidas con el Update request).
     */
    public static function rulesArray($patch = false): array
    {
        return [
            'first_name'    => [$patch ? 'sometimes' : null, 'required', 'string'],
            'last_name'     => [$patch ? 'sometimes' : null, 'required', 'string'],
            'email'         => [$patch ? 'sometimes' : null, 'required', 'email'],
            'bio'           => [$patch ? 'sometimes' : null, 'string'],
            'team_id'       => [$patch ? 'sometimes' : null, 'required', 'integer', 'exists:teams,id'],
            'country_id'    => [$patch ? 'sometimes' : null, 'required', 'integer', 'exists:countries,id'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge(StoreCollaboratorRequest::inputMergeArray($this));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return StoreCollaboratorRequest::rulesArray();
    }
}
