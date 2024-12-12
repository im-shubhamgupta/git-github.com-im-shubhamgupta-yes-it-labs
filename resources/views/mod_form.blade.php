
@extends('layout')
@section('container')

    <div class="container" style="margin:auto;">
        <div class="card" style="margin-top:0px;">
            <div class="d-flex card-header">
                <h2 class="txt-center">User Form</h2>
                <a href="{{ url('/') }}" class="btn btn-primary ml-auto" >All Users</a>
            </div>
            <hr>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="card-body">
                <form action="{{ url('/moduser') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- <pre> --}}
                    <?php
                    // print_r($errors->all());
                    // print_r($user->all());
                    // $user = array();
                    ?>
                    {{-- </pre> --}}
                    <div class="row form-row form-group">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Enter name" value="{{ isset($user->name) ? $user->name : old('name') }}">
                                <input type="hidden" name="id" value="{{ isset($user->id) ? $user->id : old('id') }}">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer02">Email</label>
                            <input type="email" name="email" class="form-control " name="name"
                                id="validationServer02" placeholder="Email"
                                value="{{ isset($user->email) ? $user->email : old('email') }}">
                            <span class="text-danger">
                                {{-- @error('email')
                                    {{ $message }}
                                @enderror --}}
                            </span>
                        </div>
                    </div>
                    <div class="row form-row form-group">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Mobile</label>
                            <input type="number" class="form-control" name="mobile" id="mobile"
                                placeholder="Enter Mobile"
                                value="{{ isset($user->mobile) ? $user->mobile : old('mobile') }}">
                            <span class="text-danger">
                                {{-- @error('city')
                                    {{ $message }}
                                @enderror --}}
                            </span>

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer02">profile pic</label>
                            <input type="file" name="image" class="form-control" id="image" placeholder="state"
                                value="{{ isset($user->image) ? $user->image : old('image') }}">
                            <span class="text-danger">
                                @error('state')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Password</label>
                            <input type="password" required class="form-control" name="password" id="validationServer01"
                                value="{{ isset($user->password) ? $user->password : old('password') }}">
                            <span class="text-danger">
                                @error('dob')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Confirm Password</label>
                            <input type="password" required class="form-control" name="cpassword" id="cpassword"
                                value="{{ isset($user->cpassword) ? $user->cpassword : old('cpassword') }}">
                            <span class="text-danger">
                                {{-- @error('dob')
                                    {{ $message }}
                                @enderror --}}
                            </span>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </form>
            </div>
        </div>
    </div>
@endsection
