@extends('layouts.admin')

@section('content')
    <x-student-list :users="$users"></x-student-list>
@endsection

@section('scripts')
  <script>       
    $(document).ready(function() {     

        //get student list and populate table
        var studentList = [];
        $.ajax({
            type: "GET",
            url: '/getStudentList',       
        }).done(function(data) {            
            $('#studentList').DataTable( {
                data: data,
                columns: [
                    { data: 'name' },    
                    { data: 'student_course_name' },
                    { data: 'midterm_grade' },
                    { data: 'final_grade' },
                    { data: 'final_rating' },
                    { data: 'remarks' },
                    { data: 'created_at' },                    
                    { data: 'email_verified_at' },                                        
                    { data: 'updated_at' },
                    { data: 'id' },

                ],
                "columnDefs": [
                    {
                        "targets": [ 6 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 7 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 8 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 9 ],
                        "visible": false,
                        "searchable": false
                    }
                ]
            });
        });

    });    
  </script>
@endsection