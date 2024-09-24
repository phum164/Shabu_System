<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Models\Position;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'tell_number' => ['required', 'digits:10', 'unique:users'],
            'position_id' => ['required', 'exists:positions,id'],
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'tell_number' => $input['tell_number'],  // บันทึก Tell Number
            'position_id' => $input['position_id'],  // บันทึก Position
        ]);
    }
    public function newemp(){
            $positions = Position::all();
            return view('auth.register', ['positions' => $positions]);
    }
}
