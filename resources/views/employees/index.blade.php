@extends('layouts.app')

@section('title', 'Employees List')

@section('content')

<div class="container">
<h2>Employees List</h2>
<!-- //link for create new employees -->
<a href="{{route('employees.create')}}"> Add new employee</a>
    <table class = "table table-bordered">
        <thead>

            <tr>
                <!-- id,firstname,lastname, email, action for (view delete) -->
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            {{$i = 1}}
            @foreach ($employees as $employee)
            <tr>
                <td>{{$i}}</td>
                <td>{{$employee->first_name}}</td>
                <td>{{$employee->last_name}}</td>
                <td>{{$employee->email}}</td>
                <td>
                    <a href="{{route('employees.show',$employee->id)}}"  class="btn btn-info">View</a>
                    <a href="{{route('employees.edit',$employee->id)}}" class="btn btn-warning">Edit</a>
                    <!-- for delete -->
                    <form action="{{route('employees.destroy',$employee->id)}}" method="post" style="display:inline ;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure')">Delete</button>
                    </form>

                </td>
            </tr>
            {{$i++}}
            @endforeach
        </tbody>
    </table>

</div>
@endsection