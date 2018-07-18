@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h2 class="text-center">{{ $employee->firstName }} {{ $employee->lastName }}</h2>
            <table class="table table-bordered">
              <thead>
                <th>Attribute</th>
                <th>Value</th>
              </thead>
              <tbody>
                <tr>
                  <td>Full Name</td>
                  <td>{{ $employee->firstName }} {{ $employee->lastName }}</td>
                </tr>
                <tr>
                  <td>Company</td>
                  <td>{{ $employee->company()->first()->name }}</td>
                </tr>
                <tr>
                  <td>Phone</td>
                  <td>{{ $employee->phone }}</td>
                </tr>
                <tr>
                  <td>Email Address</td>
                  <td>{{ $employee->email }}</td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
