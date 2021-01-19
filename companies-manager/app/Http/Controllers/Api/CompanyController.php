<?php

namespace App\Http\Controllers\Api;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index() {
        $companies = Company::all();

        return response()->json($companies);
    }

    public function show(Company $company) {
        return response()->json(new CompanyResource($company));
    }
}
