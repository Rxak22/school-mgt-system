@extends('layout.master')
@section('title', 'Class - Room')
@section('content')
    <div class="container-fluid position-relative p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('component.sidebar')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('component.nav')

            @include('error.message')
            {{-- modal --}}
            @include('component.course.modal-delete')
            @include('component.course.add-modal')
            @include('component.course.modal-update')

            <div class="d-flex pt-3 px-1">
                <!-- table -->
                @include('component.course.table-course')
        </div>

            {{-- footer --}}
            @include('component.footer')
        </div>
        <!-- Content End -->

        
    </div>
@endsection