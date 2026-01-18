<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee; //tells php where the class is

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $employees = Employee::all(); //this fecth all employees from the employees table
        return view('employees.employee_list', compact('employees')); //past the data to the view

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create'); //return the create employee form view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'position' => 'required|string|max:255',
            'hourly_rate' => 'required|numeric|min:0',
        ]);

    // this stores the validated data into the database with basic sanitization
    $validated['first_name'] = htmlspecialchars($validated['first_name']);
    $validated['last_name'] = htmlspecialchars($validated['last_name']);
    $validated['email'] = htmlspecialchars($validated['email']);
    $validated['position'] = htmlspecialchars($validated['position']);
    $validated['hourly_rate'] = htmlspecialchars($validated['hourly_rate']);

    // Create a new employee record
    Employee::create($validated);

    //redirect to the employee list with a success message
    return redirect()->route('employees.employee_list')->with('success', 'Employee created!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
