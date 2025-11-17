@extends('layout.master')
@section('title', '500 | Server Error')
@section('content')
<div class="container-fluid position-relative d-flex p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->
    
    <!-- 404 Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
            <div class="col-md-6 text-center p-4">
                <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                <h1 class="display-1 fw-bold">500</h1>
                <h1 class="mb-4">Internal Server Error</h1>
                <p class="mb-4">We’re sorry, Our site have any problem</p>
                <a class="btn btn-primary rounded-pill py-3 px-5" href="{{route('dashboard')}}">Go Back To Home</a>
            </div>
        </div>
    </div>
    <!-- 404 End -->
</div>
@endsection