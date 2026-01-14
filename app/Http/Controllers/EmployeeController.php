<?php

namespace App\Http\Controllers;
use App\http\Controllers\Controller;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function hello () {
        return view('employees.hello');
    }

    public function index() {
        $employees = Employee::all(); //this fecth all employees from the employees table
        return view('employees.employee_list', compact('employees')); //past the data to the view

    }
}


