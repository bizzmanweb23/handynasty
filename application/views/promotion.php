<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Promotions</h1><small>Register All</small>
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
                <a href="<?=base_url('admin/welcome/add_promotion')?>"><button type="button" class="btn btn-primary btn-custom" style=" float: right;">Add promotions New</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <div class="site-table" style="overflow: auto; height: 250px ">
                <table class="table table-bordered" style="overflow: auto; width: 800px; height: 250px; text-align: center;">
                  <thead style="background-color: #fff; color:#541728">
                  <tr>
                    <th>Name</th>
                    <th>Name Mandarin</th>
                    <!-- <th>Category</th> -->
                    <?php if($this->session->userdata('branch_id')==null){?>
                    <th>Branch Name</th>
                    <?php }?>
                    <th>Image</th>
                    <!-- <th>Image Mandarin</th> -->
                    <th>Price</th>
                    <th>Duration</th>
                    <th>Details</th>
                    <th>Details Mandarin</th>
                    <th>Validity</th> 
                    <th>Validity Mandarin</th>
                    <th>Status</th>
                    <th>Priority</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($promotion as $promotions): ?>
                      <tr>
                        <td><?= $promotions['name']?></td>
                        <td><?= $promotions['name_mandarin']?></td>
                        <!-- <td><?= $promotions['category']?></td> -->
                        <?php if($this->session->userdata('branch_id')==null){?>
                        <td><?= $promotions['branch_name']?></td>
                        <?php }?>
                        <td><img src="<?= base_url('uploads/'.$promotions['image'])?>" width="40" height="40"></td>
                        <!-- <td><?= $promotions['image_mandarin']?></td> -->
                        <td><?= $promotions['price']?></td>
                        <td><?= $promotions['duration']?></td>
                        <td><?= $promotions['details']?></td>
                        <td><?= $promotions['details_mandarin']?></td>
                        <td><?= $promotions['validity']?></td>
                        <td><?= $promotions['validity_mandarin']?></td>
                        <td><?= $promotions['status']?></td>
                        <td><?= $promotions['priority']?></td>
                        <td><a href="<?= base_url('admin/welcome/deletePromotion/'. $promotions['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#541728"><i class="fa fa-trash"></i></a></td>
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