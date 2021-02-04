@extends('layouts.admin')

@section('content')
  <x-enrollment-add :students="$students" :params="$params"></x-enrollment-add>
@endsection

@section('scripts')
  <script>       
    $(document).ready(function() {    
      //: INITIALIZE

      //add csrf token
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });

      $.ajax({
            type: "GET",
            url: '/getStudentList',       
      }).done(function(data) {              
        $('#enrollmentStudentList').DataTable( {
            select: true,
            data: data,
            columns: [
                { data: 'name' },                     
                { data: 'id' },
            ],
            "columnDefs": [                                   
                {
                    "targets": [ 1 ],
                    "visible": false,
                    "searchable": false
                },
                {
                    orderable: false,
                    className: 'select-checkbox',
                    targets:   0
                },
            ],
            select: {
                style: 'multi'
            }            
        });   
      });   
      //: EVENTS

      $('#btnEnrollSelectedStudents').click(enrollStudents);
      

      //: FUNCTIONS
      function enrollStudents(){                
        var count = $('#enrollmentStudentList').DataTable().rows( { selected: true } ).count();
        var data = $('#enrollmentStudentList').DataTable().rows( { selected: true } ).data();
        var IdsToEnroll = [];
        
        for(var i = 0; i < count; i++){
          IdsToEnroll.push(data[i].id)          
        }

        $.ajax({
          type: "POST",
          url: '/studentEnroll',       
          data: { 'course_id': $('#enroll-course-id').val(), 'school_year_id': $('#enroll-school-year-id').val(), ids: IdsToEnroll},
          success: function (data) { 
            if(parseInt(data) > 0){              
              window.location.href = window.location.origin + '/enrollment';
            }else{
              alert('Error: Enrollment failed.');
            }
          },
          error: function (error) { 
            console.log('Error:', error.statusText); 
          }
        });        
      }

    });    

  </script>
@endsection