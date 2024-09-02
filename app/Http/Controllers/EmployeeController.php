<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::latest()->paginate(10);
        $employees = Employee::with('company')->latest()->paginate(10); // Eager load company relationship
        return view('employees.employee', [
            'companies' => $companies,
            'employees' => $employees,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Company $company)
    {
        $companies = Company::latest()->paginate(10);
        return view('employees.add_employee', ['companies' => $companies]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'company_id' => ['required', 'exists:companies,id'],
            'email' => ['required', 'email', 'max:255', 'unique:employees,email'], 
            'phone' => ['required', 'unique:employees,phone'], 
        ]);

        // Create a new employee
        Employee::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'company_id' => $request->input('company_id'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);

        // Redirect with success message
        return redirect()->route('employee')->with('success', 'Employee added successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $companies = Company::latest()->paginate(10);
        return view('employees.update_employee', ['employee' => $employee, 'companies' => $companies]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'company_id' => ['required', 'exists:companies,id'],
            'email' => ['required', 'email', 'max:255'], 
            'phone' => ['required'], 
        ]);

        // Update the existing employee
        $employee->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'company_id' => $request->input('company_id'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);

        // Redirect with success message
        return redirect()->route('employee')->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return back()->with('delete', 'Employee deleted successfuly!');
    }
}
