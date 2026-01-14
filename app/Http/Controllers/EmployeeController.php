<?php

namespace App\Http\Controllers;
use App\Models\Employee;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function hello () {
        return view('employees.hello');
    }

    public function index() {
        $employees = Employee::all(); //this fecth all employees from the employees table
        return view('employees.employee-list', compact('employees')); //past the data to the view

    }
}


