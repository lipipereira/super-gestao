<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        return view('app.supplier.index');
    }

    public function show()
    {
        return view('app.supplier.show');
    }

    public function store()
    {
        return view('app.supplier.store');
    }
}
