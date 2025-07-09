<?php

namespace App\Http\Controllers\Schools;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function create_feedback()
    {
        Permission::create([
            'name' => 'active_feedback',
            'guard_name' => 'feedback'
        ]);
        return response()->json(['status' => 'success', 'message' => 'Berhasil mengaktifkan tanggapan Siswa'], 200);
    }

    public function delete_feedback()
    {
        Permission::where('name', 'active_feedback')->delete();
        return response()->json(['status' => 'success', 'message' => 'Berhail menonaktifkan tanggapan siswa'], 200);
    }

    public function is_active()
    {
        $data = Permission::where('name', 'active_feedback')->first();
        return response()->json(['status' => 'success', 'data' => ['status' => $data != null ? 'active' : 'nonactive' ]], 200);
    }
}
