@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="container">
              <div class="jumbotron text-center">
                <h2 class="text-center">Manage Companies and Employees</h2>
                <p class="text-center lead">You are logged in. You can now manage companies and employees on the system</p>
                <br>
                <a href="{{ route('companies.index') }}" class="btn btn-lg btn-primary">Companies</a>
                <a href="{{ route('employees.index') }}" class="btn btn-lg btn-info">Employees</a>
              </div>
            </div>
    </div>
</div>
@endsection
