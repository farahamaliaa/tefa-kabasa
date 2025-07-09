<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginApiController extends Controller
{
    private StudentInterface $student;
    private EmployeeInterface $employee;

    public function __construct(StudentInterface $student, EmployeeInterface $employee)
    {
        $this->student = $student;
        $this->employee = $employee;
    }

    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $fullDomain = request()->root();
        // dd($fullDomain);

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken($request->email)->plainTextToken;
                return response()->json([
                    'message' => 'Berhasil login',
                    'token' => $token,
                    'data' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'role' => $user->roles->first()->name,
                        'password' => $user->password,
                        'image' => $user->roles->first()->name == 'student' ? ($user->student->image ? asset($fullDomain.'/storage/'.$user->student->image) : asset($fullDomain.'/public/admin_assets/dist/images/profile/user-1.jpg')) : ($user->employee->image ? asset($fullDomain.'storage/'.$user->employee->image) : asset($fullDomain.'/public/admin_assets/dist/images/profile/user-1.jpg')),
                    ],
                ]);
            } else {
                return response()->json(['message' => 'Password salah'], 401);
            }
        } else {
            return response()->json(['message' => 'Email dan Password salah'], 401);
        }
    }

    public function user_detail(User $user)
    {
        if ($user->roles->pluck('name')[0] == 'student') {
            $student = $this->student->whereUserId($user->id);
            return response()->json(['status' => 'success', 'message' => "Data Berhasil di Tambahkan", 'code' => 200, 'data' => [
                'nisn' => $student->nisn,
                'class' => $student->classroomStudents()->latest()->first()->classroom->name,
                'gender' => $student->gender->label(),
                'religion' => $student->religion->name,
                'birth_date' => Carbon::parse($student->birth_date)->format('d-m-Y'),
                'birth_place' => $student->birth_place,
                'number_kk' => $student->number_kk,
                'nik' => $student->nik,
                'order_child' => $student->order_child,
                'number_akta' => $student->number_akta,
                'count_siblings' => $student->count_siblings,
                'address' => $student->address,
            ]]);
        } else {
            $employee = $this->employee->getByUser($user->id);
            return response()->json(['status' => 'success', 'message' => "Data Berhasil di Tambahkan", 'code' => 200, 'data' => [
                'nip' => $employee->nip,
                'birth_date' => Carbon::parse($employee->birth_date)->format('d-m-Y'),
                'nik' => $employee->nik,
                'phone_number' => $employee->phone_number,
                'address' => $employee->address,
                'religion' => $employee->religion->name,
            ]]);
        }
    }
}
