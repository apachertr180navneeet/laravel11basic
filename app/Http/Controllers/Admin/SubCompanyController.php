<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    User,
    SubCompany
};
use App\Http\Requests\StoreSubCompanyRequest;
use App\Http\Requests\UpdateSubCompanyRequest;

class SubCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCompanys = SubCompany::select(['id', 'name', 'status'])->orderBy('id', 'desc')->get();
        return view('admin.sub_company.index',compact('subCompanys'));
    }


    public function getAll()
    {
        $subCompanies = SubCompany::select('id', 'name', 'status')->get();

        return response()->json(['data' => $subCompanies]);
    }
}
