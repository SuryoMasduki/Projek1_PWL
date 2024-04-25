<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class CourseController extends Controller
{
    public function detailCourseView(Course $course)
    {
        // Digunakan untuk mencari departemen sesuai dengan id departemen pada matkul yang dibuka
        $department = Department::find($course->department_id);

        // Menyimpan setiap variabel yang sebelumnya dibuat dan disimpan ke variabel data
        $data = [
            "course" => $course,
            "department" => $department
        ];

        // Mengarahkan ke view home dengan mengirim data yang tersimpan pada variabel $data
        return view("detailCourse", $data);
    }

    public function addCourseView()
    {
        // Digunakan untuk mendapatkan informasi user
        $user = Auth::user();

        // Digunakan untuk mendapatkan informasi course
        // dengan mencari id departemen yang sesuai dengan id departemen yang dimiliki user
        // get();, digunakan untuk mendapatkan data dari id yang sesuai
        $course = Course::where("department_id", $user->department_id)->get();

        // Menyimpan setiap variabel yang sebelumnya dibuat dan disimpan ke variabel data
        $data = [
            "course" => $course
        ];

        // Mengarahkan ke view home dengan mengirim data yang tersimpan pada variabel $data
        return view('course', $data);
    }

    public function addCourse(Course $course)
    {
        // Digunakan untuk mendapatkan informasi user
        $user = Auth::user();

        // Digunakan untuk mencari user yang sudah mengambil course yang dipilih
        $isUserJoinCourse = $course->users->find($user->id);

        // Jika user sudah mengambil course
        if ($isUserJoinCourse) {
            // diarahkan kembali ke url /home dan mengirim error dengan nama error home
            return redirect()->route('home')->withErrors(['home' => 'you already join course']);
        }

        // Jika user bukan berasal dari course departemen yang sama dengan membandingkan id departemen
        if ($course->department_id != $user->department_id) {
            // diarahkan kembali ke url /home dan mengirim error dengan nama error home
            return redirect()->route('home')->withErrors(['home' => 'you cannot join the course']);
        }

        try {
            // menambahkan data ke table many to many course_user menggunakan attach sesuai course yang diambil dan user yang sedang login dari id
            $course->users()->attach($user->id);
        } catch (Exception $e) {
            // apabila terjadi error saat menambahkan data ke table many to many course_user
            // diarahkan kembali ke url /home dan mengirim error dengan nama error home
            return redirect()->route('home')->withErrors(['home' => 'failed add course']);
        }

        // jika terjadi masalah, diarahkan kembali ke url /home
        return redirect()->route('home');
    }

    public function deleteCourse(Course $course)
    {
        // Digunakan untuk mendapatkan informasi user
        $user = Auth::user();

        try {
            // menghapus data dari table many to many course_user menggunakan detach sesuai course yang diambil dan user yang sedang login dari id
            $course->users()->detach($user->id);
        } catch (Exception $e) {
            return redirect()->route('home')->withErrors(['home' => 'failed delete course']);
        }

        return redirect()->route('home');
    }
}
