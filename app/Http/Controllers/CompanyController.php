<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\StoreCompany;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('admin.company.index')->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompany $request)
    {
        $photo_path = $request->file('photo')->store('public');
        $validated = $request->validated();

        $company = new Company();
        $company->name = $validated['name'];
        $company->email = $validated['email'];
        $company->logo = $photo_path;
        $company->website = $validated['website'];
        $company->save();

        return redirect()->route('company.index')->with('suc', 'Company creation action was successful.');
        //dd($photo_path);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $company->logo = preg_replace('/^public/', '', $company->logo);
        return view('admin.company.detail')->with('company', $company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('admin.company.edit')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCompany $request, Company $company)
    {
        $logo = '';
        if ($request->hasFile('photo')){
            //upload new data
            $logo = $request->file('photo')->store('public');
        }

        $validated = $request->validated();

        $company->name = $validated['name'];
        $company->email = $validated['email'];
        if ($logo != ''){
            $company->logo = $logo;
        }
        $company->website = $validated['website'];
        $company->save();

        return redirect()->route('company.show', ['company' => $company->id])->with('suc', 'Update was successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        info('Deleteing company with id :'. $company->id);
        try{
            $company->delete();
        }
        catch(\Exception $e){
            logger()->error($e->getMessage());
            return redirect()->route('company.index')->with('err', 'An error occured, please try again later.');
        }
        return redirect()->route('company.index')->with('suc', 'Company delete operation was successful');
    }
}
