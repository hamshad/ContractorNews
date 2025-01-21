<?php //echo '<pre>'; print_r($article); die;?>
<style>
    #example_wrapper #example_filter{
        text-align:right;
    }
    #example_wrapper #example_filter label{
        text-align:left;
    }
    
    #example_wrapper #example_paginate{
        text-align:right;
    }
    #example_wrapper #example_paginate ul{
        text-align:left;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> List Of Contact
        <small>Contact Us Record</small>
      </h1>
    </section>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                
                <th>Type</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Description</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            
            <?php  if(isset($contact)) { foreach($contact as $key => $value) { ?>
            <tr>
                
                <td><?php echo $value->type ;?></td>
                <td><?php echo $value->name ;?></td>
                <td><?php echo $value->email ;?></td>
                <td><?php echo $value->phone ;?></td>
                <td><?php echo $value->description;?></td>
                <td><?php echo date('Y-m-d',strtotime($value->created_at));?></td>
                
                
            </tr>
            <?php   } } ?>
            
            
        </tbody>
        
    </table>



    
</div>



<!--Modal-->
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="categoryform">
            
        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Category">Category</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <select id="sel_category" class="form-control">
                 <option value="">- Select -</option>
             </select>
            <div id="sel_category_err" class="text-red"></div>
          </div>
        </div>
        
        
        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Category">Title</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" placeholder="Enter Title" value="">
            <div id="title_err" class="text-red"></div>
          </div>
        </div>
        

        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Description">Description</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <textarea class="form-control" id="description" name="description" placeholder="Enter Description" value="" ></textarea>
            <div id="description_err" class="text-red"></div>
          </div>
        </div>
        
         <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Description">Images</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <input type="file" id="upload_image" name="upload_image[]" multiple="true" onchange="preview_image();">
            
          </div>
          
          <div class="row" id="show_image">  </div> 
          <div id="upload_image_err" class="text-red"></div>
        </div>
        


        
        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="status">Status</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             
             <div class="form-group inline-block radio-active"> 
             <input type="radio" name="status"  value="1" checked><label class="label-status">Active</label>
              </div> 
             <div class="form-group inline-block radio-inactive">
            <input type="radio" name="status" value="0"><label class="label-status">Inactive</label>
             </div>
            <div id="status_err" class="text-red"></div>
          </div>
        </div>


        </form>
        <div id="saveMsg" class="text-green"></div>
      </div>

      <div class="modal-footer">
        <button type="button" id="save" onclick="addCategory()" class="btn btn-primary float-right">Save</button>
      </div> 
    </div>
  </div>
</div>
<!--End Modal-->

<!--Update Article-->

<div class="modal fade" id="editPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.location.reload();">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="updateArticleForm">
         <input type="hidden" id="article_id">  
        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Category">Category</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <select id="update_sel_category" class="form-control">
                 <option value="">- Select -</option>
             </select>
            <div id="update_sel_category_err" class="text-red"></div>
          </div>
        </div>
        
        
        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Category">Title</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <input type="text" class="form-control" name="update_title" id="update_title" aria-describedby="emailHelp" placeholder="Enter Title" value="">
            <div id="update_title_err" class="text-red"></div>
          </div>
        </div>
        

        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Description">Description</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <textarea class="form-control" id="update_description" name="update_description" placeholder="Enter Description" value="" ></textarea>
            <div id="update_description_err" class="text-red"></div>
          </div>
        </div>
        
         <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Description">Images</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <input type="file" id="update_upload_image" name="update_upload_image[]" multiple="true" onchange="update_preview_image();">
            
          </div>
          
          <div class="row" id="update_show_image">  </div> 
          <div id="update_upload_image_err" class="text-red"></div>
        </div>
    


        </form>
      </div>

      <div class="modal-footer">
        <button type="button" id="update" onclick="updateArticle()" class="btn btn-primary float-right">Update</button>
      </div> 
    </div>
  </div>
</div>
<!--End Modal-->
<!--End Update Article-->



<!--View Article-->

<div class="modal fade" id="viewPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.location.reload();">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="viewArticleForm">
           
        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Category">Category</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <input type="text" id="view_sel_category" class="form-control">
          </div>
        </div>
        
        
        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Category">Title</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <input type="text" class="form-control" name="view_title" id="view_title" aria-describedby="emailHelp" placeholder="Enter Title" value="">
          </div>
        </div>
        

        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Description">Description</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <textarea class="form-control" id="view_description" name="view_description" placeholder="Enter Description" value="" ></textarea>
    
          </div>
        </div>
        
         <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Description">Images</label>
          </div>
          <div class="row" id="view_show_image">  </div> 

        </div>
    


        </form>
      </div>
    </div>
  </div>
</div>

<!--End View Article-->


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/js/article.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable();
} );


</script>
<script>
  $(function() {
    $('#toggle-two').bootstrapToggle({
      on: 'Enabled',
      off: 'Disabled'
    });
  })
</script>
