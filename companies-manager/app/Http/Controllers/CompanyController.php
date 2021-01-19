<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(10);

        return view('companies.index', ['companies' => $companies]);
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(StoreCompanyRequest $request)
    {
        try {
            DB::beginTransaction();

            Company::create($request->only(['name', 'email', 'logo', 'website']));
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput();
        }

        DB::commit();
        return redirect()->route('companies.index');
    }

    public function show(Company $company)
    {
        return view('companies.show', ['company' => $company]);
    }

    public function edit(Company $company)
    {
        return view('companies.edit', ['company' => $company]);
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        try {
            DB::beginTransaction();

            $company->fill($request->only(['name', 'email', 'logo', 'website']));
            $company->save();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput();
        }

        DB::commit();
        return redirect()->route('companies.index');
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index');
    }
}
