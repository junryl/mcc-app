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
            console.log(data);
            $('#studentList').DataTable( {
                data: data,
                columns: [
                    { data: 'name' },    
                    { data: 'email' },
                    { data: 'created_at' },                    
                    { data: 'email_verified_at' },                                        
                    { data: 'updated_at' },
                    { data: 'id' },
                ],
                "columnDefs": [
                    {
                        "targets": [ 2 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 3 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 4 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 5 ],
                        "visible": false,
                        "searchable": false
                    }
                ]
            });
        });

    });    
  </script>
@endsection