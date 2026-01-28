
<h1>Edit Employee</h1>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf <!--this generates a CSRF token for security and protects against cross-site request forgery attacks-->
        @method('PUT') <!--method spoofing to indicate this is a PUT request-->

        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" value="{{ $employee->first_name }}" required><br><br>

        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" value="{{ $employee->last_name }}" required><br><br>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ $employee->email }}" required><br><br>

        <label for="position">Position</label>
        <input type="text" id="position" name="position" value="{{ $employee->position }}" required><br><br>

        <label for="hourly_rate">Hourly Rate</label>
        <input type="number" id="hourly_rate" name="hourly_rate" step="0.01" min="0" value="{{ $employee->hourly_rate }}" required><br><br>

        <x-button type="success">Submit</x-button>
        <x-button href="{{ route('employees.index') }}" type="secondary">Back</x-button>
    </form>