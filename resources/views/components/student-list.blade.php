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
  </div>
  <div class="row mt-1"></div>
  <table id="studentList" class="display compact mt-1" cellspacing="0" width="100%">
    <thead>
        <tr>          
            <th>Name</th>
            <th>Course</th>
            <th>Midterm Grade</th>
            <th>Final Grade</th>
            <th>Final Rating</th>
            <th>Remarks</th>            
            <th>id</th>
        </tr>
    </thead>
  </table>
</div>

<!-- modal -->
<div class="modal fade" id="editGradeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Grade</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editGradeForm">         
          <div class="form-group row">
            <label for="midterm" class="col-sm-2 col-form-label">Midterm Grade</label>
            <div class="col-sm-10">
              <input type="midterm_grade" class="form-control" id="midterm_grade" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="finalGrade" class="col-sm-2 col-form-label">Final Grade</label>
            <div class="col-sm-10">
              <input type="final_grade" class="form-control" id="final_grade" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="finalRating" class="col-sm-2 col-form-label">Final Rating</label>
            <div class="col-sm-10">
              <input type="final_rating" class="form-control" id="final_rating" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="remarks" class="col-sm-2 col-form-label">Remarks</label>
            <div class="col-sm-10">
              <textarea type="remarks" class="form-control" id="remarks" placeholder=""></textarea>
            </div>
          </div>
        </form>      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="editGradeModalSave">Save</button>
      </div>
    </div>
  </div>
</div>


