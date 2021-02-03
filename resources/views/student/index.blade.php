@extends('layouts.admin')

@section('content')
    <x-student-list :courses="$courses" :schoolyear="$school_year"></x-student-list>
@endsection

@section('scripts')
  <script>       
    $(document).ready(function() {    

        //: INITIALIZATION

        //grid table
        var STUDENT_LIST = null;

        //holds the currently selected row on student grade list grid
        var student_row_selected = {};

        //grid selected index
        var student_row_selected_index = "";

        //add csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });        

        $.ajax({
            type: "GET",
            url: '/getStudentGradeList',       
        }).done(function(data) {                
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
                ],
                select: {
                    style: 'single'
                }
            });

            //: EVENTS

            STUDENT_LIST.on('select', function ( e, dt, type, indexes ) {          
                if ( type === 'row' ) {                    
                    var data = STUDENT_LIST.rows( indexes ).data()[0];
                    student_row_selected_index = indexes;
                    student_row_selected = data;
                    populate_student_grade_modal('editGradeForm',student_row_selected);                        
                    $("#editGradeModal").modal();
                }                
            });

            $('#editGradeModalSave').click(updateStudentGridRowData);

            $('#editGradeModal').on('hidden.bs.modal', function () {
                STUDENT_LIST.rows('.selected').deselect();
            });

            //: FUNCTIONS
            
            function updateStudentGridRowData(){
                let row_data = student_row_selected;
                let row_update = get_data_from_form('editGradeForm');
                Object.keys(row_update).forEach(function(key) {                    
                    row_data[key] = row_update[key]
                });                
                
                $.ajax({
                    type: "POST",
                    data: row_data,
                    url: '/updateStudentGrade',       
                    success: function (response) {
                        if(response > 0){
                            let index = student_row_selected_index[0];
                            var temp = STUDENT_LIST.row(index).data();                            
                            $('#studentList').dataTable().fnUpdate(temp,index,undefined,false);                            
                        }
                        $('#editGradeModal').modal('toggle');                            
                    },
                    error:  function (err){                        
                        $('#editGradeModal').modal('toggle');
                        alert('Error: unable to save. Please try again.');
                    }
                });
            }

        });

    });    
  </script>
@endsection