<?php

namespace Modules\Post\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubscriberRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', Rule::unique('subscribers', 'name')->whereNull('unsubscribe_at')],
            'email' => ['required', 'email', Rule::unique('subscribers', 'email')->whereNull('unsubscribe_at')->ignore($this->email)],
        ];
    }
}
