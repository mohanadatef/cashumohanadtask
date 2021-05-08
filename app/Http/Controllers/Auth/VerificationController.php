<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function index()
    {
        return view(checkView('auth.verify'));
    }

    public function verifyDone(Request $request)
    {
        $user=User::where('email',$request->email)->first();
        if($user)
        {
            if($request->code == $user->code)
            {
                $user->email_verified_at=Carbon::now();
                $user->save();
                return redirect(route('admin.dashboard'));
            }
            return redirect()->back()->with('message_fales','code wrong');
        }
        return redirect()->back()->with('message_fales','email wrong');
    }
}
