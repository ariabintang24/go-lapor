<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoginRequest;
use App\Repositories\AuthRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    private $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function index()
    {
        return view('pages.auth.login');
    }

    public function store(StoreLoginRequest $request)
    {
        $credentials = $request->validated();

        if ($this->authRepository->login($credentials)) {

            // cek role admin
            if (Auth::user()->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            }
        }

        dd("Login sebagai user berhasil");

        // jika login gagal
        return redirect()->route('login')->withErrors([
            'email' => 'Email atau password salah'
        ]);
    }

    public function logout()
    {
        $this->authRepository->logout();
        return redirect()->route('login');
    }
}
