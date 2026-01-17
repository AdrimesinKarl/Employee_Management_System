
@extends('components.layouts.app') <!--this tells Blade to use the layout file located at resources/views/layouts/app.blade.php-->

@section('title' , 'Employee List') <!--this sets the title for the layout-->

@section('content') <!--this content will be injected into the layout-->

<html>

    <head>
        <title>Employee List</title>
    </head>
    <body>
        <h1>Employee List</h1>

    @if (count($employees) > 0) <!--check if the database has any data-->
        <table border="1">
        <tr>
            <th>firstname</th>
            <th>lastname</th>
            <th>email</th>
            <th>hourly_rate</th>
        </tr>

    @foreach ($employees as $employee) <!--loop through all data from the database-->
        <tr>
            <td>{{ $employee->first_name }}</td>
            <td>{{ $employee->last_name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->hourly_rate }}</td>
        </tr>
    @endforeach
        </table>

    @else
    <p>No employees found.</p>
    @endif

    @endsection

    </body>
</html>