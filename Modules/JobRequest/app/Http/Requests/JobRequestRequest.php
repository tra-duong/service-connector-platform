<?php

namespace Modules\JobRequest\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequestRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'raw_request' => 'string|nullable',
            'country' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'ward' => 'nullable|string|max:255',
            'street' => 'nullable|string|max:255',
            'home_number' => 'nullable|string|max:50',
            'lat' => 'nullable|numeric|between:-90,90',
            'long' => 'nullable|numeric|between:-180,180',
            'accuracy' => 'nullable|numeric|min:0',
            // Files for the request.
            'files' => 'nullable|array',
            'files.*' => 'file|mimes:jpg,jpeg,png,pdf',
            'schedule_time' => 'nullable|date',
            'start_time' => 'nullable|date',
            'approx_duration' => 'nullable|integer|min:1',
            'expired_time' => 'nullable|date|after:start_time',
            // Numbers of member needed.
            'quantity' => 'nullable|integer|min:1',
            // Person who get request
            'assign_to_user' => 'nullable|exists:users,id',
            // Team who get the request.
            'assign_to_team' => 'nullable|exists:teams,id',
            // Type individual or team.
            'type' => 'nullable|in:individual,team',
            'assign_time' => 'nullable|date',
            'cancel_time' => 'nullable|date|before:completed_time',
            'completed_time' => 'nullable|date|after:assign_time',
            'note' => 'nullable|string|max:1000',
            'status' => 'nullable|in:pending,assigned,cancelled,completed',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
