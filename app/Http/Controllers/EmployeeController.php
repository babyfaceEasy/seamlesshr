<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployee;

class EmployeeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('admin.employees.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('admin.employees.create')->with('companies', $companies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployee $request)
    {
        $validated = $request->validated();
        info('Creating a new employee');

        try{
            Employee::create($validated);
        }
        catch(\Exception $e){
            //dd($e->getMessage());
            logger()->error('An error occured in creating the employee due to: '. $e->getMessage());
            return redirect()->route('employee.index')->with('err', 'An error occured, please try again later.');
        }
        return redirect()->route('employee.index')->with('suc', 'Employee create operation was successful.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('admin.employees.detail')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('admin.employees.edit')->with('employee', $employee)->with('companies', $companies);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmployee $request, Employee $employee)
    {
        $validated = $request->validated();

        try{
            $employee->fill($validated)->save();
            //or $employee->update($validated);
        }
        catch(\Exception $e){
            logger()->error('An error occured when updating '.$employee->id. ' because '. $e->getMessage());
            return redirect()->route('employee.index')->with('err', 'An error occured, please try again later.');
        }
        return redirect()->route('employee.index')->with('suc', 'Employee update operation was successful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        info('Deleteing company with id :'. $employee->id);
        try{
            $employee->delete();
        }
        catch(\Exception $e){
            logger()->error($e->getMessage());
            return redirect()->route('employee.index')->with('err', 'An error occured, please try again later.');
        }
        return redirect()->route('employee.index')->with('suc', 'Employee delete operation was successful');
    }
}
