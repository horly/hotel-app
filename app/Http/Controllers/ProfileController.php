<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeEmailAddressForm;
use App\Http\Requests\changePasswordForm;
use App\Http\Requests\UpdateProfileInfoForm;
use App\Services\Email\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    protected $request;
    protected $email;
    protected $notificationRepo;

    function __construct(Request $request, Email $email)
    {
        $this->request = $request;
        $this->email = $email;
    }

    public function profile()
    {
        return view('app.profile.profile');
    }

    public function savePhoto()
    {
        $image = $this->request->input('image-saved');
        //$type = $this->request->input('type-photo');
        $id_user = $this->request->input('id-user');

        //on hashe uplodad_profile + le md5 uniqid + l'id de l'utilisateur
        $image_hash = 'upload_profile' . md5(uniqid()) . $id_user;
        //$folderPath = base_path() . '/public_html/assets/img/profile/';
        $folderPath = public_path() . '/assets/img/profile/';

        $image_parts = explode(";base64,", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . $image_hash . '.png';
        file_put_contents($file, $image_base64);

        DB::table('users')
            ->where('id', $id_user)
            ->update([
            'photo_profile_url' => $image_hash,
            'photo_profile_base64' => $image,
            'updated_at' => new \DateTimeImmutable
        ]);

        return redirect()->back()->with('success', __('entreprise.photo_saved_successfully'));
    }

    public function changePasswordRequest($token)
    {
        $user = DB::table('users')
                ->where('two_factor_secret', $token)
                ->first();

        $this->email->changePasswordRequest($user);

        return redirect()->back()->with('success', __('profile.your_password_change_request_has_been'));
    }

    public function resetPassword($secret)
    {
        $user = Auth::user();

        if($user)
        {
            Auth::logout();
        }

        return view('app.profile.reset-password', compact('secret'));
    }

    public function changePasswordPost(changePasswordForm $requestF)
    {
        $new_password = $requestF->input('new_password');

        $token = $requestF->input('token');

        $user = DB::table('users')
                    ->where('two_factor_secret', $token)
                    ->first();

        $id = $user->id;

        DB::table('users')
            ->where('id', $id)
            ->update([
                'password' => Hash::make($new_password),
                'updated_at' => new \DateTimeImmutable
        ]);

        return redirect('/login')->with('success', __('profile.your_password_has_been_successfully_updated'));
    }

    public function changeEmailAddressRequest($token)
    {
        $user = DB::table('users')
                    ->where('two_factor_secret', $token)
                    ->first();

        $this->email->changeEmailAdressRequest($user);

        return redirect()->back()->with('success', __('profile.change_email_address_request_message'));
    }

    public function changeEmailAddress($token)
    {
        $user = Auth::user();

        if($user)
        {
            Auth::logout();
        }

        return view('app.profile.change-email-address', compact('token'));
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

    public function editProfileInfo()
    {
        return view('app.profile.edit-profile');
    }

    public function saveProfileInfo(UpdateProfileInfoForm $requestF)
    {
        $user = Auth::user();
        $name_profile = $requestF->input('name_profile');
        $phone_number_profile = $requestF->input('phone_number_profile');
        $registration_number_profile = $requestF->input('registration_number_profile');
        $address_profile = $requestF->input('address_profile');

        DB::table('users')
            ->where('id', $user->id)
            ->update([
                'name' => $name_profile,
                'phone_number' => $phone_number_profile,
                'address' => $address_profile,
                'updated_at' => new \DateTimeImmutable
            ]);

        return redirect()->route('app_profile')->with('success', __('profile.information_updated_successfully'));
    }
}
