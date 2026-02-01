@extends('components.layouts.app')

@section('content')
<h1>Payroll List</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
    <tr>
        <th>Employee</th>
        <th>Period</th>
        <th>Total Hours</th>
        <th>Net Pay</th>
    </tr>

    @foreach($payrolls as $payroll)
        <tr>
            <td>{{ $payroll->employee->name }}</td>
            <td>{{ $payroll->period_start }} - {{ $payroll->period_end }}</td>
            <td>{{ $payroll->total_hours }}</td>
            <td>{{ number_format($payroll->net_pay, 2) }}</td>
        </tr>
    @endforeach
</table>
@endsection
