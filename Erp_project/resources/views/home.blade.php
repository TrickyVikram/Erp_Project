@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>



                    <div class="card-body">
                        <p style="text-align: center; font-size:20px">User Info</p>
                        <p>User Name: {{ Auth::user()->name }}</p>
                        <p>User username: {{ Auth::user()->email }}</p>

                        {{-- Check if the authenticated user has an associated student --}}
                        @if (Auth::user()->role == 0)
                            <p style="text-align: center; font-size:20px">Student Info</p>
                            <p>Student User_id: {{ Auth::user()->student->user_id }}</p>
                            <p>Student Name: {{ Auth::user()->student->name }}</p>
                            <p>Student Phone: {{ Auth::user()->student->phone }}</p>
                            <p>Student Email: {{ Auth::user()->student->email }}</p>
                        @elseif(Auth::user()->role == 2)
                            <p style="text-align: center; font-size:20px">Teacher Info</p>
                            <p>User_id: {{ Auth::user()->teacher->user_id }}</p>
                            <p>Emp_id: {{ Auth::user()->teacher->emp_id }}</p>
                            <p>Teacher Name: {{ Auth::user()->teacher->name }}</p>
                            <p>Teacher Phone: {{ Auth::user()->teacher->phone }}</p>
                            <p>Teacher Email: {{ Auth::user()->teacher->email }}</p>
                            <p>Teacher Department: {{ Auth::user()->teacher->dept }}</p>
                            <p>Teacher Address{{ Auth::user()->teacher->address }}</p>
                        @else
                            <p>No associated information.</p>
                        @endif
                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection
