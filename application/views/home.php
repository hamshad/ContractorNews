<?php 

//phpinfo();
//echo '<pre>';print_r($allActiveUpdateArticles);die;?>
    <div class="container container-sm clearfix">
      <div class="row h-75">
        <div class="col-12 col-md-12 box1">
          <div class="col-12 col-md-12 col-lg-12 demo box1-1 py-3">
              <div class="owl-carousel owl-theme article">
                  <?php if(!empty($allActiveCoverStroyArticles)){foreach($allActiveCoverStroyArticles as $cover_story){
                      // $title_url = strtolower(preg_replace('/[ ]+/', '-', $cover_story->title));
                      $title_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $cover_story->title)));
                      //echo '<pre>';print_r($cover_story);die;
                  ?>
                      <div class="item">
                          <div class="new_box">
                              <h3 class="title font-weight-bold"><a href="<?php echo base_url().$cover_story->id.'/'.urlencode($title_url);?>"><?php echo $cover_story->title;?></a></h3>
                              
                               <h5 class="" style="font-size:16px; text-decoration:none; text-align:center;color:#000;">
                                   <a href="<?php echo base_url().$cover_story->id.'/'.urlencode($title_url);?>" style=" text-decoration:none; text-align:center;color:#000;">
                                       <?php //echo substr($cover_story->description, 0, 200);?>
                                       <?php echo $cover_story->small_description;?>
                                       </a>
                                </h5>
                              <h3 class="date"><a href="<?php echo base_url().$cover_story->id.'/'.urlencode($title_url);?>"><?php echo date("F j, Y", strtotime($cover_story->published_date));?></a></h3>
                              <div class="box-image" style="">
                                  <a href="<?php echo base_url().$cover_story->id.'/'.urlencode($title_url);?>">
                                     <img src="<?php echo base_url().$cover_story->image_url.'/'.$cover_story->image_name;?>" alt="<?php echo $cover_story->alt_tag; ?>" style="height:100%;">
                                  </a>
                              </div>
                               <!--<small>Source/Credit</small>-->
                              <!--<div class="description">-->
                              <!--    <p><?php echo $cover_story->description;?></p>-->
                              <!--</div>-->
                          </div>
                      </div> 
                  <?php
                  }} else {
                  ?>
                      <div class="item">
                          <div class="new_box">
                              <p style="text-align:center;">
                                  No record available! Please check again later.
                              </p>
                          </div>
                      </div>
                  <?php
                  }?>
              </div>
          </div>
          <!--<div class="col-12 col-md-12 col-lg-2 px-0 pl-0 pl-lg-2 box1-2">-->
          <!--     <div class="d-flex flex-column h-100">-->
          <!--      <div class="h100 demo"><span>Box 1.2</span></div>-->
          <!--      <div class="h100 demo mt-2"><span>Box 1.3</span></div>-->
          <!--     </div>-->
          <!--</div>-->
        </div>
      </div>
      <div class="row h-75 mt-3">
        <div class="col-12 col-md-12 col-lg-12  box1 box-2">
          <div class="col-12 col-md-12 col-lg-6 demo box1-1" >
              <div style="border-bottom: 2px solid #000;">
                  <h3 class="box_heading">More Articles</h3>
                  <a href="<?php echo base_url();?>search?section=article" class="article_more">See All</a>
              </div>
              <div class="overflow_div">
                  <table class="table table-bordered table-striped construct" style="table-layout:fixed;     overflow: hidden;">
                  <thead class="thead-dark">
                      <!--<tr>-->
                      <!--    <th style="width:70%">Title</th>-->
                      <!--    <th style="width:30%">Date</th>-->
                      <!--</tr>-->
                  </thead>
                  <tbody class="construct-tbody">
                      <?php foreach($allActiveArticles as $article){
                          $title_url = strtolower(preg_replace('/[ ]+/', '-', $article->title));
                      ?>
                          <tr>
                              <td  class="construct-tbody-image" style="font-size:15px;"><a href="<?php echo base_url().$article->id.'/'.urlencode($title_url);?>"><?php echo $article->title?></a></td>
                              <td style="padding:0px;"><img style="height:74px;width:100%;"src="<?php echo base_url().$article->image_url.'/'.$article->image_name;?>" alt="<?php echo $article->alt_tag; ?>"></td>
                          </tr>
                      <?php
                      }?>
                  </tbody>
              </table>
              </div>
          </div>
          <div class="col-12 col-md-12 col-lg-6 px-0 pl-0 pl-lg-2 box1-2 box-2">
               <div class="d-flex flex-column">
                <div class="demo">
                    <div style="border-bottom: 2px solid #000;">
                        <h3 class="box_heading ">Gov't Cert Updates</h3>
                        <a href="<?php echo base_url();?>search?section=update" class="article_more">See All</a>
                    </div>
                    <div class="overflow_div">
                  <table class="table table-bordered table-striped construct" style="table-layout:fixed;     overflow: hidden;">
                  <thead class="thead-dark">
                      <!--<tr>-->
                      <!--    <th style="width:25%">Location</th>-->
                      <!--    <th style="width:50%">Title</th>-->
                      <!--    <th style="width:25%">Date</th>-->
                      <!--</tr>-->
                  </thead>
                  <tbody class="construct-tbody">
                      <?php foreach($allActiveUpdateArticles as $update){
                          // echo '<pre>';print_r($update);die;
                          // $title_url = strtolower(preg_replace('/[ ]+/', '-', $update->title));
                          $title_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $update->title)));
                      ?>
                          <tr>
                              
                              <td class="construct-tbody-heading" ><a href="<?php echo base_url().$update->id.'/'.urlencode($title_url);?>"><?php echo $update->title?></a></td>
                              <td><p><?php $location = !empty($update->state_short_name) ? $update->state_short_name : "NA"; echo $location;?></p></td>
                             
                          </tr>
                      <?php
                      }?>
                  </tbody>
              </table>
              </div>
                </div>
               </div>
          </div>
        </div>
      </div>
      <div class="row h-25 mt-3" style="display:none;">
        <div class="col-sm-12 col-md-12">
          <div class="demo box-3">
              <h3 class="box_heading">Contractor Calendar</h3>
              <div class="overflow_div">
                  <?php if(!empty($allEventData)){
                      ?>
                      <table class="table table-bordered table-striped construct">
                          <thead class="thead-dark">
                          <tr>
                              <th style="width:20%">Location</th>
                              <th style="width:20%">Date</th>
                              <th style="width:60%">Title</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php
                          foreach($allEventData as $event){
                              // print_r($event);die;
                              // echo 'shavnam'.$event->id;die;
                          ?>
                              <tr>
                                  <td><?php $location = !empty($event->state_short_name) ? $event->state_short_name : "Not Disclosed"; echo $location;?></td>
                                  <td><?php echo date("F j, Y", strtotime($event->event_start_date));?></td>
                                  <td onclick='getCalendarEventData("<?php echo $event->id;?>");' style="cursor:pointer;"><?php echo urlencode($event->event_title);?></td>
                              </tr> 
                          <?php
                      }?>
                          </tbody>
                      </table>
                      <?php
                  }else {
                  ?>
                      <p style="text-align:center;">
                          No record available! Please check again later.
                      </p>
                  <?php
                  }?>
              </div>
        </div>
         </div>
      </div>
    </div>
    
    
      <div id="event_modal_data" class="modal fade" role="dialog" aria-labelledby="silverPackageModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
              <div class="modal-content">
                  <div class="modal-header d-flex align-items-center" style="background-color : #223a4b">
                      <h4 class="modal-title" style="font-weight:bold;color:#34bebd" ><i class="fa fa-calendar" aria-hidden="true"></i> EVENT DETAILS</h4>
                      <button type="button" class="close" style="color:#34bebd" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body px-5 py-4">
                      <div class="form-group">
                              <label class="col-form-label">Event Title</label>
                              <input class="form-control" type="text" id="view_title" value="">
                              <!--<span id="view_title"></span>-->
                          </div>
                          <div class="form-group">
                              <label class="col-form-label">Event Description</label>
                              <textarea class="form-control" id="view_description" rows="8"></textarea>
                          </div>
                          
                          <div class="form-row">
                              <div class="form-group col-md-6">
                                  <label for="event_location" class="col-form-label">Event Location</label>
                                  <input class="form-control" type="text" id="view_event_location" value="">
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="event_type" class="col-form-label">Event Type</label>
                                  <input class="form-control" id="view_event_type" value="">
                              </div>
                          </div>
                          
                          <div class="form-row">
                              <div class="form-group col-md-6">
                                  <label for="event_start_date" class="col-form-label">Event Start Date & Time</label>
                                  <input class="form-control" type="text" id="view_start_date" value="">
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="event_end_date" class="col-form-label">Event End Date & Time</label>
                                  <input class="form-control" id="view_end_date" value="">
                              </div>
                          </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color : #ffc107">Close</button>
                      <!--<button type="button" class="btn btn-primary" id="event_create">Publish Event</button>-->
                  </div>
              </div>
          </div>
      </div>
  <script>
      var baseURL = '<?php echo base_url();?>';
      
      function getCalendarEventData(event_id){
          $.ajax({
              url     :   baseURL+'getEventData/'+event_id,
              method  :   'GET',
              success: function(response) {
                  // console.log(response);
                  var res = JSON.parse(response);
                  // console.log(res.data);
                  if(res.st === parseInt(1)){
                      $("#event_modal_data").modal('show');
                      $("#view_title").val(res.data.event_title);   
                      $("#view_description").val(res.data.event_description);   
                      $("#view_event_location").val(res.data.state_name);   
                      $("#view_event_type").val(res.data.event_type);   
                      $("#view_start_date").val(res.data.event_start_date);   
                      $("#view_end_date").val(res.data.event_end_date);   
                  }
              }
          });
      }
  </script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/contact.js"></script>
  