<!DOCTYPE html>
<html>
    <head>
        <title>Employee List</title>
    </head>
    <body>
        <table border="1">
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <ht>Email</ht>
            <ht>hourly_rate</ht>
        </tr>
        @foreach($employees as $employee)
        <tr>
            <td>{{ $employee->Firstname }}</td>
            <td>{{ $employee->Lastname}}</td>
            <td>{{ $employee->Email}}</td>
            <td>{{ $employee->hourly_rate }}</td>
        </tr>
        @endforeach
    </table>
    </body>
</html>