<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Helper\Helper;
use App\Models\Officer;
use App\Models\Response;
use App\Models\Community;
use App\Models\Complaint;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('authentication.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('community')->attempt($credentials)) {
            $request->session()->regenerate();
            Helper::logging('User login');
            return redirect(route('home'))->with('success-login', 'Berhasil Login');
        }

        if (Auth::guard('officer')->attempt($credentials)) {
            $request->session()->regenerate();
            Helper::logging('User login');
            return redirect(route('home'));
        }

        return back()->with('error', 'Login Failed!');
    }

    public function registerPage()
    {
        return view('authentication.register');
    }

    public function register(Request $request)
    {
        $rules = [
            'nik' => 'required|min:16|max:16|unique:communities',
            'name' => 'required',
            'username' => 'required|unique:communities',
            'password' => 'required',
            'email' => 'required|unique:communities',
            'telp' => 'required'
        ];
        $validatedData = $request->validate($rules);

        // Slug and Hash Password
        $validatedData['slug'] = Str::slug($validatedData['username'], '-');
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Save to database
        Community::create($validatedData);
        Helper::logging('New user register');
        return redirect(route('login'))->with('success', 'New User has been added!');
    }

    public function home()
    {
        if (Auth::guard('community')->check()) {
            return view('community.index');
        } elseif(Auth::guard('officer')->user()->level == 'admin') {
            $communities = Community::all();
            $officers = Officer::all();
            $complaints = Complaint::all();
            $responses = Response::all();
            $logs = Log::orderBy('created_at', 'desc')->get();
            return view('admin.index', compact('communities', 'officers', 'logs', 'complaints', 'responses'));
        } else {
            return view('officer.index');
        }
    }

    public function logout(Request $request)
    {
        if (Auth::guard('community')) {
            Auth::guard('community')->logout();
        } else {
            Auth::guard('officer')->logout();
        }

        // Flush all session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

       // Return login
        return redirect(route('login'));
    }

    public function landing()
    {
        return view('community.index');
    }
}
