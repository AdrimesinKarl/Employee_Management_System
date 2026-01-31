@extends ('components.layouts.app')

@section('content')
<h1>Generate Payroll</h1>
@csrf

<form action="{{ route('payrolls.store') }}" method="POST">
    @csrf

    <input type="hidden" name="employee_id" value="{{ $employee->id }}">

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
@endsection
