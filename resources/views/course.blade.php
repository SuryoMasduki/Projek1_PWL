@extends('layout.app')
@section('content')
    <section id="content">
        <main class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-3 mb-3">
                        <h2>List Courses</h2>
                        <table>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>

                            {{-- memunculkan semua matkul for berdasar jumlah matkul yang diambil --}}
                            @for ($i = 0; $i < count($course); $i++)
                            {{-- saat row ditekan mengarah ke nama route detailCourseView dan mengirim data request dengan nama course yang berisi id course --}}
                            <tr onclick="location.href ='{{ route('detailCourseView', ['course' => $course[$i]->id]) }}';">
                                {{-- menampilkan nomor --}}
                                <td>{{ $i + 1 }}</td>
                                {{-- menampilkan nama matkul --}}
                                <td>{{ $course[$i]->name }}</td>
                                <td>
                                    {{-- digunakan untuk menambah matkul pada jadwal menggunakan form dengan method post --}}
                                    {{-- dengan action yang mengarah ke nama route addCourse dan mengirim data request dengan nama course yang berisi id course --}}
                                    <form action="{{ route('addCourse', ['course' => $course[$i]->id]) }}" method="POST">
                                        @csrf
                                        <button class="mt-2">Tambah</button>
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
