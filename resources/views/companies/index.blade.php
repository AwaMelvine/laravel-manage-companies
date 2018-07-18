@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div> -->

            <table class="table table-bordered">
              <thead>
                <th>N</th>
                <th>Name</th>
                <th>Email</th>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Codewithawa</td>
                  <td>info@codewithawa.com</td>
                </tr>
              </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
