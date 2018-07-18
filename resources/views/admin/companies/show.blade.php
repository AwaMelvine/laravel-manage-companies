@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h2 class="text-center">{{ $company->name }}</h2>
            <table class="table table-bordered">
              <thead>
                <th>Attribute</th>
                <th>Value</th>
              </thead>
              <tbody>
                <tr>
                  <td>Name</td>
                  <td>{{ $company->name }}</td>
                </tr>
                <tr>
                  <td>Logo</td>
                  <td class="text-center">
                    <img src="{{ asset('storage/' . $company->logo) }}" alt="" width="100" height="100">
                  </td>
                </tr>
                <tr>
                  <td>Website</td>
                  <td>
                    <a href="{{ $company->website }}">
                      {{ $company->website }}
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>Email Address</td>
                  <td>{{ $company->email }}</td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
