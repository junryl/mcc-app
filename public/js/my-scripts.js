
//populate modal from data
//@elementId : form id
//@data : object of data
//make sure element ids are found from data object
function populate_student_grade_modal(elementId, data){
  var form = document.querySelector('#'+elementId);
  if(form){
    var inputs = form.elements;
    for (var i = 0; i < inputs.length; i++) {      
      var elementId = inputs[i].id;      
      document.querySelector('#'+elementId).value =  data[elementId];
    }
  } 
}

//get data from form
//@elementId : form id
function get_data_from_form(elementId){
  var object = {};
  var form = document.querySelector('#'+elementId);
  if(form){
    var inputs = form.elements;
    for (var i = 0; i < inputs.length; i++) {      
      var elementId = inputs[i].id;      
      //document.querySelector('#'+elementId).value =  data[elementId];
      object[elementId] = document.querySelector('#'+elementId).value;
    }
  } 
  return object;
}