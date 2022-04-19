
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
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
              <div class="card-header">
                <button type="button" class="btn btn-primary btn-custom" data-bs-toggle="modal" data-bs-target="#create_branch" >Create</button>

                <!-- <button type="button" class="btn btn-primary btn-custom" data-toggle="modal" data-target="#signup" >Sign up</button> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="site-table" style="overflow: auto; height: 400px ">
                <table class="table table-bordered" style="overflow: auto; width: 800px; height: 400px; text-align: center;">
                  <thead style="background-color: #fff; color:#541728">
                  <tr>
                    <th>Branch Name</th>
                    <th>Name </th>
                    <th>Email</th>
                    <th>Address</th>
                    <!-- <th>Password</th> -->
                    <th>Contact No.</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($branch as $branches): ?>
                      <tr>
                        <td><?= $branches['branch_name']?></td>
                        <td><?= $branches['name']?></td>
                        <td><?= $branches['email']?></td>
                        <td><?= $branches['address']?></td>
                       <!--  <td><?= $branches['password']?></td> -->
                        <td><?= $branches['contact']?></td>
                        <!-- <td><?= $branches['created_at']?></td> -->
                        <td><a href="<?= base_url('admin/welcome/branch_edit/'.$branches['id'])?>" class="btn btn-default"  data-toggle="tooltip" title="Edit" style="color:#541728"><i class="fa fa-edit"></i></a> 
                         <a href="<?= base_url('')?>"><button class="btn btn-default" style="color:#541728"><i class="fas fa-toggle-on"></i></button></a></td>
                        </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
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
 <div class="modal fade" id="create_branch">
          <div class="modal-dialog">
              <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                      <h4 class="modal-title">Create Branch</h4>
                      <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                      <div class="modal-form">
                         <form method="POST" action="<?= base_url('admin/welcome/add_branch') ?>">
                          <div class="form-group">
                    <label for="">Branch Name</label>
                    <input type="text" class="form-control" id="" name="branch_name" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" id="" name="name" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" id="" name="email" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" class="form-control" id="" name="address" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="" name="password" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="">Contact No.</label>
                    <input type="text" class="form-control" id="" name="contact" placeholder="">
                  </div>
                              <input type="submit" class="btn btn-primary btn-custom" value="submit">
                        </form> 
                      </div>
                      
                  </div>

                  <!-- Modal footer -->
                  

              </div>
          </div>
 </div> 
 <div class="modal" id="signup">
          <div class="modal-dialog">
              <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                      <h4 class="modal-title">Sign Up</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                      <div class="modal-form">
                         <form method="POST" action="<?= base_url('admin/welcome/sign_up') ?>">
                          <div class="form-group">
                    <label for="exampleInputPassword1">Branch Name</label>
                  <select class="form-control" name="branch_name" multiple>
                  <?php foreach($branch as $branches): ?>
                        <option value="<?= $branches['id']?>"><?= $branches['branch_name']?></option>
                      <?php endforeach; ?> 
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" id="" name="name" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" id="" name="email" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="" name="password" placeholder="">
                  </div>
                        
                              <input type="submit" class="btn btn-success" value="submit">
                        </form> 
                      </div>
                      
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>

              </div>
          </div>
 </div> 
 <!-- <script src="<?= base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script> -->
