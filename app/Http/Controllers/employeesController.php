<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;

class employeesController extends Controller
{
    public function index(){
        // dd("dddd");
        //for index view
        $employees = Employees::all();
        return view('employees.index', compact('employees'));
    }
    public function create(){
        // dd("dddd");
        //for index view
        return view('employees.create');
    }
    public function edit(Employees $employee){
        //for edit view
        return view('employees.edit', compact( 'employee'));

    }
    public function update(Request $request, Employees $employee){
        //for edit view
        $validate = $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email|unique:employees,email,'.$employee->id,
            'mobile'=>'required',
            'country_code'=>'required',
            'address'=>'required',
            'gender'=>'required',
            'hobbies'=>'array',
            'photo'=>'image|nullable',
        ]);
        $validate['hobbies'] = !empty($validate['hobbies'])? implode(',',$validate['hobbies']):null;
        //if photo
        if($request->hasFile('photo')){
            $validate['photo'] = $request->file('photo')->store('photos','public');
        }
        $employee->update($validate);

        return redirect()->route('employees.index');

    }
    public function store(Request $request){
        // dd($request->all());
        //for creating new users employees
        $validate = $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email|unique:employees',
            'mobile'=>'required',
            'country_code'=>'required',
            'address'=>'required',
            'gender'=>'required',
            'hobbies'=>'required|array',
            'photo'=>'image|nullable',
        ]);
        //if hobbies is null
        $validate['hobbies'] = !empty($validate['hobbies'])? implode(',',$validate['hobbies']):null;
        //if photo
        if($request->hasFile('photo')){
            $validate['photo'] = $request->file('photo')->store('photos','public');
        }
        //create record
        Employees::create($validate);
        return redirect()->route('employees.index');
    }
    public function show(Employees $employee){
        // dd("dddd");
        //for show existing view
        $hobbyId = explode(',',$employee->hobbies);
        $selectHobbies = array_map(fn($id) => $this->getHobbyName($id),$hobbyId);
        return view('employees.show', compact( 'employee','selectHobbies'));


    }
    public function destroy(Employees $employee){
        //for employee id delete
        $employee->delete();
        return redirect()->route('employees.index');
    }

    //for converting hobbies array into string
    public function getHobbyName($id){
        // dd("Dd");
        return match ($id){
            "1"=> "Reading",
            "2"=> "Music",
            "3"=> "Sports",
            default => "Unknown"
        };
    }
}
