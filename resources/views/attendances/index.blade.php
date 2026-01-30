@extends('components.layouts.app') <!--this tells Blade to use the layout file located at resources/views/layouts/app.blade.php-->

@section('title' , 'Attendance List') <!--this sets the title for the layout-->

@section('content')
    
    <h1>Attendance List</h1> <!--this content will be injected into the layout-->

    <form action="{{ route('attendances.index') }}" method="GET">
        <input type="date" name="date" value="{{ request('date') }}"> <!--request date keeps the old input value in the search box after submission-->
        <x-button type="submit">Filter by Date</x-button>
    </form>

    @if (count($attendances) > 0) <!--check if the database has any data-->

        <table border="1">
    <tr>
        <th>Employee Name</th>
        <th>Date</th>
        <th>Check In</th>
        <th>Check Out</th>
        <th>Hours Worked</th>
    </tr>

    @foreach ($attendances as $attendance)
    <tr>
        <td>{{ $attendance->employee->first_name }} {{ $attendance->employee->last_name }}</td>
        <td>{{ $attendance->date }}</td>
        <td>{{ $attendance->check_in }}</td>
        <td>{{ $attendance->check_out }}</td>
        <td>{{ number_format($attendance->hours_worked, 2) }}</td> <!--Calculate how many hours this employee worked today, format it to 2 decimal places, and display it in a table cell-->
    </tr>
    @endforeach
</table>

    @else
    <p>No attendance records found.</p>
    @endif

    @endsection

    </body>