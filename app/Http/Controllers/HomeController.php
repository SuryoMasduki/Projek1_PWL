<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(Request $request) {
        // Digunakan untuk mendapatkan informasi user
        $user = Auth::user();

        // Digunakan untuk mendapatkan informasi departemen
        // dengan mencari id departemen yang sesuai dengan id departemen yang dimiliki user
        // first();, digunakan untuk mendapatkan data pertama dari id yang sesuai
        $department = Department::where('id', $user->department_id)->first();

        // Digunakan untuk mendapatkan informasi course
        // dengan mencari id departemen yang sesuai dengan id departemen yang dimiliki course
        // get();, digunakan untuk mendapatkan data dari id yang sesuai
        $departmentCourses = Course::where('id', $user->department_id)->get();

        // Digunakan untuk mendapatkan course yang sudah diambil user
        $userCourses = $user->courses;

        // Menyimpan setiap variabel yang sebelumnya dibuat dan disimpan ke variabel data
        $data = [
            'user' => $user,
            'department' => $department,
            'departmentCourses' => $departmentCourses,
            'userCourses' => $userCourses
        ];

        // Mengarahkan ke view home dengan mengirim data yang tersimpan pada variabel $data
        return view('home', $data);
    }
}
