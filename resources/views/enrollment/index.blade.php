@extends('layouts.admin')

@section('content')
    <x-enrollment :courses="$courses" :schoolyear="$school_year"></x-enrollment>
@endsection

@section('scripts')
  <script>       
    $(document).ready(function() {    
      //: INITIALIZE

      var enrolledStudentTable = $('#enrolledStudentList').DataTable( {
        select: true,
        data: [],
        columns: [
            { data: 'name' },                     
            { data: 'id' },
        ],
        "columnDefs": [                    
            {
                "targets": [ 1 ],
                "visible": false,
                "searchable": false
            }
        ],
        select: {
            style: 'single'
        }
      });  

      //: EVENTS
      $('#btn_enroll_container').hide();
      $('#course').change(checkIfCourseAndSYAreSelected);
      $('#school_year').change(checkIfCourseAndSYAreSelected);
      $('#btn_enroll').click(navigateToStudentEnrollment);      

      //: FUNCTIONS

      function checkIfCourseAndSYAreSelected(){
        var course = $('#course').val();
        var school_year = $('#school_year').val();
        if(course > 0 && school_year > 0){
          $('#btn_enroll_container').show();          
          populateEnrolledList(course,school_year);
        }else{
          $('#btn_enroll_container').hide();        
          $('#enrolledStudentList').dataTable().fnClearTable();
        }
      }

      function populateEnrolledList(courseId, schoolYearId){        
        $.ajax({
            type: "GET",
            url: '/studentEnrolledByCourseAndSchoolYear/'+courseId+'/'+schoolYearId,                 
        }).done(function(data) {             
          $('#enrolledStudentList').dataTable().fnClearTable();
          if(data.length > 0){
            $('#enrolledStudentList').dataTable().fnAddData(data);
          }          
        });
      }

      function navigateToStudentEnrollment(){
        var course = $('#course').val();
        var school_year = $('#school_year').val();
        window.location.href = '/enrollment/student/add?course_id='+course+'&school_year_id='+school_year;
      }


    });    

  </script>
@endsection