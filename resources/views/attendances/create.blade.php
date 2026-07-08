@extends('components.layouts.app')

@section('content')

@php $prefix = auth()->user()->role . '.'; @endphp

    <div class="container">
        <h1>Record Attendance</h1>
        
        <form action="{{ route($prefix . 'attendances.store') }}" method="POST">
            @csrf

            {{-- Employee Selection --}}
            <div class="form-group">
                <label for="employee_id">Employee</label>
                <select id="employee_id" name="employee_id" required>
                    <option value="" disabled {{ old('employee_id') ? '' : 'selected' }}>Select an Employee</option>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                            {{ $employee->first_name }} {{ $employee->last_name }}
                        </option>
                    @endforeach
                </select>
                @error('employee_id') <p class="error-text">{{ $message }}</p> @enderror
            </div>

            {{-- Attendance Date --}}
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" value="{{ old('date', date('Y-m-d')) }}" required>
                @error('date') <p class="error-text">{{ $message }}</p> @enderror
            </div>

            {{-- Time Logs --}}
            <div class="form-group">
                <label for="time_in">Time In</label>
                <input type="time" id="time_in" name="time_in" value="{{ old('time_in') }}">
                @error('time_in') <p class="error-text">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label for="time_out">Time Out</label>
                <input type="time" id="time_out" name="time_out" value="{{ old('time_out') }}">
                @error('time_out') <p class="error-text">{{ $message }}</p> @enderror
            </div>

            {{-- Submission Actions --}}
            <div class="form-actions">
                <x-button type="submit">Record Attendance</x-button>
                <x-button href="{{ route($prefix . 'attendances.index') }}" type="secondary">Cancel</x-button>
            </div>
        </form>

        {{-- Global Error List (Optional if using inline errors above) --}}
        @if ($errors->any())
            <div class="alert alert-danger mt-4">
                <strong>Please fix the following errors:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection