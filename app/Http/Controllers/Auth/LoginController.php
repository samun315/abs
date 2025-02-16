<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Throwable;

class LoginController extends Controller
{
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    public function login(LoginRequest $loginRequest): RedirectResponse
    {
        try {

            $user = User::query()->where('pin_number', $loginRequest->input('pin_number'))
                // ->where('active', ActiveStatus::YES)
                ->first(['id', 'employee_id', 'name', 'email', 'pin_number', 'role_id', 'department_id', 'phone', 'active', 'password']);

            if (!empty($user)) {

                $checkHashPassword = Hash::check($loginRequest->input('password'), $user->password);

                if ($checkHashPassword) {

                    $authenticateUserInfo = [
                        "id" => $user->id,
                        "employee_id" => $user->employee_id,
                        "name" => $user->name,
                        "email" => $user->email,
                        "pin_number" => $user->pin_number,
                        "role_id" => $user->role_id,
                        "department_id" => $user->department_id,
                        "is_department_head" => 1,
                        "phone" => $user->phone,
                        "active" => $user->active,
                    ];

                    // if (!empty($user->employee)) {
                    //     $authenticateUserInfo += [
                    //         'user_image' => $user->employee->photo,
                    //     ];
                    // }

                    // Bind the authenticated user to Laravel's authentication system
                    auth()->login($user);

                    session()->put('logged_session_data', $authenticateUserInfo);
                    return redirect(route('dashboard'));
                } else {
                    return back()->with('error', 'Wrong password');
                }
            }

            return back()->with('error', 'Please give the valid information');
        } catch (Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function logout(): RedirectResponse
    {
        Session::flush();
        return redirect(url('/'))->with('success', 'logout successful ..!');
    }
}
