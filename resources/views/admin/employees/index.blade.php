@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">

          <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{ route('home') }}" class="btn btn-lg btn-info custom-group-btn" style="margin-right: 10px;">Dashboard</a>
            <a href="{{ route('companies.create') }}" class="btn btn-lg btn-primary custom-group-btn" style="margin-right: 10px;">Create New Company</a>
          </div>
          <hr>

          @include('layouts.messages')

          @if(is_null($employees))
            <h2 class="text-center">No Employee records available</h2>
          @else
            <h1 class="text-center">Manage Employees</h1>
            <table class="table table-bordered">
              <thead>
                <th>N</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Company</th>
                <th colspan="2" class="text-center">Action</th>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                @foreach($employees as $employee)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $employee->firstName }}</td>
                    <td>{{ $employee->lastName }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->company }}</td>
                    <td class="text-center">
                      <a href="{{ route('employees.edit', ['id' => $employee->id]) }}" class="btn btn-sm btn-success">
                        <span class="glyphicon glyphicon-pencil"></span>
                        Edit
                      </a>
                    </td>
                    <td class="text-center">
                      <a href="{{ route('employees.destroy', ['id' => $employee->id]) }}" class="btn btn-sm btn-danger">
                        <span class="glyphicon glyphicon-trash"></span>
                        Delete
                      </a>
                    </td>
                  </tr>
                @endforeach;
              </tbody>
            </table>

            {{ $employees->links() }}

          @endif


      </div>
    </div>
</div>
@endsection
