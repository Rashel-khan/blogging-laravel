<?php

namespace App\Http\Livewire\Guest;

use App\Models\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;
use Livewire\Component;
use Session;

class VerifyAdmin extends Component
{
    public $form, $setPassword = false;
    public $validated, $password;
    protected $validationAttributes = [
        'form.otp' => "OTP",
        'form.email' => "e-mail address",
    ];

    public function render()
    {
        SEOMeta::setTitle("Retrieving for the future");
        return view('livewire.guest.verify-admin')
            ->layout('layouts.guest');
    }

    public function verifyOTP()
    {
        $validated = $this->validate([
            'form.email' => 'required|email|exists:users,email',
            'form.otp' => 'required|string|max:6|min:6'
        ]);
        $user = User::where('email', $validated['form']['email'])
            ->where('OTP_status', 0)
            ->first();
        if (!$user || empty($user->OTP))
            return Session::flash('errors', 'OTP Already Verified');
        elseif (Carbon::now()->gt($user->OTP_expire_at)) {
            return Session::flash('errors', 'OTP Expired');
        } elseif ($validated['form']['otp'] !== $user->OTP) {
            return Session::flash('errors', 'Wrong OTP Entered');
        } else {
            return session()->flash('valid-otp', 'OTP Valid');
        }

    }

    public function confirmAccount()
    {
        $validated = $this->validate([
            'form.email' => 'required|email|exists:users,email',
            'form.otp' => 'required|string|max:6|min:6',
            'password' => 'required|min:8|max:64'
        ]);

        $user = User::where('email', $validated['form']['email'])
            ->where('OTP', $validated['form']['otp'])
            ->where('OTP_status', 0)
            ->first();
        if (!$user)
            return Session::flash('errors', 'OTP Already Verified');
        elseif (Carbon::now()->gt($user->OTP_expire_at)) {
            return Session::flash('errors', 'OTP Expired');
        } elseif ($validated['form']['otp'] !== $user->OTP) {
            return Session::flash('errors', 'Wrong OTP Entered');
        } elseif ($validated['password'] === "password") {
            return Session::flash('errors', 'Make a strong password');
        } else {

            $user->password = bcrypt($validated['password']);
            $user->email_verified_at = Carbon::now();
            $user->OTP_status = 1;
            $user->save();
            return redirect(route('login'))->with('status', 'Account Confirmed. Login now');
        }

    }
}
