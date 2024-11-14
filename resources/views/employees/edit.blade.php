@extends('layouts.app')

@section('title', 'Employees Edit')

@section('content')
<div class="container">
    <h2>Edit employee</h2>
    <form action="{{route('employees.update', $employee->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!-- first name -->
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" class="form-control" value="{{$employee->first_name}}" required>
    </div>
    <!-- last name -->
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" class="form-control" value="{{$employee->last_name}}" required>
    </div>
    <!-- email -->
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="{{$employee->email}}" required>
    </div>
    <!-- countrycode -->
    <div class="form-group">
        <label for="country_code">Country Code</label>
        <select name="country_code" class="form-control" required>
            <option value="+1" {{$employee->country_code == '+1' ? 'selected': ''}}>+1</option>
            <option value="+91" {{$employee->country_code == '+91' ? 'selected': ''}}>+91</option>
        </select>
    </div>
    <!-- mobile -->
    <div class="form-group">
        <label for="mobile">mobile</label>
        <input type="number" name="mobile" class="form-control" value="{{$employee->mobile}}" required>
    </div>
    <!-- address -->
    <div class="form-group">
        <label for="address">Address</label>
        <textarea  name="address" class="form-control"  required>{{$employee->address}}</textarea>
    </div>
    <!-- gender -->
    <div class="form-group">
    <label for="gender">Gender</label>
        <div class="form-check">
            <input type="radio" name="gender" class="form-check-input" value="Male" id="genderMale" {{ $employee->gender == 'Male' ? 'checked' : '' }} required>
            <label class="form-check-label" for="genderMale">Male</label>
        </div>
        <div class="form-check">
            <input type="radio" name="gender" class="form-check-input" value="Female" id="genderFemale" {{ $employee->gender == 'Female' ? 'checked' : '' }} required>
            <label class="form-check-label" for="genderFemale">Female</label>
        </div>
    </div>
    <!-- hobbies -->
    <div class="form-group">
        <label for="hobbies">Hobbies</label>
        <input type="checkbox" name="hobbies[]" value="1"   {{in_array(1,explode(',',$employee->hobbies)) ? 'checked': ''}}>Reading
        <input type="checkbox" name="hobbies[]" value="2" {{in_array(2,explode(',',$employee->hobbies)) ? 'checked': ''}}>Music
        <input type="checkbox" name="hobbies[]" value="3" {{in_array(3,explode(',',$employee->hobbies)) ? 'checked': ''}}>Sports
    </div>
    <!-- photo -->
    <div class="form-group">
        <label for="photo">Photo</label>
        <input type="file" name="photo" class="form-control-file">
        @if ($employee->photo)
            <img src="{{storage_path('app/public/'.$employee->photo)}}" alt="employee photo" style="max-width:120px ;">
        @endif
        
    </div>
    <!-- button -->
    <button type="submit" class="btn btn-primary"> Update Employee</button>
    </form>
</div>
@endsection