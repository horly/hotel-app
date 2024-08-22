<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeEmailAddressForm;
use App\Http\Requests\PasswordResetRequestForm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\Email\Email;
use App\Repository\ConnectionHistoryRepo;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //

    protected $request;
    protected $email;

    function __construct(Request $request, Email $email)
    {
        $this->request = $request;
        $this->email = $email;
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

    public function userChecker()
    {
        $user = Auth::user();

        //on génère de nombre aleotoire de 6 chiffres si l'utilisateur choisie de copier coller le code
        $verification_code = "";
        $longeur_code = 6;
        $verification_code_secret = md5(uniqid()) . $user->id . sha1($user->email);

        for($i = 0; $i < $longeur_code; $i++)
        {
            $verification_code .= mt_rand(0,9);
        }

        DB::table('users')
            ->where('id', $user->id)
            ->update([
                'two_factor_secret' => $verification_code_secret,
                'two_factor_recovery_codes' => $verification_code,
        ]);

        $mail = new Email;
        $mail->sendVerifactionCode($user, $verification_code, $verification_code_secret);

        Auth::logout();

        return redirect()->route('app_user_authentication', [
            'secret' => $verification_code_secret,
        ]);
    }

    public function userAuthentication($secret)
    {
        $user = User::where('two_factor_secret', $secret)->first();

        return view('app.auth.user-authentication', [
            'email' => $user->email,
            'secret' => $secret,
        ]);
    }

    public function resendAuthCodeDv($secret)
    {
       $user = User::where('two_factor_secret', $secret)->first();
       $code = $user->two_factor_recovery_codes;

       $mail = new Email;
       $mail->sendVerifactionCode($user, $code, $secret);

       return back()->with('success', __('auth.code_resend_successully'));
    }

    public function confirmAuth()
    {
        $secret = $this->request->input('secret');
        $code = $this->request->input('verification-code');

        $user = User::where('two_factor_secret', $secret)->first();

        if($code != $user->two_factor_recovery_codes)
        {
            return back()->with([
                'danger' => __('auth.verification_code_is_incorrect'),
                'verification-code-error' => 'verification-code-error',
            ]);
        }
        else
        {
            Auth::loginUsingId($user->id);

            $history = new ConnectionHistoryRepo;
            $history->createHistory($user->id);

            return redirect()->route('app_dashboard');
        }
    }

    public function changeEmailAddressPost(ChangeEmailAddressForm $requestF)
    {
        $current_email = $requestF->input('current_email');
        $new_email = $requestF->input('new_email');
        //$confirm_new_email = $requestF->input('confirm_new_email');
        $password_new_email = $requestF->input('password_new_email');
        $token = $requestF->input('token');

        $user = DB::table('users')
                    ->where('two_factor_secret', $token)
                    ->first();

        $email = $user->email;
        $password = $user->password;
        $id = $user->id;

        if($current_email == $email)
        {
            if($new_email != $current_email)
            {
                /**
                 *  vérifier qu'une chaîne de texte en clair donnée correspond à un hachage donné :
                 */
                if(Hash::check($password_new_email, $password))
                {
                    DB::table('users')
                        ->where('id', $id)
                        ->update([
                            'email' => $new_email,
                            'updated_at' => new \DateTimeImmutable
                        ]);

                        return redirect('/login')->with('success', __('auth.email_address_was_successfully_updated'));
                }
                else
                {
                    return redirect()->back()->withErrors([
                        'password_new_email' => __('auth.the_password_is_not_correct'),
                    ])->withInput();
                }
            }
            else
            {
                return redirect()->back()->withErrors([
                    'new_email' => __('auth.the_new_email_address_must_be_different_from_the_old_one'),
                ])->withInput();
            }
        }
        else
        {
            return redirect()->back()->withErrors([
                'current_email' => __('auth.your_current_email_address_is_incorrect'),
            ])->withInput();
        }
    }

    public function emailResetPasswordRequest()
    {
        return view('app.auth.email-to-reset-password-request');
    }

    public function emailResetPasswordPost(PasswordResetRequestForm $requestF)
    {
        $emailPassReq = $requestF->input('emailPassReq');

        $user = DB::table('users')
                ->where('email', $emailPassReq)
                ->first();

        if($user)
        {
            $this->email->changePasswordRequest($user);

            return redirect()->back()->with('success', __('profile.your_password_change_request_has_been'))->withInput();
        }
        else
        {
            return redirect()->back()
                ->withErrors([
                    'emailPassReq' => __('auth.this_email_address_does_not_correspond_to_any_user')
                ])
                ->withInput();
        }
    }
}
