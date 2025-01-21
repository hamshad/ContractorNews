function addCategory() {
    var ids = ['title', 'status','sel_category','sel_section','Source', 'published_date','alt_tag','meta_title','meta_keywords','meta_descripion'];
    var title =  $('#title').val().trim();
    // var description =  ClassicEditor.instances['description'].getData();
    var description =  myEditor.getData();
    var small_description = $('#small_description').val();
    var sel_category =  $('#sel_category').val();
    var sel_section =  $('#sel_section').val().trim();
    var Video =  $('#Video').val().trim();
    var Source =  $('#Source').val().trim();
    var location =  $('#up_Location').val();
    var post_by =  $('#post_by').val();
    var published_date =  $('#published_date').val();
    console.log(published_date);
    var status = $("input[name='status']:checked").val();
    
    var alt_tag = $('#alt_tag').val();
    var meta_title = $('#meta_title').val();
    var meta_keywords = $('#meta_keywords').val();
    var meta_descripion = $('#meta_descripion').val();


// console.log(description);
// return false;
    removeValidations(ids);
    
    if (title == "" || status == undefined || sel_category=='' || sel_section == '' || published_date == '' || meta_title == "" || meta_keywords == "" || meta_descripion == ""){
    
    if(sel_category == ""){
     $('#sel_category_err').html('Required field');
     $('#sel_category').focus();
   }
   
   if(sel_section == ""){
     $('#sel_section_err').html('Required field');
     $('#sel_section').focus();
   }

    if(title == ""){
     $('#title_err').html('Required field');
     $('#title').focus();
   }

   if(status == undefined){
     $('#status_err').html('Required field');
     $('#status').focus();
   }
   
    if(published_date == ""){
        $('#published_date_err').html('Required field');
        $('#published_date').focus();
    }
     if(meta_title == ""){
     $('#meta_title_err').html('Required field');
     $('#meta_title').focus();
  }
  if(meta_keywords == ""){
     $('#meta_keywords_err').html('Required field');
     $('#meta_keywords').focus();
  }
  if(meta_descripion == ""){
     $('#meta_descripion_err').html('Required field');
     $('#meta_descripion').focus();
  }
    
   return false;
}
    
    var images = $('#categoryform input[type=file]').get(0).files.length;
    
    if(images == 0){
        if(alt_tag == ""){
            $('#alt_tag_err').html('Required field');
            $('#alt_tag').focus();
            return false;
        }
    }
    
    var fd = new FormData();
    fd.append('title', title);
    fd.append('description', description);
    fd.append('status', status);
    fd.append('category_id', sel_category);
    fd.append('section', sel_section);
    fd.append('Video', Video);
    fd.append('location', location);
    fd.append('small_description',small_description);
    fd.append('post_by',post_by);
    fd.append('alt_tag',alt_tag);
    fd.append('meta_title',meta_title);
    fd.append('meta_keywords',meta_keywords);
    fd.append('meta_descripion',meta_descripion);
    fd.append('published_date',published_date);
    var image_carry = $('#upload_image').get(0).files.length;
    
   
    
    if(image_carry<2){
    for (var i = 0; i < $('#upload_image').get(0).files.length; i++) {
            fd.append('articleimage[]', $('#upload_image').get(0).files[i]);
        
    };
    
    }
    else {
        $('#upload_image_err').html("You have allowed to upload single images");
        return false;
    }
    
     if(image_carry!=0){
        if(Source == ''){
        $('#Source_err').html('Required field');
        $('#Source').focus();
        return false;
    }
    else {
        fd.append('Source', Source);
        }
    }
    
    $('.post_outer').addClass('show');
    
    $.ajax({
        url: './addArticle',
        method: 'post',
        dataType: 'JSON',
        data: fd,
        contentType: false,
        processData: false,
        success: function(response) {
            $('.post_outer').removeClass('show');
            $('#addCategoryModal').modal('hide');
            // console.log(response.st);return false;
            if (response.st === parseInt(1)) {
                swal("",response.msg, "success").then(function(){ 
                window.location.reload();
                });
            }
            else if (response.st === parseInt(0)) {
                swal("", response.msg, "error");
                // $('#upload_image_err').html(response.msg);
                return false;
            }
        }
    });
 
}

$("#title").blur(function(){
    var title = $('#title').val();
    $('#meta_title').val(title);
  });
  
  $("#small_description").blur(function(){
    var small_description = $('#small_description').val();
    $('#meta_descripion').val(small_description);
  });

function removeValidations(ids) {
    $(ids).each(function(index, key) {
        $("#" + key).keyup(function() {
            $("#" + key + "_err").html('');
        });
        $("#" + key).change(function() {
            $("#" + key + "_err").html('');
        });
    });
}

function preview_image() {
    var total_file = document.getElementById("upload_image").files.length;
    $('#show_image').html('');
    $('#upload_image_err').html("");
    for (var i = 0; i < total_file; i++) {
        $('#show_image').append("<div class='col-md-4 col-sm-4 col-lg-4'  id=" + i + " '><div style='margin-bottom:0px;'><p style='text-align:right; margin-bottom:0px;'><i class='fa fa-times-circle' onclick='close_imgupload(" + i + ");' ></i></p></div><div style='text-align:center; border:1px solid #3c8dbc;'><img src='" + URL.createObjectURL(event.target.files[i]) + "' style='width:100%;padding:5px;'></div></div>");
    }
}

function close_imgupload(id) {

    $('#' + id).remove();
}


function getCategoryValue(){
    var cat = 1;
    $.ajax({
    url: baseURL + 'getCategory',
    method: 'post',
    data: "cat=" + cat,
    success: function(response) {
        var res = JSON.parse(response);
        if(res.st === parseInt(1)){
            $(res.data).each(function(ke, val) {
                $("#sel_category").append("<option value='"+val.id+"'>"+val.category_name+"</option>");
            });
            
            $('#sel_category').multiselect({
                columns: 1,
                placeholder: 'Select Category',
                search: true,
                selectAll: true
            });
        } else if(res.st === parseInt(0)){
            swal("",res.msg, "error");
        }
    }
   });
    
}


function deleteposts(PostId) {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this Article!",
        icon: "warning",
        buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
        ],
        dangerMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: './deletearticle',
                method: 'post',
                data: "article_id=" + PostId,
                success: function(response) {
                    res = JSON.parse(response);
                    if (res.st == 1) {
                        $("#"+PostId).closest('tr').remove();
                    } else if (res.st === parseInt(0)) {
                        swal(res.msg, "", "error");
                    }
                }
            });
        } else {
            swal("Cancelled", "Your Article is safe :)", "error");
        }
    })
}

function editArticle(articleId){
    $('#article_id').val(articleId);
    $('#update_show_image').html('');
    $.ajax({
        url: baseURL + 'getarticle',
        method: 'post',
        data: "articleId=" + articleId,
        success: function(response) {
            var res = JSON.parse(response);if(res.st === parseInt(1)){
                // console.log(res);
                $(res.category).each(function(ke, val) {
                    if($.inArray(val.id, res.selectedcategory) !== -1){
                	    $("#update_sel_category").append("<option selected='selected' value='"+val.id+"'>"+val.category_name+"</option>");
                	} else {
                	    $("#update_sel_category").append("<option value='"+val.id+"'>"+val.category_name+"</option>");
                	}
                });
                
                if(res.images!=''){
                    $(res.images).each(function(ke, val) {
                        $('#update_show_image').append("<div class='col-md-9 col-sm-9 col-lg-9'  id=" + val.id + "><div style='margin-bottom:0px;'><p style='text-align:right; margin-bottom:0px;'><i class='fa fa-times-circle' onclick='close_imgupload(" + val.id + ");' ></i></p></div><div style='text-align:center; border:1px solid #3c8dbc;'><img src='" +baseURL+val.image_url+'/'+val.image_name+ "' style='width:100%; padding:5px;'></div></div>");
                        $("#update_Source").val(val.source);
                    });
                }
                
                $('#update_sel_section option[value="'+res.article.section+'"]').attr("selected","selected");
                $("#update_title").val(res.article.title);
                // ClassicEditor.instances['update_description'].setData(res.article.description);
                myEditorEdit.setData(res.article.description);
                $("#update_Video").val(res.article.video_url);
                $('#update_small_description').val(res.article.small_description);
                $('#update_post_by').val(res.article.post_by);
                $('#update_published_date').val(res.article.published_date);
                 $('#update_alt_tag').val(res.article.alt_tag);
                $('#update_meta_title').val(res.article.meta_title);
                $('#update_meta_keywords').val(res.article.meta_keywords);
                $('#update_meta_descripion').val(res.article.meta_descripion);
                
                if(res.article.section=='Update'){
                    $('.up_location').css('display', 'block');
                    $(res.state_data).each(function(ke, val) {
                        if(val.id == res.article.location){
                    	    $("#update_Location").append("<option selected='selected' value='"+val.id+"'>"+val.state_name+"</option>");
                    	} else {
                    	    $("#update_Location").append("<option value='"+val.id+"'>"+val.state_name+"</option>");
                    	}
                    });
                    //$('#update_Location').val(res.article.location);
                }
                $('#update_sel_category').multiselect({
                    columns: 1,
                    //placeholder: 'Select Category',
                    search: true,
                    selectAll: true,
                    selectableOptgroup: true
                });
            } else if(res.st === parseInt(0)){
                swal("",res.msg, "error");
            }
        }
    });
}

function updateArticle(){
    var ids = ['update_sel_category', 'update_title','update_description','update_sel_section' ,'update_Source', 'update_published_date','update_alt_tag','update_meta_title','update_meta_keywords','update_meta_descripion'];
    var title =  $('#update_title').val().trim();
    var article_id =  $('#article_id').val().trim();
    // var description =  ClassicEditor.instances['update_description'].getData();
    var description =  myEditorEdit.getData()
    var sel_category =  $('#update_sel_category').val();
    var sel_section =  $('#update_sel_section').val();
    var Source =  $('#update_Source').val().trim();
    var Video =  $('#update_Video').val().trim();
    var small_description =  $('#update_small_description').val().trim();
    var location =  $('#update_Location').val();
    var update_post_by =  $('#update_post_by').val();
    var update_published_date =  $('#update_published_date').val();
    
     var alt_tag = $('#update_alt_tag').val();
    var meta_title = $('#update_meta_title').val();
    var meta_keywords = $('#update_meta_keywords').val();
    var meta_descripion = $('#update_meta_descripion').val();
//  alert(description);
 
//  return false;
    removeValidations(ids);
    
    if (title == "" || sel_category=='' || sel_section==''|| update_published_date == '' || meta_title == "" || meta_keywords == "" || meta_descripion == ""){
    
    if(sel_category == ""){
     $('#update_sel_category_err').html('Required field');
     $('#update_sel_category').focus();
   }
   
   if(sel_section == ""){
     $('#update_sel_section_err').html('Required field');
     $('#update_sel_section').focus();
   }
   
    if(title == ""){
     $('#update_title_err').html('Required field');
     $('#update_title').focus();
   }
   
    if(title == ""){
        $('#update_published_date_err').html('Required field');
        $('#update_published_date').focus();
    }
    if(meta_title == ""){
     $('#update_meta_title_err').html('Required field');
     $('#update_meta_title').focus();
  }
  if(meta_keywords == ""){
     $('#update_meta_keywords_err').html('Required field');
     $('#update_meta_keywords').focus();
  }
  if(meta_descripion == ""){
     $('#update_meta_descripion_err').html('Required field');
     $('#update_meta_descripion').focus();
  }

   return false;
}

    var images = $('#updateArticleForm input[type=file]').get(0).files.length;
    
     if(images == 0){
        if(alt_tag == ""){
            $('#update_alt_tag_err').html('Required field');
            $('#update_alt_tag').focus();
            return false;
        }
    }
    
    var fd = new FormData();
    fd.append('title', title);
    fd.append('description', description);
    fd.append('category_id', sel_category);
    fd.append('article_id', article_id);
    fd.append('section', sel_section);
    fd.append('Video', Video);
    fd.append('location', location);
    fd.append('small_description',small_description);
    fd.append('update_post_by',update_post_by);
    fd.append('update_published_date',update_published_date);
    fd.append('alt_tag',alt_tag);
    fd.append('meta_title',meta_title);
    fd.append('meta_keywords',meta_keywords);
    fd.append('meta_descripion',meta_descripion);
    
    var image_carry = $('#update_upload_image').get(0).files.length;
    
    if(image_carry<2){
    for (var i = 0; i < $('#update_upload_image').get(0).files.length; i++) {
            fd.append('articleimage[]', $('#update_upload_image').get(0).files[i]);
        
    };
    }
    else {
        $('#update_upload_image_err').html('You have allowed to upload only single images');
        return false;
    }
    
    if(image_carry!=0){
        if(Source == ''){
        $('#update_Source_err').html('Required field');
        $('#update_Source').focus();
        return false;
    }
    else {
        fd.append('Source', Source);
        }
    }
    
    $('.post_outer').addClass('show');
    
    
    $.ajax({
        url: './updateArticleValue',
        method: 'post',
        dataType: 'JSON',
        data: fd,
        contentType: false,
        processData: false,
        success: function(response) {
            
            $('.post_outer').removeClass('show');
            $('#editPostModal').modal('hide');
            //console.log(response.st);return false;
            if (response.st === parseInt(1)) {
                swal("",response.msg, "success").then(function(){ 
                window.location.reload();
                });
                
            }
            else if (response.st === parseInt(0)) {
                $('#update_upload_image_err').html(response.msg);
            }
        }
    });
}

function update_preview_image() {
    var total_file = document.getElementById("update_upload_image").files.length;
    $('#update_show_image').html('');
    $('#update_upload_image_err').html('');
    for (var i = 0; i < total_file; i++) {
        $('#update_show_image').append("<div class='col-md-9 col-sm-9 col-lg-9'  id=" + i + " style=' padding:5px;'><div style='margin-bottom:0px;'><p style='text-align:right; margin-bottom:0px;'><i class='fa fa-times-circle' onclick='close_imgupload(" + i + ");' ></i></p></div><div style='text-align:center; border:1px solid #3c8dbc;'><img src='" + URL.createObjectURL(event.target.files[i]) + "' style='width:100%; height:150px; padding:5px;'></div></div>");
    }
}


function updateStatus(id){
    
    if($('#togBtn_' + id).is(":checked"))
    {
        var status = 1;
    }
    else {
        var status = 0;
    }
    
    $.ajax({
    url: baseURL + 'updateStatus',
    method: 'post',
    data: "articleId=" + id+"&status="+status,
    success: function(response) {
        var res = JSON.parse(response);
        if(res.st === parseInt(1)){
            swal("",res.msg, "success");
        }
        else if(res.st === parseInt(0)){
            swal("",res.msg, "error");
        }
    }
    });
}


function viewArticle(articleId){
    
    $.ajax({
    url: baseURL + 'getarticle',
    method: 'post',
    data: "articleId=" + articleId,
    success: function(response) {
        var res = JSON.parse(response);
        //console.log(res);
        if(res.st === parseInt(1)){
            var categories = [];
            $(res.selectedcategory).each(function(ke, val) {
                  //console.log(val);
                categories.push(val.category_name);
                    
            });
            // console.log(res.selectedcategory);
            // console.log(categories);
            $("#view_sel_category").val(categories.toString());
            if(res.images!=''){
            $(res.images).each(function(ke, val) {
            $('#view_show_image').append("<div class='col-md-4 col-sm-4 col-lg-4'  id=" + val.id + " style=' padding:5px;'><div style='margin-bottom:0px;'><p style='text-align:right; margin-bottom:0px;'><i class='fa fa-times-circle' onclick='close_imgupload(" + val.id + ");' ></i></p></div><div style='text-align:center; border:1px solid #3c8dbc;'><img src='" +baseURL+val.image_url+'/'+val.image_name+ "' style='width:100%; height:150px; padding:5px;'></div></div>");
            $("#view_source").val(val.source);
            });
            }
            
            $("#view_title").val(res.article.title);
            ClassicEditor.instances['view_description'].setData(res.article.description);
            //$("#view_description").val(res.article.description);
            $("#view_section").val(res.article.section);
            $("#view_video").val(res.article.video_url);
            $('#view_small_description').val(res.article.small_description);
            if(res.article.section=='Update'){
                    $('.up_location').css('display', 'block');
                    $('#Location').val(res.article.state_name);
                }
            
          }
         else if(res.st === parseInt(0)){
              swal("",res.msg, "error");
          }
    }
   });
}



function deleteSubscriber(Id) {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this Subscriber!",
        icon: "warning",
        buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
        ],
        dangerMode: true,
    }).then(function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: './deletesubscriber',
                method: 'post',
                data: "subscriber_id=" + Id,
                success: function(response) {
                    res = JSON.parse(response);
                    if (res.st == 1) {
                        $("#"+Id).closest('tr').remove();
                    } else if (res.st === parseInt(0)) {
                        swal(res.msg, "", "error");
                    }
                }
            });
        } else {
            swal("Cancelled", "Your Subscriber is safe :)", "error");
        }
    })
}

function refreshModal(){
    $('#update_show_image').html('');
    $('#view_show_image').html('');
    $('#update_title_err').html('');
    $('#update_sel_category_err').html('');
}

function refreshModalArticle(){
    $('#sel_category_err').html('');
    $('#title_err').html('');
    $('#upload_image_err').html('');
    $('#show_image').html('');
    $('#title').val('');
    $('#sel_category').val('');
    $('#description').val('');
    $('#upload_image').val('');
}

function getlocation(da){
    if(da=='Update'){
        $('.up_location').css('display', 'block');
    } else{
        $('.up_location').css('display', 'none');
    }
}