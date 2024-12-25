<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{

    public function index(){
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }
    public function create(){
        return view('employee.create');
    }
    public function store(Request $request){

        $validateData = $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|email|max:50|unique:employees',
            'country_code' => 'required',
            'mobile' => 'required|numeric',
            'address' => 'required',
            'gender' => 'required|in:male,female,others',
            'hobby' => 'required|array',
            'hobby.*' => 'string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        if($request->hasFile('photo')){
            $photoPath = $request->file('photo')->store('photos', 'public');
            $validateData['photo'] = $photoPath;
        }
        if($request->has('hobby')){
            $validateData['hobby'] = implode(',',$request->input('hobby'));
        }
        Employee::create($validateData);

        return redirect()->route('employee.index')->with('success','Employee added successfully!');
        // dd($request->all());
    }

    public function edit($id){
        $employee = Employee::find($id);
        $employee->hobby = explode(',',$employee->hobby);
        // dd($employee);
        return view('employee.edit',compact('employee'));
    }
    public function update(Request $request, $id ){

        $employee = Employee::findOrFail($id);

        $validateData = $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|email|max:50|unique:employees,email,' . $employee->id,
            'country_code' => 'required',
            'mobile' => 'required|numeric',
            'address' => 'required',
            'gender' => 'required|in:male,female,others',
            'hobby' => 'required|array',
            'hobby.*' => 'string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if($request->hasFile('photo')){
            if($employee->photo && file_exists(storage_path('app/public/' . $employee->photo))){
                unlink(storage_path('app/public/'.$employee->photo));
            }


            $photoPath = $request->file('photo')->store('photos', 'public');
            $validateData['photo'] = $photoPath;
        }else{
            $validateData['photo'] = $employee->photo;
        }
        if($request->has('hobby')){
            $validateData['hobby'] = implode(',',$request->input('hobby'));
        }
        $employee->update($validateData);

        return redirect()->route('employee.index')->with('success','Employee updated successfully!');

    }

    public function destroy($id){
        $employee = Employee::findOrFail($id);

        if ($employee->photo && Storage::exists('public/'. $employee->photo)){
            Storage::delete('public/'.$employee->photo);
        }

        $employee->delete();

        return redirect()->route('employee.index')->with('success', 'Employee Deleted Successfully!' );
    }
}
