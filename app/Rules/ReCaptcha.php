<?php
  
namespace App\Rules;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;
  
class ReCaptcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
          
    }
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $response = Http::get("https://www.google.com/recaptcha/api/siteverif",[
            'secret' => env('RECAPTCHA_SITE_SECRET'),
            'response' => $value
        ]);
        return $response;
    }
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The google recaptcha is required.';
    }
    /**
     * Run the validation rule.
     *
     * @param  \\Closure(string): \\Illuminate\\Translation\\PotentiallyTranslatedString  $fail
     */
    /*public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $gResponseToken = (string) $value;

        $response = Http::asForm()->post(
            '<https://www.google.com/recaptcha/api/siteverify>',
            ['secret' => env('RECAPTCHA_SITE_SECRET'), 'response' => $gResponseToken]
        );

        if (!json_decode($response->body(), true)['success']) {
            $fail('Invalid recaptcha');
        }
    }*/
}