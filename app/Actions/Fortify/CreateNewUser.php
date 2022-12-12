<?php

namespace App\Actions\Fortify;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        $promoter = array_key_exists('promoter', $input);
        $role = Role::where("name",$promoter?"Promoter":"User")->first();

        $user = User::create([
            'firstname' => $input['firstname'],
            'lastname' => $input['lastname'],
            'username' => Str::lower(Str::random(8)),
            'phone' => $input['phone'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role_id' => $role->id,
        ]);

        // 1- Flasher une alerte disans que le compte a été créé avec succès, checker son mail pour
        // recuperer son username et verifier son mail
        // 2- Envoyer un mail à l'utilisateur avec son username
        // $request->session()->flash('status', "Account created successfully. Now check your inbox to get your unique 'username'");
        // $request->session()->flash('registration', "To active your account, verify your email address. We've emailed you a link for that");


        return $user;
    }
}
