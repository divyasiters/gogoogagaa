@extends('admin.layouts.app')

@section('content')
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Gogoogagaa Admin Login</div>
        <div class="card-body">
            <form action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"  type="email"  placeholder="Enter email" name="email" required>
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" placeholder="Password" name="password" required>
                    @if ($errors->has('password'))
                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember"> Remember Password</label>
                    </div>
                </div>
                <button class="btn btn-primary btn-block" type="submit">Login</button>
            </form>
            <div class="text-center">
                <a class="d-block small" href="#">Forgot Password?</a>
            </div>
        </div>
    </div>
@endsection