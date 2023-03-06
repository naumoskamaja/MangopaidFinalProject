<?php

namespace App\Actions\Fortify;

use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'zip' => ['required', 'string', 'max:100'],
            'city' => ['required', 'string', 'max:100'],
            'country' => ['required', 'string', 'max:100'],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'city' => $input['city'],
            'zip' => $input['zip'],
            'phone' => $input['phone'],
            'address' => $input['address'],
            'country' => $input['country'],
            'role' => 'client',
            'password' => Hash::make($input['password']),
        ]);
        $user->save();

        $client = new Client();
        $client->user_id = $user->id;
        $client->first_name = $input['first_name'];
        $client->last_name = $input['last_name'];
        $client->email = $input['email'];
        $client->phone = $input['phone'];
        $client->city = $input['city'];
        $client->zip = $input['zip'];
        $client->address = $input['address'];
        $client->country = $input['country'];
        $client->save();

        return $user;
    }

    public function logout(){
        auth()->logout();
        session()->put('cart', []);
        session()->put('wishlist', []);
        return redirect('/');
    }
}
