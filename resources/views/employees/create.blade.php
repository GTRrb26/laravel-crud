@extends('layouts.app')

@section('title', 'Add new employee')

@section('content')

<div class="container">
    <h2>Add new employee</h2>
    <form action="{{route('employees.store')}}" method="post">
    @csrf
    <!-- first name -->
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" class="form-control" required>
    </div>
    <!-- last name -->
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" class="form-control" required>
    </div>
    <!-- email -->
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <!-- countrycode -->
    <div class="form-group">
        <label for="country_code">Country Code</label>
        <select name="country_code" class="form-control" required>
            <option value="+1">+1</option>
            <option value="+91">+91</option>
        </select>
    </div>
    <!-- mobile -->
    <div class="form-group">
        <label for="mobile">mobile</label>
        <input type="number" name="mobile" class="form-control" required>
    </div>
    <!-- address -->
    <div class="form-group">
        <label for="address">Address</label>
        <textarea  name="address" class="form-control" required></textarea>
    </div>
    <!-- gender -->
    <div class="form-group">
        <label for="gender">Gender</label>
        <input type="radio" name="gender" class="form-control" value="Male" required>Male
        <input type="radio" name="gender" class="form-control" value="Female" required>Female
    </div>
    <!-- hobbies -->
    <div class="form-group">
        <label for="hobbies">Hobbies</label>
        <input type="checkbox" name="hobbies[]" value="1">Reading
        <input type="checkbox" name="hobbies[]" value="2">Music
        <input type="checkbox" name="hobbies[]" value="3">Sports
    </div>
    <!-- photo -->
    <div class="form-group">
        <label for="photo">First Name</label>
        <input type="file" name="photo" class="form-control-file">
    </div>
    <!-- button -->
    <button type="submit" class="btn btn-primary"> Add Employee</button>
    </form>
</div>
@endsection