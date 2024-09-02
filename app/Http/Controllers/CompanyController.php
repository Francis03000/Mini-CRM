<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Auth;



class CompanyController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::latest()->paginate(10);
        return view('companies.company', ['companies' => $companies,]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validate
        $request->validate([
            'company_name' => ['required', 'max:255', 'unique:companies,company_name'],
            'email' => ['required', 'unique:companies,email'],
            'logo' => ['required', 'file', 'unique:companies,logo', 'max:3000', 'mimes:png,jpg,webp','dimensions:max_width=2000,max_height=2000'],
            'website' => ['required', 'max:255', 'unique:companies,website'],
        ]);

        $path = null;
        if ($request->hasFile('logo')){
            $path = Storage::disk('public')->put('post_images', $request->logo);
        }
        $company = Company::create([
            'company_name' => $request->company_name,
            'email' => $request->email,
            'logo' => $path,
            'website' => $request->website,
        ]); 
        Mail::to(Auth::user())->send(new WelcomeMail(Auth::user(), $company));
        return redirect()->route('company')->with('success', 'Company added successfully.');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        // Gate::authorize('modify', $post);
        return view('companies.update_company', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
           'company_name' => ['required', 'max:255'],
            'email' => ['required'],
            'logo' => ['nullable', 'file', 'max:3000', 'mimes:png,jpg,webp','dimensions:max_width=2000,max_height=2000'],
            'website' => ['required', 'max:255'],
        ]);

        $path = $company->logo ?? null;
        if ($request->hasFile('logo')){
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo);
            }
            $path = Storage::disk('public')->put('post_images', $request->logo);
        }
        $company = $company->update([
            'company_name' => $request->company_name,
            'email' => $request->email,
            'logo' => $path,
            'website' => $request->website,
        ]); 
        return redirect()->route('company')->with('success', 'Company updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        // Gate::authorize('modify', $company);

        //Delete Post image if it exist

        if ($company->image){
            Storage::disk('public')->delete($company->logo);
        }
        $company->delete();

        return back()->with('delete', 'Company deleted successfuly!');
    }
}
