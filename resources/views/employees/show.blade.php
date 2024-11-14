@extends('layouts.app')

@section('title', 'Employees Details')

@section('content')
<div class="container">
    <h2>Employee Details</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{$employee->first_name}} {{$employee->last_name}}</h5>
            <p><strong>Email:</strong> {{$employee->email}}</p>
            <p><strong>mobile:</strong> {{$employee->mobile}}</p>
            <p><strong>Address:</strong> {{$employee->address}}</p>
            <p><strong>Gender:</strong> {{$employee->gender}}</p>
            <p><strong>Hobbies:</strong> {{implode(',',$selectHobbies)}}</p>
            @if($employee->photo)
                <p><strong>Photo:</strong></p>
                <img src="{{storage_path('app/public/'.$employee->photo)}}" alt="employee photo" style="max-width:120px ;">

            @endif
        </div>
    </div>
</div>
<div class="container">
    <a href="{{route('employees.index')}}" class="btn btn-primary"> Back to list</a>
</div>
@endsection