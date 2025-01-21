<?php //echo $_SERVER['REQUEST_URI'];die;?>
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
    .ck-editor__editable {
   
    min-height: 150px;
}
.ck-rounded-corners .ck.ck-balloon-panel, .ck.ck-balloon-panel.ck-rounded-corners {
    z-index: 10055 !important;
}

</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
        <small>Control panel</small>
      </h1>
      
    <div class="row">
    <div class="col-lg-12 margin-tb text-right">
      <div>
        <input class="btn btn-primary float-right mr-4" type="button" value="Add Article" data-toggle="modal" data-target="#addCategoryModal" onclick="getCategoryValue();">
      </div>
    </div>
  </div>
    </section>
    
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>S.no</th>
                <th>Title</th>
                <!--<th>Article Image</th>-->
                <th>Section</th>
                <th>Selected Categories</th>
                <th>Published Date</th>
                <!--<th>View</th>-->
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            
            <?php  if(isset($article)) { $i=1; foreach($article as $key => $value) { //echo '<pre>';print_r($value);die;?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $value['article_data']->title;?></td>
                <?php if(!empty($value['article_data']->image_name)){
                    ?>
                        <!--<td style="text-align:center;"><img src="<?php echo base_url().$value['article_data']->image_url.'/'.$value['article_data']->image_name;?>" width="130px"></td>     -->
                    <?php
                } else {
                    ?>
                        <!--<td>Image not available</td>-->
                    <?php
                }?>
                <td><?php echo $value['article_data']->section;?></td>
                <!--<td><?php //echo $value['categories']->category_name;?></td>-->
                <td>
                    <ul>
                    <?php foreach($value['categories'] as $val){
                        ?>
                        <li><?php echo $val->category_name;?></li>
                        <?php
                        //print_r($val->category_name);die;
                    }?>
                    </ul>
                </td>
                <td><?php echo date('F j, Y',strtotime($value['article_data']->published_date));?></td>
                <!--<td>-->
                <!--    <label class="switch">-->
                <!--     <input type="checkbox" id="togBtn_<?php echo $value['article_data']->id;?>" onclick="updateStatus('<?php echo $value['article_data']->id;?>');" name="disableYXLogo" <?php if($value['article_data']->status==1){ echo 'checked'; } ?>> -->
                <!--     <div class="slider round"></div>-->
                <!--     </label>-->
                <!--</td>-->
                <!--<td class="action-type text-center">-->
                <!--    <i class="fa fa-eye" aria-hidden="true" data-toggle="modal" data-target="#viewPostModal" data-keyboard="false" data-backdrop="static" onclick="viewArticle('<?php echo $value['article_data']->id;?>');"></i>-->
                <!--</td>-->
                
                
                <td class="action-type text-center">
                    <i class="fa fa-edit" aria-hidden="true" id="<?php echo $value['article_data']->id;?>" data-toggle="modal" data-target="#editPostModal" data-keyboard="false" data-backdrop="static" onclick="editArticle('<?php echo $value['article_data']->id;?>');"></i>
                </td>
                <td class="action-type text-center">
                    <i class="fa fa-trash pointer" aria-hidden="true" onclick="deleteposts('<?php echo $value['article_data']->id;?>')"></i>
                </td>
                
            </tr>
            <?php  $i++; } } ?>
            
            
        </tbody>
        
    </table>



    
</div>



<!--Modal-->
<div class="modal fade" id="addCategoryModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="post_outer ">
            <span class="post_loader show"></span>
        </div>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="refreshModalArticle();">
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
             <select id="sel_category" multiple class="form-control">
                 <!--<option value="">- Select -</option>-->
             </select>
            <div id="sel_category_err" class="text-red"></div>
          </div>
        </div>
        
        
        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Category">Section</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <select id="sel_section" class="form-control" onchange="getlocation(this.value)">
                 <!--<option value="">- Select -</option>-->
                 <option value="Article">Article</option>
                 <option value="Cover Story">Cover Story</option>
                 <option value="Update">Update</option>
             </select>
            <div id="sel_section_err" class="text-red"></div>
          </div>
        </div>
        
        <div class="row form-group up_location" style="display:none;">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Category">Location</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
                <select class="form-control" name="up_location" id="up_Location">
                <option>Select Location</option>
                <?php foreach($state_data as $key => $value){
                ?>
                    <option value="<?php echo $value->id;?>"><?php echo $value->state_name;?></option>
                <?php
                }?>
                </select>
             <!--<input type="text" class="form-control" name="up_Location" id="up_Location" aria-describedby="emailHelp" placeholder=" Enter Location">-->
            <div id="up_Location_err" class="text-red"></div>
          </div>
        </div>
        
        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Category">Title</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" placeholder="Enter Title">
            <div id="title_err" class="text-red"></div>
          </div>
        </div>
        
        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Description">Small Description</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <textarea class="form-control" id="small_description" name="small_description" placeholder="Enter Small Description"></textarea>
            <div id="small_description_err" class="text-red"></div>
          </div>
        </div>
        
        
        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Description">Description</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <textarea class="form-control description" id="description" name="description_add" placeholder="Enter Description" col="10"></textarea>
            <div id="description_add_err" class="text-red"></div>
          </div>
        </div>
        
         <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Description">Images</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <input type="file" id="upload_image" name="upload_image"  onchange="preview_image();">
            
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
            <div class="row" id="show_image">  </div> 
            </div>
          <div id="upload_image_err" class="text-red"></div>
        </div>
        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Source">Alt Tag</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <input class="form-control" id="alt_tag" name="alt_tag" placeholder="Enter Image Name Like Image" value="" />
            <div id="alt_tag_err" class="text-red"></div>
          </div>
        </div>
        
        
        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Source">Source</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <textarea class="form-control" id="Source" name="Source" placeholder="Enter Source" value="" ></textarea>
            <div id="Source_err" class="text-red"></div>
          </div>
        </div>
        
        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Video">Video</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <textarea class="form-control" id="Video" name="Video" placeholder="Enter Embedded video URL" value="" ></textarea>
            <div id="Video_err" class="text-red"></div>
          </div>
        </div>
        
          <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Meta Title">Meta Title</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <input class="form-control" id="meta_title" name="meta_title" placeholder="Enter Title" value="" />
            <div id="meta_title_err" class="text-red"></div>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Meta Keyword">Meta Keyword</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <input class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Enter Comma seprated Keywords like Value1,value,2" value="" />
            <div id="meta_keywords_err" class="text-red"></div>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Meta Description">Meta Short Description</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <textarea class="form-control" id="meta_descripion" name="meta_description" placeholder="Enter Meta Short Description" value="" ></textarea>
            <div id="meta_description_err" class="text-red"></div>
          </div>
        </div>
        
        <!--<div class="row form-group">-->
        <!--  <div class="col-md-3 col-sm-3 col-lg-3"> -->
        <!--    <label for="Meta Description">Add Twitter Embed Code</label>-->
        <!--  </div>-->
        <!--  <div class="col-md-9 col-sm-9 col-lg-9">-->
        <!--     <textarea class="form-control" id="embed_code" name="embed_code" placeholder="Add Twitter Embed Code" value="" ></textarea>-->
        <!--    <div id="embed_code_err" class="text-red"></div>-->
        <!--  </div>-->
        <!--</div>-->
        
        <div class="row form-group">
            <div class="col-md-3 col-sm-3 col-lg-3"> 
                <label for="Category">Published Date</label>
            </div>
            <div class="col-md-9 col-sm-9 col-lg-9">
                <input type="date" class="form-control" name="published_date" id="published_date" aria-describedby="published_date" placeholder="Select Published Date">
                <div id="published_date_err" class="text-red"></div>
            </div>
        </div>
        
        <div class="row form-group">
            <div class="col-md-3 col-sm-3 col-lg-3"> 
                <label for="Category">Post By</label>
            </div>
            <div class="col-md-9 col-sm-9 col-lg-9">
                <input type="text" class="form-control" name="post_by" id="post_by" aria-describedby="post_by" placeholder="Enter Post By">
                <!--<div id="post_by_err" class="text-red"></div>-->
            </div>
        </div>

        
        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="status">Status</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             
             <div class="form-group  radio-active"> 
                <span class="inline-block">
                    <input type="radio" name="status"  value="1" checked><label class="label-status" style="padding-left:5px">Active</label>
                </span>
                <span class="inline-block" style="margin-left:10px;">
                    <input type="radio" name="status" value="0"><label class="label-status" style="padding-left:5px">Inactive</label>
                </span>
             
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

<div class="modal fade" id="editPostModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
         <div class="post_outer ">
            <span class="post_loader show"></span>
        </div>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="refreshModal();">
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
             <select id="update_sel_category" class="form-control" multiple>
             </select>
            <div id="update_sel_category_err" class="text-red"></div>
          </div>
        </div>
        
        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Category">Section</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <select id="update_sel_section" class="form-control" onchange="getlocation(this.value)">
                 <option value="">- Select -</option>
                 <option value="Article">Article</option>
                 <option value="Cover Story">Cover Story</option>
                 <option value="Update">Update</option>
             </select>
            <div id="update_sel_section_err" class="text-red"></div>
          </div>
        </div>
        
        
        <div class="row form-group up_location" style="display:none;">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Category">Location</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
            <select class="form-control" name="update_Location" id="update_Location"></select>
             <!--<input type="text" class="form-control" name="update_Location" id="update_Location" aria-describedby="emailHelp" placeholder=" Enter Location">-->
            <div id="update_Location_err" class="text-red"></div>
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
            <label for="Description">Small Description</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <textarea class="form-control" id="update_small_description" name="update_small_description" placeholder="Enter Small Description"></textarea>
            <div id="update_small_description_err" class="text-red"></div>
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
             <input type="file" id="update_upload_image" name="update_upload_image" onchange="update_preview_image();">
            
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
            <div class="row" id="update_show_image">  </div> 
          </div>
          <div id="update_upload_image_err" class="text-red"></div>
        </div>
        
         <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Source">Alt Tag</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <input class="form-control" id="update_alt_tag" name="update_alt_tag" placeholder="Enter Image Name Like Image" value="" />
            <div id="update_alt_tag_err" class="text-red"></div>
          </div>
        </div>
    
        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Source">Source</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <textarea class="form-control" id="update_Source" name="update_Source" placeholder="Enter Source" value="" ></textarea>
            <div id="update_Source_err" class="text-red"></div>
          </div>
        </div>
        
        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Video">Video</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <textarea class="form-control" id="update_Video" name="update_Video" placeholder="Enter Embedded video URL" value="" ></textarea>
            <div id="update_Video_err" class="text-red"></div>
          </div>
        </div>
        
         <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Meta Title">Meta Title</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <input class="form-control" id="update_meta_title" name="update_meta_title" placeholder="Enter Title" value="" />
            <div id="update_meta_title_err" class="text-red"></div>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Meta Keyword">Meta Keyword</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <input class="form-control" id="update_meta_keywords" name="update_meta_keywords" placeholder="Enter Comma seprated Keywords like Value1,value,2" value="" />
            <div id="update_meta_keywords_err" class="text-red"></div>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Meta Description">Meta Description</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <textarea class="form-control" id="update_meta_descripion" name="update_meta_description" placeholder="Enter Meta Description" value="" ></textarea>
            <div id="update_meta_description_err" class="text-red"></div>
          </div>
        </div>
        
        <div class="row form-group">
            <div class="col-md-3 col-sm-3 col-lg-3"> 
                <label for="Category">Published Date</label>
            </div>
            <div class="col-md-9 col-sm-9 col-lg-9">
                <input type="date" class="form-control" name="update_published_date" id="update_published_date" aria-describedby="update_published_date">
                <div id="update_published_date_err" class="text-red"></div>
            </div>
        </div>
        
        <div class="row form-group">
            <div class="col-md-3 col-sm-3 col-lg-3"> 
                <label for="Category">Post By</label>
            </div>
            <div class="col-md-9 col-sm-9 col-lg-9">
                <input type="text" class="form-control" name="update_post_by" id="update_post_by" aria-describedby="update_post_by" placeholder="Enter Post By">
                <!--<div id="post_by_err" class="text-red"></div>-->
            </div>
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
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="refreshModal();">
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
              <textarea class="form-control" id="view_sel_category" name="view_sel_category"></textarea>
          </div>
        </div>
        
        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Category">Section</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <input type="text" class="form-control" name="view_section" id="view_section" aria-describedby="emailHelp" placeholder="Enter section" value="">
          </div>
        </div>
        
        <div class="row form-group up_location" style="display:none;">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Category">Location</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <input type="text" class="form-control" name="Location" id="Location" aria-describedby="emailHelp" placeholder=" Enter Location">
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
            <label for="Description">Small Description</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <textarea class="form-control" id="view_small_description" name="view_small_description" placeholder="Enter Small Description"></textarea>
            <div id="view_small_description_err" class="text-red"></div>
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
          <div class="col-lg-12 col-sm-12 col-md-12">
          <div class="row" id="view_show_image">  </div> 
            </div>
        </div>
    
        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Category">Source</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <textarea class="form-control" id="view_source" name="view_source" placeholder="Enter Source" value="" ></textarea>
          </div>
        </div>
        
        
        
        <div class="row form-group">
          <div class="col-md-3 col-sm-3 col-lg-3"> 
            <label for="Category">Video</label>
          </div>
          <div class="col-md-9 col-sm-9 col-lg-9">
             <textarea class="form-control" id="view_video" name="view_video" placeholder="Enter Embedded video URL" value="" ></textarea>
          </div>
        </div>


        </form>
      </div>
    </div>
  </div>
</div>

<!--End View Article-->




<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
});

/*CKEDITOR.replace( 'description_add', {
toolbar: [
'/',
{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
{ name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
'/',
{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
{ name: 'others', items: [ '-' ] },
]
});

CKEDITOR.replace( 'update_description', {
toolbar: [
'/',
{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
{ name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
'/',
{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
{ name: 'others', items: [ '-' ] },
]
});

CKEDITOR.replace( 'view_description', {
toolbar: [
'/',
{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
{ name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
'/',
{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
{ name: 'others', items: [ '-' ] },
]
});*/

var myEditor;
ClassicEditor
.create( document.querySelector( '#description' ), {
    ckfinder: {
			uploadUrl: 'assets/ckeditor5-build-classic/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
		}
})
.then( editor_jai => {
// console.log( editor );
myEditor = editor_jai;

} )
.catch( error => {
// console.error( error );
} );


/*Edit Article CKEditor JS*/
var myEditorEdit;
ClassicEditor
.create( document.querySelector( '#update_description' ) , {
    ckfinder: {
			uploadUrl: 'assets/ckeditor5-build-classic/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
		}
})
.then( myEditor_Edit => {
// console.log( editor );
myEditorEdit = myEditor_Edit;
} )
.catch( error => {
// console.error( error );
} );


// $( '#addCategoryModal' ).modal( {
//     focus: false
// } );



</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/js/article.js"></script>

