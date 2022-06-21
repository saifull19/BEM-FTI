<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\DetailUser;
// untuk memakai auth
use Auth;
use App\Mail\User\AfterRegister;
use Mail;

// untuk memanggil dan memakai mail
// use Mail;
// use App\Mail\User\AfterRegister;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.user.login');
    }

    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $callback = Socialite::driver('google')->stateless()->user();
        $data = [
            'name' => $callback->getName(),
            'email' => $callback->getEmail(),
            'avatar' => $callback->getAvatar(),
            'email_verified_at' => date('Y-m-d H:i:s', time()),
        ];

        // firstOrCreate untuk jika ada email yang sama tidak perlu menambahkan data baru
        // $user = User::firstOrCreate(['email' => $data['email']], $data);

        // untuk mengecek ada data emailnya atau enggak
        $user = User::whereEmail($data['email'])->first();
        
        
        // kalau nggk ada maka .. dan ini bisa di anggap sebagi register
        if (!$user) {
            $user = User::create($data);

            // add to detail users
                $detail_user = new DetailUSer;
                $detail_user->users_id = $user->id;
                $detail_user->photo = NULL;
                $detail_user->role = 'Member';
                $detail_user->contact_number = NULL;
                $detail_user->address = NULL;
                $detail_user->biography = NULL;
                $detail_user->save();

            // setelah simpan ke database kita kirim email
            // Mail::to($user->email)->send(new AfterRegister($user));
        }

        Auth::login($user, true);

        return redirect(route('index'));
    }
}
