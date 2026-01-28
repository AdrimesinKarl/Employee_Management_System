@extends('components.layouts.app') <!--this tells Blade to use the layout file located at resources/views/layouts/app.blade.php-->

@section('content') <!--this content will be injected into the layout'-->

    <h1>Record Attendance</h1>
    
    <form action="{{ route('attendances.store') }}" method="POST">
    @csrf

    <label for="employee_id">Employee</label>
    <select id="employee_id" name="employee_id" required>
        @foreach ($employees as $employee)
            <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
        @endforeach
    </select><br><br>

    <label for="date">Date</label>
    <input type="date" id="date" name="date" required><br><br>

    <label for="check_in">Check In</label>
    <input type="time" id="check_in" name="check_in"><br><br>

    <label for="check_out">Check Out</label>
    <input type="time" id="check_out" name="check_out"><br><br>

    <x-button type="submit" class="btn btn-primary">
        Record Attendance
    </x-button>

    </form>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection