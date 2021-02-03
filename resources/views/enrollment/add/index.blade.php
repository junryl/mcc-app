@extends('layouts.admin')

@section('content')
  <x-enrollment-add :students="$students"></x-enrollment-add>
@endsection

@section('scripts')
  <script>       
    $(document).ready(function() {    
      //: INITIALIZE
      $.ajax({
            type: "GET",
            url: '/getStudentList',       
      }).done(function(data) {      
        console.log('getStudentList',data);
        STUDENT_LIST = $('#enrollmentStudentList').DataTable( {
            select: true,
            data: data,
            columns: [
                { data: 'name' },                     
                { data: 'id' },
            ],
            "columnDefs": [     
                {
                    orderable: false,
                    className: 'select-checkbox',
                    targets:   0
                },
                {
                    "targets": [ 1 ],
                    "visible": false,
                    "searchable": false
                }
            ],
            select: {
                style: 'multiple'
            }
        });   
      });   
      //: EVENTS

      //: FUNCTIONS

    });    

  </script>
@endsection