@extends('layouts.app')

@section('title', 'Student List')

@section('content')




<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="row">
            <div class="col-lg">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('students.store') }}"id="" method="POST" enctype="multipart/form-data">
        @csrf

      <div class="my-2">
            <label for="student_name" class="form-label">Name</label>
            <input type="text" name="student_name" class="form-control" value="{{ old('student_name') }}">
        </div>
  <div class="my-2">
            <label for="student_address" class="form-label">Address</label>
            <input type="text" name="student_address" class="form-control" value="{{ old('student_address') }}">
        </div>

  <div class="my-2">
            <label for="student_state" class="form-label">State (2 letters)</label>
            <input type="text" name="student_state" class="form-control" maxlength="2" value="{{ old('student_state') }}">
        </div>
  <div class="my-2">
            <label for="student_zip" class="form-label">ZIP Code</label>
            <input type="text" name="student_zip" class="form-control" maxlength="5" value="{{ old('student_zip') }}">
        </div>

  <div class="my-2">
            <label for="student_age" class="form-label">Age</label>
            <input type="number" name="student_age" class="form-control" value="{{ old('student_age') }}">
        </div>
</div>
</div>
 
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="add_student_btn" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- add new  modal end --}}


{{-- edit modal start --}}
<div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

<div class="row">
            <div class="col-lg">

      <form action="#" method="POST" id="edit_student_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id">
              <div class="my-2">
            <label for="student_name" class="form-label">Name</label>
            <input type="text" name="student_name" id="student_name" class="form-control" value="{{ old('student_name') }}">
        </div>
  <div class="my-2">
            <label for="student_address" class="form-label">Address</label>
            <input type="text" name="student_address" id="student_address" class="form-control" value="{{ old('student_address') }}">
        </div>

  <div class="my-2">
            <label for="student_state" class="form-label">State (2 letters)</label>
            <input type="text" name="student_state" id="student_state" class="form-control" maxlength="2" value="{{ old('student_state') }}">
        </div>
  <div class="my-2">
            <label for="student_zip" class="form-label">ZIP Code</label>
            <input type="text" name="student_zip" id="student_zip" class="form-control" maxlength="5" value="{{ old('student_zip') }}">
        </div>

  <div class="my-2">
            <label for="student_age" class="form-label">Age</label>
            <input type="number" name="student_age" id="student_age" class="form-control" value="{{ old('student_age') }}">
        </div>
</div>
</div>
  </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="edit_student_btn" class="btn btn-success">Update</button>
        </div>
    
    </div>
  </div>
</div>
{{-- edit  modal end --}}






{{-- view  modal start --}}
<div class="modal fade" id="viewStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
                   <table class="w-100" id="tblempinfo">
                      <tbody></tbody>
                   </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        </div>
 
    </div>
  </div>
</div>
{{-- view modal end --}}



 <div class="container-fluid">
    <div class="row g-0">
      <div class="col-3 bg-success">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
      </div>
      <div class="col-9 bg-warning">
      <div class="card shadow">
          <div class="card-header ">
            <h3 class="text-light">Manage Students</h3>
            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addStudentModal"><i
                class="bi-plus-circle me-2"></i>Add New</button>
          </div>
          <div id="show_all_students" style="float:left" >
            <h1 class="text-center text-secondary my-10">Loading...</h1>
          </div>
        </div>
      </div>
      </div>
    </div>






<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>

  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



  <script>
    $(function() {

      // add new employee ajax request
      $("#add_student_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_student_btn").text('Adding...');
        $.ajax({
          url: '{{ route('students.store') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Added!',
                'Added Successfully!',
                'success'
              )
           fetchAllStudents();
            }
            $("#add_student_btn").text('Add Reviews');
            $("#add_student_form")[0].reset();
            $("#addStudentModal").modal('hide');
          }
        });
      });




      $(document).on('click', '.viewIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
       
        if(id > 0){

      // AJAX request
      var url = "{{ route('students.show',['id']) }}";
      url = url.replace('id',id);

        // Empty modal data
        $('#tblempinfo tbody').empty();
        $.ajax({
                 url: url,
                 dataType: 'json',
                 success: function(response){

                     // Add employee details
                     $('#tblempinfo tbody').html(response.html);

                     // Display Modal
                     $('#empModal').modal('show'); 
                 }
             });

          }
      });





      // edit employee ajax request
      $(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
          url: '{{ route('students.edit') }}',
          method: 'get',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            $("#student_name").val(response.student_name);
            $("#student_address").val(response.student_address);
            $("#student_state").val(response.student_state);
            $("#student_zip").val(response.student_zip);
            $("#student_age").val(response.student_age);
            $("#id").val(response.id);
            
            
          }
        });
      });

      // update employee ajax request
      $("#edit_student_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#edit_student_btn").text('Updating...');
        $.ajax({
          url: '{{ route('students.update') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Updated!',
                'Updated Successfully!',
                'success'
              )
            fetchAllStudents();
            }
            $("#edit_student_btn").text('Update');
            $("#edit_student_form")[0].reset();
            $("#editStudentModal").modal('hide');
          }
        });
      });

      // delete employee ajax request
      $(document).on('click', '.deleteIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let csrf = '{{ csrf_token() }}';
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '{{ route('students.delete') }}',
              method: 'delete',
              data: {
                id: id,
                _token: csrf
              },
              success: function(response) {
                console.log(response);
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
                fetchAllStudents();
              }
            });
          }
        })
      });

      // fetch all employees ajax request
      fetchAllStudents();

      function fetchAllStudents() {
        $.ajax({
          url: '{{ route('students.fetchAll') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_students").html(response);
            $(".datatable").DataTable({
              order: [0, 'desc']
            });
          }
        });
      }
    });
  </script>









@endsection
