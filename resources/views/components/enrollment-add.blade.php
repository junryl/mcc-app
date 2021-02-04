<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <strong><label for="lblCourse">Course: {{$params["course"]}}</label></strong>
      <input type="hidden" id="enroll-course-id" value="{{$params["course_id"]}}">
    </div>
    <div class="col-sm-3" id="school_year_container">      
      <strong><label for="lblSchoolYear">School Year: {{$params["school_year"]}} </label></strong>
      <input type="hidden" id="enroll-school-year-id" value="{{$params["school_year_id"]}}">
    </div>  
    <div class="col-sm-3">      
    </div> 
    <div class="col-sm-3">
      <button class="btn btn-success btn-sm" id="btnEnrollSelectedStudents">Enroll Selected Students</button>
    </div> 
  </div>
  <div class="row mt-1"></div>
  <table id="enrollmentStudentList" class="display mt-1" cellspacing="0" width="100%">
    <thead>
        <tr>          
            <th>Name</th>           
            <th>id</th>
        </tr>
    </thead>
  </table>
</div>
