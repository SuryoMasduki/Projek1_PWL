@extends('layout.app')
@section('content')
    <section id="content">
        <main class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-3">
                        <h2>Detail Course</h2>
                        {{-- Memunculkan nama course --}}
                        <p><span>Name</span>: {{ $course->name }}</p>
                        {{-- Memunculkan code course --}}
                        <p><span>Code</span>: {{ $course->code }}</p>
                        {{-- Memunculkan credit course --}}
                        <p><span>Credit</span>: {{ $course->credit }}</p>
                        {{-- Memunculkan nama departemen --}}
                        <p><span>Department</span>: {{ $department->name }}</p>
                    </div>
                </div>
            </div>
        </main>
    </section>
@endsection
