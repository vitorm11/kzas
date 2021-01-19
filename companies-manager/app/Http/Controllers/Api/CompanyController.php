<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index() {
        $companies = Companies::all();

        return response()->json($companies);
    }

    public function index() {
        $companies = Companies::all();

        return response()->json($companies);
    }
}
