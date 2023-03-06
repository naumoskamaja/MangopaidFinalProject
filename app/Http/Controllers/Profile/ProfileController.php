<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Library\ConfigurationHelper;
use App\Models\Category;
use App\Models\Client;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function view_profile(){
        $tab = request('tab') ?? 'orders';
        $code = Str::random(6);
        $main_categories = ConfigurationHelper::get_main_categories();
        $client  = auth()->user();
        $users = User::all();
        $orders = Order::where('client_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();

        return view('profile.src.profile.my-profile', compact('main_categories', 'client','users','orders','tab'));
    }
    public function update_profile(){

        request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required','email'],
            'address' => ['required'],
            'city' => ['required'],
            'zip' => ['required'],
            'phone' => ['required'],
            'country' => ['required']
        ]);

        if(auth()->check()){
            if(auth()->user()->email != request('email')){
                request()->validate([
                    'email' => ['unique:users'],
                ]);

            }
            $user = User::where('id',auth()->user()->id)->first();
            $client = Client::where('user_id',auth()->user()->id)->first();
            if ($client==null) {
                $client = new Client();
                $client->user_id = auth()->user()->id;
            }
            $user->first_name = request('first_name');
            $user->last_name = request('last_name');
            $user->email = request('email');
            $user->country = request('country');
            $user->city = request('city');
            $user->zip = request('zip');
            $user->address = request('address');
            $user->phone = request('phone');
            $user->save();

            $client->first_name = request('first_name');
            $client->last_name = request('last_name');
            $client->email = request('email');
            $client->country = request('country');
            $client->city = request('city');
            $client->zip = request('zip');
            $client->address = request('address');
            $client->phone = request('phone');
            $client->save();

            return redirect('/profile')->with('success','Profile information updated successfully.');

        }

    }

    public function changePassword(){

        $user = User::find(auth()->user()->id);
        if(auth()->attempt(['email'=>auth()->user()->email,'password'=>request('password')],1)){
            if(request('new_password') == request('confirm_password')){
                $user->password = bcrypt(request('new_password'));
                $user->save();
                return redirect()->back()->with('success','Password changed Successfully.');
            }
            return redirect()->back()->with('error','Confirm Password & New Password are not matched.');
        }

        return redirect()->back()->with('error','Wrong Current Password.');

    }


    public function sendCodePhone()
    {
        $phone_number = request('phoneNumber');
        $client = auth()->user();
        $code = mt_rand(1000, 9999);
        $client->phone = $phone_number;
        $client->code = $code;
        $client->save();
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_TOKEN");
        $twilio_number = getenv("TWILIO_FROM");
        $clientTwilio = new Client($account_sid, $auth_token);
        $clientTwilio->messages->create($phone_number,
            ['from' => $twilio_number, 'body' => $code]);

        return redirect()->back();
    }
    public function resendCodePhone()
    {

        $client = auth()->user();
        $phone_number = $client->phone;
        $code = mt_rand(1000, 9999);
        $client->phone = $phone_number;
        $client->code = $code;
        $client->save();
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_TOKEN");
        $twilio_number = getenv("TWILIO_FROM");
        $clientTwilio = new Client($account_sid, $auth_token);
        $clientTwilio->messages->create($phone_number,
            ['from' => $twilio_number, 'body' => $code]);
        return redirect()->back();
    }

    public function checkCode()
    {
        $client = auth()->user();
        $code = request('code');

        if ($client->code == $code) {
            $client->verified = 1;
            $client->save();
            return redirect()->back()->with('successVerified', 'test');
        }else {
            return redirect()->back()->with('wrongCode','test');
        }
    }

    public function getOrders()
    {
        $client = auth()->user();
        $users = User::all();
        $orders = Order::where('client_id', $client->id)->orderBy('created_at', 'desc')->get();

        return view('profile.src.profile.tracking-orders', compact( 'client', 'users', 'orders'));

    }
}
