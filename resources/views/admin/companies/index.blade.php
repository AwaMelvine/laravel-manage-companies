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

            @if(is_null($companies))
              <h2 class="text-center">No company records available</h2>
            @else
              <br>
              <h2 class="text-center">Manage Company Records</h2>
              <table class="table table-bordered">
                <thead>
                  <th>N</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th colspan="2" class="text-center">Action</th>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  @foreach($companies as $company)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $company->name }}</td>
                      <td>{{ $company->email }}</td>
                      <td class="text-center">
                        <a href="{{ route('companies.edit', ['id' => $company->id]) }}" class="btn btn-sm btn-success">
                          <span class="glyphicon glyphicon-pencil"></span>
                          Edit
                        </a>
                      </td>
                      <td class="text-center">
                        <a href="{{ route('companies.destroy', ['id' => $company->id]) }}" class="btn btn-sm btn-danger">
                          <span class="glyphicon glyphicon-trash"></span>
                          Delete
                        </a>
                      </td>
                    </tr>
                  @endforeach;
                </tbody>
              </table>

              {{ $companies->links() }}

            @endif


        </div>
    </div>
</div>
@endsection
