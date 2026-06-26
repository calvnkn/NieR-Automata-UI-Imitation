<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    // Determine if the user is authorized to make this request.
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
        return [
            'unit_id'    => ['required', 'string', 'max:50'],
            'access_key' => ['required', 'string', 'min:6'],
        ];
    }

    /**
     * Ensure the login request is not rate limited.
     * Blocks after 5 failed attempts.
     *
     * @throws ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'unit_id' => "Too many access attempts. Try again in {$seconds} seconds.",
        ]);
    }

    // Rate limit key, unit ID + IP address.
    public function throttleKey(): string
    {
        return Str::lower($this->string('unit_id')) . '|' . $this->ip();
    }

    // Hit the rate limiter on failed attempt.
    public function hitRateLimiter(): void
    {
        RateLimiter::hit($this->throttleKey());
    }

    // Clear the rate limiter on successful login.
    public function clearRateLimiter(): void
    {
        RateLimiter::clear($this->throttleKey());
    }
}