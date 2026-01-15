<!DOCTYPE html>
<html>
    <head>
        <title>Employee List</title>
    </head>
    <body>
        <h1>Employee List</h1>
        <table border="1">
        <tr>
            <th>firstname</th>
            <th>lastname</th>
            <th>email</th>
            <th>hourly_rate</th>
        </tr>
        @foreach($employees as $employee)
        <tr>
            <td>{{ $employee->first_name }}</td>
            <td>{{ $employee->last_name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->hourly_rate }}</td>
        </tr>
        @endforeach
        @extends('layouts.app')
    </table>
    </body>
</html>