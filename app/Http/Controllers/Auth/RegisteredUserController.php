<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        if(isset($_POST['token'])){
          $captcha=$_POST['token'];
        }
          
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $data = [
                'secret' => "6LcxdrAaAAAAAM6b0DdEqtgbPr0GFuVhFZzSG7uG",
                'response' => $request->get('recaptcha'),
                'remoteip' => $remoteip
              ];
        $options = [
                'http' => [
                  'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                  'method' => 'POST',
                  'content' => http_build_query($data)
                ]
            ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $resultJson = json_decode($result);

        $userExists = User::where('email', $request->email)->get();
        if(!empty($userExists)){
            return view('auth.register', ['msg' => "Votre email est déjà dans notre base de données ;-)"]);
        }else{
            if($resultJson->score >= 0.3 && $resultJson->success == true){
                $user = User::create([
                    'email' => $request->email,
                ]);
                event(new Registered($user));
                return view('auth.register', ['msg' => "Merci de votre inscription !"]);
            }else{
                return view('auth.register', ['msg' => "Veuillez réessayer."]);
            } 
        }
    }
}
