<?php

namespace App\Http\Controllers;

use App\Address;
use App\Company;
use App\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(10);

        return view('employees.index', ['employees' => $employees]);
    }

    public function create()
    {
        $companies = Company::all();

        return view('employees.create', ['companies' => $companies]);
    }

    public function store(StoreEmployeeRequest $request)
    {
        try {
            DB::beginTransaction();

            $address = Address::create($request->only(['zipCode', 'address', 'number', 'complement', 'neighborhood', 'city', 'state']));
            $employee = Employee::create($request->only(['company_id', 'name', 'email', 'phone', 'cpf']));

            if($address && $employee) {
                $employee->address_id = $address->id;
                $employee->save();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput();
        }

        DB::commit();
        return redirect()->route('employees.index');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', ['employee' => $employee]);
    }

    public function edit(Employee $employee)
    {
        $companies = Company::all();

        return view('employees.edit', ['companies' => $companies, 'employee' => $employee]);
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        try {
            DB::beginTransaction();

            $employee->fill($request->only(['company_id', 'name', 'email', 'phone', 'cpf']));
            $employee->save();

            $employee->address->fill($request->only(['zipCode', 'address', 'number', 'complement', 'neighborhood', 'city', 'state']));
            $employee->address->save();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput();
        }

        DB::commit();
        return redirect()->route('employees.index');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index');
    }
}
