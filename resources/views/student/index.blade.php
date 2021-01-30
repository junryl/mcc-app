@extends('layouts.admin')

@section('content')
    <x-student-list :users="$users"></x-student-list>
@endsection

@section('scripts')
  <script>       
    $(document).ready(function() {     

        //grid table
        var STUDENT_LIST = null;

        //get student list and populate table
        var studentList = [];
        $.ajax({
            type: "GET",
            url: '/getStudentList',       
        }).done(function(data) {     
            //console.log(data);       
            STUDENT_LIST = $('#studentList').DataTable( {
                select: true,
                data: data,
                columns: [
                    { data: 'name' },    
                    { data: 'student_course_name' },
                    { data: 'midterm_grade' },
                    { data: 'final_grade' },
                    { data: 'final_rating' },
                    { data: 'remarks' },                    
                    { data: 'id' },

                ],
                "columnDefs": [                    
                    {
                        "targets": [ 6 ],
                        "visible": false,
                        "searchable": false
                    }
                ]
            });

            
            //events
            STUDENT_LIST.on( 'select', function ( e, dt, type, indexes ) {                
                if ( type === 'row' ) {                    
                    var data = STUDENT_LIST.rows( indexes ).data()[0];
                    console.log('row selected data',data);
                    
                    //show modal
                    $('#myMeditGradeModalodal').on('shown.bs.modal', function () {
                        
                    });
                }
            });

        });

    });    
  </script>
@endsection