
@extends('components.layouts.app') <!--this tells Blade to use the layout file located at resources/views/layouts/app.blade.php-->

@section('title' , 'Employee List') <!--this sets the title for the layout-->

@section('content')
    
    <h1>Employee List</h1> <!--this content will be injected into the layout-->

    <form action="{{ route('employees.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search employees..." value="{{ request('search') }}"> <!--request search keeps the old input value in the search box after submission-->
        <x-button type="submit">Search</x-button>
    </form>

    @if (count($employees) > 0) <!--check if the database has any data-->

        <table border="1">
            <tr>
                <th>firstname</th>
                <th>lastname</th>
                <th>position</th>
                <th>email</th>
                <th>hourly_rate</th>
            </tr>

    @foreach ($employees as $employee) <!--loop through all data from the database-->

        <tr>
            <td>{{ $employee->first_name }}</td>
            <td>{{ $employee->last_name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->position }}</td>
            <td>{{ $employee->hourly_rate }}</td>
        </tr>

        <td>
            <x-button href="{{ route('employees.edit', $employee->id) }}">
            Edit
            </x-button>
            <form method="POST"
                action="{{ route('employees.destroy', $employee->id) }}"
                onsubmit="return confirm('Are you sure you want to delete this employee?')">
                @csrf
                @method('DELETE')
                <x-button type="submit">Delete</x-button>
            </form>
        </td>

    @endforeach
        </table>

    @else
    <p>No employees found.</p>
    @endif

    @endsection

    </body>
</html>