@extends('components.layouts.app')

@section('content')
<h1>Create Employee</h1>

<form action="{{ route('employees.store') }}" method="POST">
    @csrf

    <label for="first_name">First Name</label>
    <input type="text" id="first_name" name="first_name" required><br><br>

    <label for="last_name">Last Name</label>
    <input type="text" id="last_name" name="last_name" required><br><br>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="position">Position</label>
    <input type="text" id="position" name="position" required><br><br>

    <label for="hourly_rate">Hourly Rate</label>
    <input type="number" id="hourly_rate" name="hourly_rate" step="0.01" min="0" required><br><br>

    <input type="submit" value="Create Employee">
</form>
@endsection
