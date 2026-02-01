@extends ('components.layouts.app')

@section('content')
<h1>Generate Payroll</h1>

<form action="{{ route('payrolls.store') }}" method="POST">
    @csrf

    @if($employees->isEmpty())
        <p>No employees available.</p>
    @else
        <label>Employee</label>
        <select name="employee_id" required>
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}">
                    {{ $employee->name }}
            </option>
        @endforeach
    </select>

    <br><br>

    <div>
        <label>Period Start</label>
        <input type="date" name="period_start" required>
    </div>

    <div>
        <label>Period End</label>
        <input type="date" name="period_end" required>
    </div>

    <button type="submit">Generate Payroll</button>
</form>
@endif
@endsection
