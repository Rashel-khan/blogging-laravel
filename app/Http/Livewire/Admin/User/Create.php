<?php

namespace App\Http\Livewire\Admin\User;

use App\Mail\UserInvitation;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Livewire\Component;
use Mail;
use Session;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    public $roles;
    public $form = [
        'name' => '',
        'email' => '',
        'role' => '',
        'designation' => '',
    ];
    protected $validationAttributes = [
        'form.name' => "user's full name",
        'form.email' => "user's e-mail address",
        'form.role' => "role",
        'form.designation' => 'designation',
    ];

    public function mount()
    {
        $this->roles = Role::all()->whereNotIn('name', 'Super Admin');
    }

    public function render()
    {
        return view('livewire.admin.user.create')
            ->layout('layouts.dash', ['title' => 'Create User']);
    }

    public function inviteUser()
    {
        $validated = $this->validate([
            'form.name' => 'required|string|min:2',
            'form.email' => 'required|email|unique:users,email',
            'form.role' => 'required',
            'form.designation' => 'nullable|string|min:2',
        ]);

        $roleName = Role::where('id', $validated['form']['role'])->first();

        try {
            $OTP = Create::generateOTP();

            $maildata = [
                'title' => 'Invitation from Retrieval IT',
                'body' => 'You are invited to join Retrieval IT as ' . $validated['form']['designation'] != null ? $validated['form']['designation'] : $roleName->name,
                'name' => $validated['form']['name'],
                'otp' => $OTP,
            ];
            $user = User::create([
                'name' => $validated['form']['name'],
                'email' => $validated['form']['email'],
                'designation' => $validated['form']['designation'] ?? null,
                'OTP' => $OTP,
                'password' => bcrypt($OTP),
                'OTP_expire_at' => Carbon::now()->addHour(24),
            ]);
            $user->assignRole([$validated['form']['role']]);

            Mail::to($validated['form']['email'])
                ->send(new UserInvitation($maildata));
            return redirect(route('admin.user.index'))
                ->with('success', 'Invitation Send');
        } catch (Exception $e) {
            dd($e);
            return Session::flash('errors', 'something went wrong! Try Again.');
        }

    }

    public static function generateOTP()
    {
        $random = str_shuffle('abcdefghjklmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ1234567890!#&!#&');
        return substr($random, 4, 6);
    }
}
