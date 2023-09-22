<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $this->data["showstudent"]=Student::orderBy("id","asc")->simplepaginate("5");
        if(Session()->has("message")){
            $this->data["message"]=Session()->get("message");
        }
        return view("showstudent.show",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data["editdata"]=new student();
        return view("student.studentform",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alldata=$request->only("name","email","password");
       Student::create($alldata);
       Session()->flash("message","student insert successfully");
       return redirect()->to("/students");


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $this->data["singledata"]=$student;
       return view("single.student",$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {

        $this->data["editdata"]=$student;
        return view("student.studentform",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
      $data=$request->all();
      $student->name=$data["name"];
      $student->email=$data["email"];
      $student->password=$data["password"];
      $student->save();
      Session()->flash("message","student update successfully");
      return redirect()->to("/students");




    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        Session()->flash("message","student delete successfully");
        return redirect()->to("/students");
    }
}
