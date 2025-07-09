<?php

namespace App\Services\Auth;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use SebastianBergmann\Type\VoidType;

class   LoginService
{
    /**
     * Handle a login request to the application.
     *
     * @param LoginRequest $request
     * @return void
     *
     * @throws ValidationException
     */

    public function handleLogin(LoginRequest $request)
    {
        $data = $request->validated();

        if (auth()->attempt(['email' => $data['email'], 'password' => $data['password']])) {
        auth()->user();

        $role = auth()->user()->roles->pluck('name')[0];
            switch ($role) {
                case "student":
                    return to_route('student.dashboard');
                    break;
                case "teacher":
                    return to_route('teacher.dashboard');
                    break;
                case "school":
                    return to_route('school.index');
                    break;
                case "staff":
                    return to_route('employee.dashboard');
                    break;
                default:
                    return redirect()->back()->withErrors("Ada Yang Salah");
                    break;
            }
        } else {
            $apiResponse = Http::post(config('api.api_login'), [
                'email' => $data['email'],
                'password' => $data['password'],
            ]);

            if ($apiResponse->successful()) {
                $responseData = $apiResponse->json();
                if ($responseData['status'] == true && isset($responseData['data']['token'])) {
                    session(['api_token' => $responseData['data']['token']]);
                    $userApi = $responseData['data']['user'];

                    $user = User::create([
                        'id' => $userApi['id'],
                        'name' => $userApi['name'],
                        'slug' => Str::slug($userApi['name']),
                        'email' => $userApi['email'],
                        'password' => $responseData['data']['password'],
                    ]);

                    $user->assignRole('school');
                    Auth::login($user);
                    
                    return to_route('school.index');
                } else {
                    return redirect()->back()->withErrors(['login' => 'login api gagal'])->withInput();
                }
            } else {
                return redirect()->back()->withErrors(['password' => 'password salah'])->withInput();
            }

        }
    }
}
