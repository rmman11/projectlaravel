<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator, Redirect;
use DB;
use File;
use Carbon\Carbon;
use App\Models\Student;

class StudentController extends Controller
{
     public function index()
    {  


         $students = Student::all();
        return view('students.index',compact('students'));
    }

 public function add_students()
    {
        return view('students.add_students');
    }


 public function fetchAll() {
   $students = Student::all();


  $output = '';
  if ($students->count() > 0) {
    $output .= '
    

    <table class="table table-bordered table-striped table-hover datatable datatable-Users">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Adress</th>
              <th>State</th>
              <th>Zip</th>
                <th>Age</th>
               <th>Data</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>';
    foreach ($students as $student) {

      


      $output .= '<tr>
              <td>' . $student->id . '</td>
           
              <td>' . $student->student_name .'</td>
              <td>' . $student->student_address . '</td>
                <td>' .$student->student_state . '</td>
              <td>' . $student->student_zip . '</td> 
              <td>' . $student->student_age . '</td>
               <td>' . $student->created_at  . '</td>
              <td>
        <a href="#" id="' . $student->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editStudentModal" title="edit"><i class="fas fa-edit fa-lg" ></i></a>
        <a href="#" id="' . $student->id . '" class="text-danger mx-1 viewIcon" data-bs-toggle="modal" data-bs-target="#viewStudentModal" title="view"><i class="fas fa-eye text-success  fa-lg"></i></a>
        <a href="#" id="' . $student->id . '" class="text-danger mx-1 deleteIcon" title="delete">    <i class="fas fa-trash fa-lg text-danger"></i></a>
              </td>
            </tr>';
    }
    $output .= '</tbody></table>';
    echo $output;
  } else {
    echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
  }



}
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'student_address' => 'required|string|max:255',
            'student_state' => 'required|string|size:2',
            'student_zip' => 'required|digits:5',
            'student_age' => 'required|integer|between:0,120',
        ]);

        Student::create($validated);

        return redirect()->back()->with('success', 'Student registered successfully!');
    }

    public function edit(Request $request) {
  $id = $request->id;
  $student = Student::find($id);
  return response()->json($student);
}


public function update(Request $request) {

  $student = Student::find($request->id);




  $Data = [
    
    'student_name' => $request->student_name, 
    'student_address' => $request->student_address,
    'student_state' => $request->student_state,
    'student_zip' => $request->student_zip, 
    'student_age' => $request->student_age,

   ];

  $student->update($Data);
  return response()->json([
    'status' => 200,
  ]);
}

 public function show($id = 0){

 $student = Student::find($id);

    $html = "";
    if(!empty($student)){
       $html = "<div class='card-body'>
      <div class='mb-2'>
          <table class='table table-bordered table-striped'>
              <tbody>
                  <tr>
                      <th>
                          Id
                      </th>
                      <td>
                          ".$student->id."
                      </td>
                  </tr>
                  <tr>
                      <th>
                      Name
                      </th>
                      <td>
                          ".$student->student_name ."
                      </td>
                  </tr>
                  <tr>
                      <th>
                         Image
                      </th>
                      <td>
                          ".$student->student_address ."
                      </td>
                  </tr>
                  <tr>
                      <th>
                         Picture
                      </th>
                      <td>
                  ".$student->student_state ."
                      </td>
</tr>

   <tr>
                      <th>
                         Picture
                      </th>
                      <td>
                  ".$student->student_age ."
                      </td>
</tr>





<tr>
            
                      <th>
                          Data
                      </th>
                      <td>
                          ".$student->created_at."
                      </td>
                  </tr>
                  <tr>
            
                  </tr>
              </tbody>
          </table>
      </div>";
    }
    $response['html'] = $html;

    return response()->json($response);
 }


  public function delete(Request $request) {
    $id = $request->id;
    $student = Student::find($id);

    $student->delete();
  }
}
