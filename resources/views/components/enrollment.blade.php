<div class="container">
  <div class="row">
    <div class="col-sm-3">
      {!! Form::label('Course', 'Course', []) !!}
      {!! Form::select('course', $courses,'',['id' => 'course']) !!}
    </div>
    <div class="col-sm-3" id="school_year_container">      
      {!! Form::label('schoolYear', 'School Year', []) !!}
      {!! Form::select('school_year', $schoolyear,'',['id' => 'school_year']) !!}   
    </div>
    <div class="col-sm-3" id="btn_enroll_container">      
       <a href="/enrollment/student/add" class="btn btn-success btn-sm" id="btn_enroll">Add Student to Enroll</a>
    </div>
  </div>
  <div class="row mt-1"></div>
  <table id="enrolledStudentList" class="display compact mt-1" cellspacing="0" width="100%">
    <thead>
        <tr>          
            <th>Name</th>           
            <th>id</th>
        </tr>
    </thead>
  </table> 
</div>




