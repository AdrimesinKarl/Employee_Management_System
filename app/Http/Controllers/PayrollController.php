<?php
    namespace App\Http\Controllers;
    use App\Models\Payroll;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Employee;
    use App\Models\Attendance;

    class PayrollController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            return view('payrolls.index', [
                'payrolls' => Payroll::with('employee')->get()
            ]);
        }
        /**
         * Show the form for creating a new resource.
         */
        public function create(Employee $employee)
        {
        return view('payrolls.create', compact('employee'));
        }
        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
        $employeeId = $request->employee_id;
        $start = $request->period_start;
        $end = $request->period_end;

        $employee = Employee::findOrFail($employeeId);

        $totalHours = Attendance::where('employee_id', $employeeId)
            ->whereBetween('date', [$start, $end])
            ->sum('hours_worked');

        $grossPay = $totalHours * $employee->hourly_rate;
        $deductions = 0;
        $netPay = $grossPay - $deductions;

        Payroll::create([
            'employee_id' => $employeeId,
            'period_start' => $start,
            'period_end' => $end,
            'total_hours' => $totalHours,
            'gross_pay' => $grossPay,
            'deductions' => $deductions,
            'net_pay' => $netPay,
            'generated_at' => now(),
        ]);

        return redirect()->route('payrolls.index')
            ->with('success', 'Payroll generated successfully');
    }

        /**
         * Display the specified resource.
         */
        public function show(Payroll $payroll)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(Payroll $payroll)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, Payroll $payroll)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Payroll $payroll)
        {
            //
        }
    }
