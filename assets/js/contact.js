function submitContactUs(){
    var ids = ['email_contact', 'name', 'phone', 'contact_type', 'description'];
    
    var email           =  $('#email_contact').val().trim();
   var name             =  $('#name').val().trim();
   var phone            =  $('#phone').val().trim();
   var contact_type     =  $('#contact_type').val().trim();
   var description      =  $('#description').val().trim();
   
   removeValidations(ids);
   
   if (email == "" || name == "" || phone == "" || contact_type == ""){
    
    if(email == ""){
     $('#email_contacterror').html('Required field');
     $('#email_contact').focus();
   }

   if(name == ""){
     $('#nameerror').html('Required field');
     $('#name').focus();
   }

   if(phone == ""){
     $('#phoneerror').html('Required field');
     $('#phone').focus();
     
   }

   if(contact_type == ""){
     $('#contact_typeerror').html('Required field');
     $('#contact_type').focus();
    
   }

   return false;

}

   else if(email.indexOf("@", 0) < 0){
     $('#email_contacterror').html('Invalid Email Id');
     $('#email_contact').focus();
     return false;
   }
   else if(email.indexOf(".", 0) < 0){
     $('#email_contacterror').html('Invalid Email Id');
     $('#email_contact').focus();
     return false;
   }
  
   else if(isNaN(phone)){
     $('#phoneerror').html('Only Numeric Character allowed');
     $('#phone').focus();
     return false;
   }
   else{
       
       $('.post_outer').addClass('show');
       
      $.ajax({
    
      url: baseURL+'addContact',
      method: 'post',
      data: "name="+name+'&email='+email+'&phone='+phone+'&type='+contact_type+'&description='+description,
      success: function(response) {
         $('.post_outer').removeClass('show');
       var res = JSON.parse(response);
       
        if (res.st === parseInt(1)) {
            $('#contact').modal('hide');
            $('#email_contact').val('');
            $('#name').val('');
            $('#phone').val('');
            $('#description').val('');
            swal("",res.data, "success");
            
          }
        else if(res.st === parseInt(0)){
            swal("",res.data, "error").then(function(){ 
                location.reload();
                });
        }
      }

      });                                                        

   }
   
 }


function submitStory(){
    var ids = ['email_story', 'name_story', 'phone_story', 'story_type', 'description_story'];
    
    var email           =  $('#email_story').val().trim();
   var name             =  $('#name_story').val().trim();
   var phone            =  $('#phone_story').val().trim();
   var contact_type     =  $('#story_type').val().trim();
   var description      =  $('#description_story').val().trim();
   
   removeValidations(ids);
   
   if (email == "" || name == "" || phone == "" || contact_type == ""){
    
    if(email == ""){
     $('#email_storyerror').html('Required field');
     $('#email_story').focus();
   }

   if(name == ""){
     $('#name_storyerror').html('Required field');
     $('#name_story').focus();
   }

   if(phone == ""){
     $('#phone_storyerror').html('Required field');
     $('#phone_story').focus();
     
   }

   if(contact_type == ""){
     $('#story_typeerror').html('Required field');
     $('#story_type').focus();
    
   }

   return false;

}

   else if(email.indexOf("@", 0) < 0){
     $('#email_storyerror').html('Invalid Email Id');
     $('#email_story').focus();
     return false;
   }
   else if(email.indexOf(".", 0) < 0){
     $('#email_storyerror').html('Invalid Email Id');
     $('#email_story').focus();
     return false;
   }
  
   else if(isNaN(phone)){
     $('#phone_storyerror').html('Only Numeric Character allowed');
     $('#phone_story').focus();
     return false;
   }
   else{
       
       $('.post_outer').addClass('show');
       
      $.ajax({
      url: baseURL+'addContact',
      method: 'post',
      data: "name="+name+'&email='+email+'&phone='+phone+'&type='+contact_type+'&description='+description,
      success: function(response) {
          
          $('.post_outer').removeClass('show');
       var res = JSON.parse(response);
        if (res.st === parseInt(1)) {
            $('#story').modal('hide');
            $('#email_story').val('');
            $('#name_story').val('');
            $('#phone_story').val('');
            $('#description_story').val('');
            swal("",res.data, "success");
          }
        else if(res.st === parseInt(0)){
            swal("",res.data, "error").then(function(){ 
                location.reload();
                });
        }
      }

      });                                                        

   }
   
 }
 
 
 function submitAdvertise(){
    var ids = ['email_advertise', 'name_advertise', 'phone_story', 'story_type', 'description_story'];
    
    var email           =  $('#email_advertise').val().trim();
   var name             =  $('#name_advertise').val().trim();
   var phone            =  $('#phone_advertise').val().trim();
   var contact_type     =  $('#adverise_type').val().trim();
   var description      =  $('#description_advertise').val().trim();
   
   removeValidations(ids);
   
   if (email == "" || name == "" || phone == "" || contact_type == ""){
    
    if(email == ""){
     $('#email_advertiseerror').html('Required field');
     $('#email_advertise').focus();
   }

   if(name == ""){
     $('#name_advertiseerror').html('Required field');
     $('#name_advertise').focus();
   }

   if(phone == ""){
     $('#phone_advertiseerror').html('Required field');
     $('#phone_advertise').focus();
     
   }

   if(contact_type == ""){
     $('#adverise_typeerror').html('Required field');
     $('#adverise_type').focus();
    
   }

   return false;

}

   else if(email.indexOf("@", 0) < 0){
     $('#email_advertiseerror').html('Invalid Email Id');
     $('#email_advertise').focus();
     return false;
   }
   else if(email.indexOf(".", 0) < 0){
     $('#email_advertiseerror').html('Invalid Email Id');
     $('#email_advertise').focus();
     return false;
   }
  
   else if(isNaN(phone)){
     $('#phone_advertiseerror').html('Only Numeric Character allowed');
     $('#phone_advertise').focus();
     return false;
   }
   else{
       
       $('.post_outer').addClass('show');
       
       $('#contact').modal('hide');
       $('#story').modal('hide');
       $('#advertise').modal('hide');
       
      $.ajax({
    
      url: baseURL+'addContact',
      method: 'post',
      data: "name="+name+'&email='+email+'&phone='+phone+'&type='+contact_type+'&description='+description,
      success: function(response) {
          
          $('.post_outer').removeClass('show');
       var res = JSON.parse(response);
        if (res.st === parseInt(1)) {
            $('#advertise').modal('hide');
            $('#email_advertise').val('');
            $('#name_advertise').val('');
            $('#phone_advertise').val('');
            $('#description_advertise').val('');
            swal("",res.data, "success");
          }
        else if(res.st === parseInt(0)){
            swal("",res.data, "error").then(function(){ 
                location.reload();
                });
        }
      }

      });                                                        

   }
   
 }
 
 function subscribeNews(){
     
     var ids = ['email_subscribe'];
     var email = $('#email_subscribe').val().trim();
     
     removeValidations(ids);
     //alert(email);
     //console.log('sdsd');
     if(email==''){
        $('#email_subscribeerror').html('Required Field');
        $('#email_subscribe').focus();
        return false; 
     }
    else if(email.indexOf("@", 0) < 0){
     $('#email_subscribeerror').html('Invalid Email Id');
     $('#email_subscribe').focus();
     return false;
   }
   else if(email.indexOf(".", 0) < 0){
     $('#email_subscribeerror').html('Invalid Email Id');
     $('#email_subscribe').focus();
     return false;
   }
   else {
       $('.post_outer').addClass('show');
       
       $.ajax({
      url: baseURL+'addsubscribe',
      method: 'post',
      data: "email="+email,
      success: function(response) {
          
          $('.post_outer').removeClass('show');
          
       var res = JSON.parse(response);
        if (res.st === parseInt(1)) {
            $('#newsletter').modal('hide');
            $('#email_subscribe').val('');
            swal("",res.data, "success");
          }
        else if(res.st === parseInt(0)){
            swal("",res.data, "error").then(function(){ 
                location.reload();
                });
        }
      }

      });            
   }
    
     
 }
 
function removeValidations(ids) {
    $(ids).each(function(index, key) {
        $("#" + key).keyup(function() {
            $("#" + key + "error").html('');
        });

    });
}


function modalrefresh(){
    
    $('#email_subscribeerror').html('');
    $('#email_contacterror').html('');
    $('#nameerror').html('');
    $('#phoneerror').html('');
    $('#email_storyerror').html('');
    $('#name_storyerror').html('');
    $('#phone_storyerror').html('');
    $('#email_advertiseerror').html('');
    $('#name_advertiseerror').html('');
    $('#phone_advertiseerror').html('');
    $('#email_advertise').val('');
    $('#name_advertise').val('');
    $('#phone_advertise').val('');
    $('#description_advertise').val('');
    $('#description_story').val('');
    $('#phone_story').val('');
    $('#name_story').val('');
    $('#email_story').val('');
    $('#description').val('');
    $('#phone').val('');
    $('#name').val('');
    $('#email_contact').val('');
    $('#email_subscribe').val('');
}

// code by jaidev 

function subscribeNews_h(){
     
     var ids = ['email_subscribe_h'];
     var email = $('#email_subscribe_h').val().trim();
     
     removeValidations(ids);
     //alert(email);
     //console.log('sdsd');
     if(email==''){
        $('#email_subscribe_herror').html('Required Field');
        $('#email_subscribe_h').focus();
        return false; 
     }
    else if(email.indexOf("@", 0) < 0){
     $('#email_subscribe_herror').html('Invalid Email Id');
     $('#email_subscribe_h').focus();
     return false;
   }
   else if(email.indexOf(".", 0) < 0){
     $('#email_subscribe_herror').html('Invalid Email Id');
     $('#email_subscribe_h').focus();
     return false;
   }
   else {
       $('.post_outer').addClass('show');
       
       $.ajax({
      url: baseURL+'addsubscribe',
      method: 'post',
      data: "email="+email,
      success: function(response) {
          
          $('.post_outer').removeClass('show');
          
       var res = JSON.parse(response);
        if (res.st === parseInt(1)) {
            
            $('#email_subscribe_h').val('');
            swal("",res.data, "success");
          }
        else if(res.st === parseInt(0)){
            swal("",res.data, "error").then(function(){ 
                location.reload();
                });
        }
      }

      });            
   }
    
     
 }

function subscribeNews_hO(){
     
     var ids = ['email_subscribe_hO'];
     var email = $('#email_subscribe_hO').val().trim();
     
     removeValidations(ids);
     //alert(email);
     //console.log('sdsd');
     if(email==''){
        $('#email_subscribe_hOerror').html('Required Field');
        $('#email_subscribe_hO').focus();
        return false; 
     }
    else if(email.indexOf("@", 0) < 0){
     $('#email_subscribe_hOerror').html('Invalid Email Id');
     $('#email_subscribe_hO').focus();
     return false;
   }
   else if(email.indexOf(".", 0) < 0){
     $('#email_subscribe_hOerror').html('Invalid Email Id');
     $('#email_subscribe_hO').focus();
     return false;
   }
   else {
       $('.post_outer').addClass('show');
       
       $.ajax({
      url: baseURL+'addsubscribe',
      method: 'post',
      data: "email="+email,
      success: function(response) {
          
          $('.post_outer').removeClass('show');
          
       var res = JSON.parse(response);
        if (res.st === parseInt(1)) {
            
            $('#email_subscribe_hO').val('');
            swal("",res.data, "success");
          }
        else if(res.st === parseInt(0)){
            swal("",res.data, "error").then(function(){ 
                location.reload();
                });
        }
      }

      });            
   }
    
     
 }


//Code Developed by Prateek Narayan
function getCategoryValue(){
    var cat = 1;
    $.ajax({
    url: baseURL + 'getCategory',
    method: 'post',
    data: "cat=" + cat,
    success: function(response) {
        var res = JSON.parse(response);
        if(res.st === parseInt(1)){
            res.data.sort((a, b) => {
                let fa = a.category_name.toLowerCase(),
                    fb = b.category_name.toLowerCase();
            
                if (fa < fb) {
                    return -1;
                }
                if (fa > fb) {
                    return 1;
                }
                return 0;
            });
            $(res.data).each(function(ke, val) {
                if(val.id == search_data){
                    $("#search_cat").append("<option value='"+val.id+"' selected='selected'>"+val.category_name+"</option>");   
                } else {
                    $("#search_cat").append("<option value='"+val.id+"'>"+val.category_name+"</option>");
                }
            });
        } else if(res.st === parseInt(0)){
            swal("",res.msg, "error");
        }
    }
   });
}