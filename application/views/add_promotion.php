<!-- this link for multiple selection-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Promotions</h1><small>New Promotions</small>
          </div>
        </div>
      </div><!-- /.container-fluid --> 
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card" style="border-radius: 15px">
              
              <!-- /.card-header -->
              <div class="card-body">
                <form id="add_promotion" action="<?= base_url('admin/welcome/post_add_promotion')?>" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">             
                <div class="form-group ">
                    <label for="name" class="col-sm-6 control-label">Name <i class="required">*</i>
                    </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name Max Length : 100." value="">
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group ">
                    <label for="name_mandarin" class="col-sm-6 control-label">Name Mandarin 
                    </label>
                      <div class="col-sm-12">
                          <input type="text" class="form-control" name="name_mandarin" id="name_mandarin" placeholder="Name Mandarin" value="">
                          <small class="info help-block">
                          </small>
                      </div>
                </div>
                </div>
                </div>
                 <div class="row">
                   <div class="col-md-4">
                   <div class="form-group ">
                    <label for="image" class="col-sm-6 control-label">Image 
                    <i class="required">*</i>
                    </label>
                      <div class="col-sm-12">
                          <div id="promotions_image_galery"></div>
                          <input type="file" name="files[]" multiple required="">
                          <small class="info help-block">
                          </small>
                      </div>
                  </div>
                  </div>
                  <?php if($this->session->userdata('branch_id')==null){?>
                    <div class="col-md-4">
                <div class="form-group ">
                    <label for="branch" class="col-sm-6 control-label">Branch Name
                    <i class="required">*</i>
                    </label>
                      <div class="col-sm-12">
                          <select  class="form-control" name="branch" id="branch" data-placeholder="Select Branch">
                            <option></option>
                        <?php foreach($branch as $branches): ?>
                        <option value="<?= $branches['id']?>"><?= $branches['branch_name']?></option>
                      <?php endforeach; ?>         
                          </select>
                      </div>
                </div>   
                </div>
                 <?php } else { ?>
                  <div class="col-md-4">
                <div class="form-group ">
                    <label for="branch" class="col-sm-6 control-label">Branch Name
                    <i class="required">*</i>
                    </label>
                      <div class="col-sm-12">
                          <input type="text" name="branch" class="form-control" value="<?= $name; ?>" readonly>
                          <input type="hidden" name="branch" value="<?php echo $this->session->userdata('branch_id')?>">
                      </div>
                </div>  
                </div>
                <?php } ?> 
                <div class="col-md-4">                                 
                 <div class="form-group ">
                    <label for="price" class="col-sm-6 control-label">Price 
                    <i class="required">*</i>
                    </label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="price" id="price" placeholder="Price Max Length : 100." value="">
                    </div>
                </div>
                </div>     
                </div>           
                  <!--Targeted Service-->
              <h5>Target Service</h5>
              <div class="row">
                <div class="col-md-4">
                
              <div class="form-check">
                  <input class="form-check-input targetService" type="radio" name="target_service" id="" some="all">
                  <label class="form-check-label" for="all_service">
                    All Sevices
                  </label>
                  <input  class="aService" type="hidden" name="service[]" id="" value="all service">
                </div>
                </div>
                <div class="col-md-4">
                <div class="form-check">
                  <input class="form-check-input targetService" type="radio" name="target_service" some="some_service" id="someService">
                  <label class="form-check-label" for="some_service">
                    Some Service
                  </label>
                  
                </div>
                <div id="some_service" style="display: none;">
                <div class="col-sm-12">
                  <select class="form-control chosen chosen-select sService" name="service[]" multiple>
                  <?php foreach ($service as $services) { ?>
                      <option value="<?php echo $services['id']; ?>"><?php echo $services['service_name']; ?>
                      </option>
                  <?php } ?>
                  </select>

                 </div>  
                </div>
                </div>
                <div class="col-md-4"> 
                <div class="form-check">
                  <input class="form-check-input  targetService" type="radio" name="target_service" id="" some="category_service">
                  <label class="form-check-label" for="category_service">
                    Category Service
                  </label>
                </div>
                <div id="category_service" style="display: none;">
                <div class="col-sm-12"><select  class="form-control chosen chosen-select cService" name="service[]" id="category" data-placeholder="Select Service Category" multiple><?php foreach($category as $categorys): ?><option value="<?= $categorys['id']?>"><?= $categorys['category_name']?></option><?php endforeach; ?></select></div>
                </div>
                </div>
                </div><br><br>      
                
                <!--Targeted User-->
              <h5>Target User</h5>
              <div class="row">
                <div class="col-md-3">  
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="target_user" id="all_user" user="all">
                  <label class="form-check-label" for="all_user">
                    All Users
                  </label>
                  <input  class="aUser" type="hidden" name="customer[]" id="" value="all user">
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="target_user" id="" user="some">
                  <label class="form-check-label" for="some_user">
                    Some users
                  </label>
                </div>
                <div id="some_user" style="display: none;">
                <div class="col-sm-12">
                  <select class="form-control chosen chosen-select sUser" name="customer[]" multiple>
                  <?php foreach ($customer as $customers) { ?>
                      <option value="<?php echo $customers['id']; ?>"><?php echo $customers['first_name'].' '.$customers['last_name']; ?>
                      </option>
                  <?php } ?>
                  </select>

                 </div>  
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="target_user" id="new_user" user="new">
                  <label class="form-check-label" for="new_user">
                    New user
                  </label>
                  <input  class="nUser" type="hidden" name="customer[]" id="" value="New user">
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="target_user" id="" user="category">
                  <label class="form-check-label" for="category_user">
                    Category user
                  </label>
                </div>
                <div id="category_user" style="display: none;">
                <div class="col-sm-12">
                <label for="category" class="col-sm-6 control-label">Category:
                </label>
                  <select class="form-control chosen chosen-select-deselect cUser" name="customer[]" id="" data-placeholder="Select Category" >
                              <option value=""></option>
                              <option value="M">Male</option>
                              <option value="F">Female</option>
                  </select>
                  <label for="age" class="col-sm-6 control-label">Age:
                </label>
                  <select  class="form-control chosen chosen-select-deselect cUser" name="customer[]" id="" data-placeholder="Select Category" >
                              <option value=""></option>
                              <option value="18-25">18-25</option>
                              <option value="26-40">26-40</option>
                              <option value="41-60">41-60</option>
                              <option value="60+">60+</option>
                  </select>
                </div>
                </div>
                </div><br><br>
                <!--Promotion Validity-->
              <h5>Promotion Validity</h5>
              <div class="row">
                <div class="col-md-4">
                
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="promotion_validity" id="all_day" validity="all">
                  <label class="form-check-label" for="all_day">
                    All Day
                  </label>
                  <input class="aDay" type="hidden" name="duration" class="form-control" value="">
                </div>
                </div>
                <div class="col-md-4">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="promotion_validity" id="" validity="some">
                  <label class="form-check-label" for="some_day">
                    Some Day
                  </label>
                </div>
                <div id="some_day" style="display: none;">
                <input class="sDay" type="text" name="duration" class="form-control" value="">
                </div>
                </div>
                <div class="col-md-4">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="promotion_validity" id="" validity="dur">
                  <label class="form-check-label" for="duration">
                    Duration
                  </label>
                </div>
                <div id="duration" style="display: none;">
                    <div class="col-sm-12">
                            <select  class="form-control chosen chosen-select dur" name="duration"  data-placeholder="Select Duration" >
                              <option value="30">30 minutes</option>
                              <option value="60">60 minutes</option>
                              <option value="90">90 minutes</option>
                              <option value="120">120 minutes</option>
                            </select>
                    </div>
                  </div>  
                </div>
                </div>
                  <div class="form-group ">
                      <label for="details" class="col-sm-2 control-label">Details 
                      <i class="required">*</i>
                      </label>
                        <div class="col-sm-8">
                            <textarea id="details" name="details" rows="5" cols="80" class=""></textarea>
                            <small class="info help-block">
                            <b>Input Details</b> Max Length : 250.</small>
                        </div>
                  </div>
                                                 
                  <div class="form-group ">
                      <label for="details_mandarin" class="col-sm-2 control-label">Details Mandarin 
                      </label>
                      <div class="col-sm-8">
                          <textarea id="details_mandarin" name="details_mandarin" rows="5" cols="80" class=""></textarea>
                          <small class="info help-block">
                          </small>
                      </div>
                  </div>
                                                 
                  <div class="form-group ">
                    <label for="validity" class="col-sm-2 control-label">Validity 
                    <i class="required">*</i>
                    </label>
                      <div class="col-sm-8">
                          <textarea id="validity" name="validity" rows="5" cols="80"></textarea>
                          <small class="info help-block">
                          </small>
                      </div>
                  </div>
                                                 
                  <div class="form-group ">
                      <label for="validity_mandarin" class="col-sm-2 control-label">Validity Mandarin 
                      </label>
                      <div class="col-sm-8">
                          <textarea id="validity_mandarin" name="validity_mandarin" rows="5" cols="80"></textarea>
                          <small class="info help-block">
                          </small>
                      </div>
                  </div>
                  <div class="row">     
                      <div class="col-md-6">                       
                      <div class="form-group ">
                        <label for="status" class="col-sm-6 control-label">Status 
                        <i class="required">*</i>
                        </label>
                        <div class="col-sm-12">
                              <select  class="form-control chosen chosen-select" name="status" id="status" data-placeholder="Select Status" >
                                <option value=""></option>
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                              </select>
                            <small class="info help-block">
                            </small>
                        </div>
                      </div>
                      </div> 
                      <div class="col-md-6">                        
                      <div class="form-group ">
                        <label for="priority" class="col-sm-6 control-label">Priority 
                        </label>
                          <div class="col-sm-12">
                              <input type="text" class="form-control" name="priority" id="priority" placeholder="Priority" value="">
                              <small class="info help-block">
                              </small>
                          </div>
                      </div>
                      </div>  
                  </div> 

                      <input type="submit" class="btn btn-primary btn-custom" value="submit" style="width:150px;">
              </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
 </div> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
   $("[name=target_service]").click(function(){
     $("#some_service").toggle($("[name=target_service]").index(this)===1);
     var x =$(this).attr('some');
     //alert(x);
     if(x=="some_service")
     {
       //$("#category_service").html('');
       $('.aService').attr('disabled', true);
       $('.cService').attr('disabled', true);
       $(".sService").removeAttr("disabled");

     }
     else if(x=="category_service"){
      $('.sService').attr('disabled', true);
      $('.aService').attr('disabled', true);
      $(".cService").removeAttr("disabled");
     }
     else if(x=="all"){
      $('.sService').attr('disabled', true);
      $('.cService').attr('disabled', true);
      $(".aService").removeAttr("disabled");
     }
     $("#category_service").toggle($("[name=target_service]").index(this)===2);
   })
   $("[name=target_user]").click(function(){
     var y =$(this).attr('user');
     if(y=='all'){
      $('.sUser').attr('disabled', true);
      $('.cUser').attr('disabled', true);
      $('.nUser').attr('disabled', true);
      $(".aUser").removeAttr("disabled");
     }
     else if(y=='some'){
      $('.aUser').attr('disabled', true);
      $('.cUser').attr('disabled', true);
      $('.nUser').attr('disabled', true);
      $(".sUser").removeAttr("disabled");
     }
     else if(y=='new'){
      $('.aUser').attr('disabled', true);
      $('.cUser').attr('disabled', true);
      $('.sUser').attr('disabled', true);
      $(".nUser").removeAttr("disabled");
     }
     else{
      $('.aUser').attr('disabled', true);
      $('.nUser').attr('disabled', true);
      $('.sUser').attr('disabled', true);
      $(".cUser").removeAttr("disabled");
     }
     $("#some_user").toggle($("[name=target_user]").index(this)===1);
     $("#category_user").toggle($("[name=target_user]").index(this)===3);
   })
   $("[name=promotion_validity]").click(function(){
    var z =$(this).attr('validity');
     if(z=="all")
     {
       $('.dur').attr('disabled', true);
       $('.sDay').attr('disabled', true);
       $(".aDay").removeAttr("disabled");
     }
     else if(z=="some")
     {
       $('.dur').attr('disabled', true);
       $('.aDay').attr('disabled', true);
       $(".sDay").removeAttr("disabled");
     }
     else
     {
       $('.sDay').attr('disabled', true);
       $('.aDay').attr('disabled', true);
       $(".dur").removeAttr("disabled");
     }
     $("#some_day").toggle($("[name=promotion_validity]").index(this)===1);
     $("#duration").toggle($("[name=promotion_validity]").index(this)===2);
   })
  })
  
 </script>  
 <script>
      $(".chosen-select").chosen({
  no_results_text: "Oops, nothing found!"
})
  </script>