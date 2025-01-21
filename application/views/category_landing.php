    <?php //echo '<pre>';print_r($data['search_data']['title']);die;?>
    <div class="container my-3 article_search">
      <form class="search_row py-2 px-3" action="<?php echo base_url().'category/'.strtolower(preg_replace('/[ ]+/', '-', $cat_name));?>"  method="get">
            <h2 class="mb-3 box_heading m-0">Article Search</h2>
            <div class="row  align-items-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="title" class="col-form-label col-form-label-sm">Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="<?php $title = !empty($data['search_data']['title']) ? $data['search_data']['title'] : ""; echo $title;?>">
                     </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="form-group">
                        <label for="category" class="col-form-label col-form-label-sm">Category</label>
                          <select class="form-control" name="category">
                                <option value="0">Select Category</option>
                                <option value="1" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '1'){ echo 'selected';}}?>>Disabled Veteran Businesses</option>
                                <option value="2" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '2'){ echo 'selected';}}?>>Disadvantaged Business Enterprises</option>
                                <option value="3" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '3'){ echo 'selected';}}?>>Emerging Business Enterprises</option>
                                <option value="4" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '4'){ echo 'selected';}}?>>Historically Underutilized Businesses</option>
                                <option value="5" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '5'){ echo 'selected';}}?>>Labor Union Certified Firms</option>
                                <option value="6" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '6'){ echo 'selected';}}?>>LGBTQ Owned Businesses</option>
                                <option value="7" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '7'){ echo 'selected';}}?>>Local Business Enterprises</option>
                                <option value="8" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '8'){ echo 'selected';}}?>>Minority Business Enterprises</option>
                                <option value="9" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '9'){ echo 'selected';}}?>>Minority Women Business Enterprises</option>
                                <option value="10" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '10'){ echo 'selected';}}?>>Small Business Enterprises</option>
                                <option value="11" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '11'){ echo 'selected';}}?>>Tribally Designated Entity</option>
                                <option value="12" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '12'){ echo 'selected';}}?>>Sveteran Business</option>
                                <option value="13" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '13'){ echo 'selected';}}?>>Women Business Enterprises</option>
                                <option value="14" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '14'){ echo 'selected';}}?>>Construction Management Software</option>
                                <option value="15" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '15'){ echo 'selected';}}?>>Contractor Trades</option>
                                <option value="16" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '16'){ echo 'selected';}}?>>Coronavirus Pandemic</option>
                                <option value="17" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '17'){ echo 'selected';}}?>>Cyber Security</option>
                                <option value="18" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '18'){ echo 'selected';}}?>>Department of Transportation</option>
                                <option value="19" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '19'){ echo 'selected';}}?>>Disparity Studies</option>
                                <option value="20" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '20'){ echo 'selected';}}?>>Diversity Outreach</option>
                                <option value="21" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '21'){ echo 'selected';}}?>>Economic Stimulus</option>
                                <option value="22" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '22'){ echo 'selected';}}?>>Efficiency-Improving Technology</option>
                                <option value="23" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '23'){ echo 'selected';}}?>>Entrepreneurialism</option>
                                <option value="24" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '24'){ echo 'selected';}}?>>Federal Government</option>
                                <option value="25" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '25'){ echo 'selected';}}?>>Green Economy</option>
                                <option value="26" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '26'){ echo 'selected';}}?>>Green Construction</option>
                                <option value="27" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '27'){ echo 'selected';}}?>>Health and Safety</option>
                                <option value="28" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '28'){ echo 'selected';}}?>>International</option>
                                <option value="29" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '29'){ echo 'selected';}}?>>Investment in Infrastructure</option>
                                <option value="30" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '30'){ echo 'selected';}}?>>Labor</option>
                                <option value="31" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '31'){ echo 'selected';}}?>>Local Government</option>
                                <option value="32" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '32'){ echo 'selected';}}?>>Market Watch</option>
                                <option value="33" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '33'){ echo 'selected';}}?>>Material Costs</option>
                                <option value="34" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '34'){ echo 'selected';}}?>>Mobile Technology</option>
                                <option value="35" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '35'){ echo 'selected';}}?>>Modular & Prefabricated Construction</option>
                                <option value="36" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '36'){ echo 'selected';}}?>>Monopolization</option>
                                <option value="37" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '37'){ echo 'selected';}}?>>Public-Private Partnership</option>
                                <option value="38" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '38'){ echo 'selected';}}?>>Small Business Administration</option>
                                <option value="39" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '39'){ echo 'selected';}}?>>State Government</option>
                                <option value="40" <?php if(!empty($data['search_data']['category'])){if($data['search_data']['category'] == '40'){ echo 'selected';}}?>>Tech</option>
                            </select>
                      </div>
                </div>
                
                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="form-group">
                        <label for="keyword" class="col-form-label col-form-label-sm">Section</label>
                          <select class="form-control" name="section">
                              <option>Select Section</option>
                              <option value="cover story" <?php if(!empty($data['search_data']['section'])){if($data['search_data']['section'] == 'cover story'){ echo 'selected';}}?>>Cover Story</option>
                              <option value="article" <?php if(!empty($data['search_data']['section'])){if($data['search_data']['section'] == 'article'){ echo 'selected';}}?>>Article</option>
                              <option value="update" <?php if(!empty($data['search_data']['section'])){if($data['search_data']['section'] == 'update'){ echo 'selected';}}?>>Update</option>
                          </select>
                      </div>
                </div>
                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="form-group">
                        <label for="date" class="col-form-label col-form-label-sm">Date</label>
                        <input type="date" class="form-control" id="keyword" name="date">
                     </div>
                </div>
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 text-right">
                    <button type="submit" class="btn" id="searchArt">Submit</button>
                </div>
            </div>
          </div>
      </form>
  </div>
  <div class="container container-sm clearfix">
    <div class="row h-25 mt-3 ">
      <div class="col-sm-12 col-md-12">
        <div class="demo box-3">
            <!--<h3 class="box_heading"><?php //echo ucwords($category_name);?></h3>-->
            <div class="">
                <?php if(!empty($data['student'])){
                    ?>
                        <table class="table table-bordered table-striped construct">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Date/Time</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data['student'] as $value){
                                    //print_r($value);die;
                                    $title_url = strtolower(preg_replace('/[ ]+/', '-', $value->title));
                                ?>
                                    <tr>
                                        <td><?php echo date("F j, Y", strtotime($value->published_date));?></td>
                                        <td><a href="<?php echo base_url().$value->id.'/'.$title_url;?>" style="cursor:pointer;"><?php echo $value->title;?></a></td>
                                        <td><?php echo $value->description;?></td>
                                    </tr>
                                <?php
                                }?>
                            </tbody>
                        </table>
                    <?php
                }  else {
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
    <p class="pagination"><?php echo $data['links']; ?></p>
  </div>
<script>
    var baseURL = '<?php echo base_url();?>';
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/contact.js"></script>
<script src="<?php echo base_url(); ?>assets/js/landing.js"></script>
