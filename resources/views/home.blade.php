@extends('layout.app')
@section('content')
    <section id="content">
        <main class="container">
            <div class="row">
                {{-- dijalankan apabila terdapat error dengan nama error home --}}
                @if ($errors->get('home'))
                    <div class="col-md-12">
                        <div class="alert alert-warning alert-dismissible mt-3" role="alert">
                            {{-- memunculkan semua error pada error dengan nama error home --}}
                            @foreach ($errors->get('home') as $error)
                                {{ $error }}
                            @endforeach
                            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
                <div class="col-md-8">
                    <div class="card mt-3">
                        <h2>Detail User</h2>
                        {{-- Memunculkan nama user --}}
                        <p><span>Name</span>: {{ $user->name }}</p>
                        {{-- Memunculkan email user --}}
                        <p><span>Email</span>: {{ $user->email }}</p>
                        {{-- Memunculkan nim user --}}
                        <p><span>NIM</span>: {{ $user->nim }}</p>
                        {{-- Memunculkan nama departemen --}}
                        <p><span>Department</span>: {{ $department->name }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mt-3">
                        <h2>Add Course</h2>
                        {{-- apabila user menekan tombol add course --}}
                        {{-- diarahkan ke route dengan nama addCourseView dan url /course --}}
                        <a  href="{{ route('addCourseView') }}" class="btn button-card">
                            AddCourse
                        </a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card mt-3 mb-3">
                        <h2>List Courses</h2>
                        <table>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                            {{-- memunculkan semua matkul yang diambil user menggunakan for berdasar jumlah matkul yang diambil --}}
                            @for ($i = 0; $i < count($userCourses); $i++)
                                {{-- saat row ditekan mengarah ke nama route detailCourseView dan mengirim data request dengan nama course yang berisi id course --}}
                                <tr onclick="location.href ='{{ route('detailCourseView', ['course' => $userCourses[$i]->id]) }}';">
                                    {{-- menampilkan nomor --}}
                                    <td>{{ $i + 1 }}</td>
                                    {{-- menampilkan nama matkul --}}
                                    <td>{{ $userCourses[$i]->name }}</td>
                                    {{-- menampilkan nama departemen --}}
                                    <td>{{ $department->name }}</td>
                                    <td>
                                        {{-- digunakan untuk menghapus matkul pada jadwal menggunakan form dengan method delete --}}
                                        {{-- dengan action yang mengarah ke nama route deleteCourse dan mengirim data request dengan nama course yang berisi id course --}}
                                        <form action="{{ route('deleteCourse', ['course' => $userCourses[$i]->id])}}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button>Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endfor
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </section>
@endsection
