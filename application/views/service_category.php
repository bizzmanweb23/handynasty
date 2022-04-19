<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Service Category</h1><small>Register All</small>
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
                <a href="<?=base_url('admin/welcome/add_category')?>"><button type="button" class="btn btn-primary btn-custom" style=" float: right;">Add Service Category New</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <div class="site-table" style="overflow: auto; height: 250px ">
                <table class="table table-bordered" style="overflow: auto; width: 800px; height: 250px; text-align: center;">
                  <thead style="background-color: #fff; color:#541728">
                  <tr>
                    <th>Category Name</th>
                    <th>Category Mandarin Name</th>
                    <th>Category Detail</th>
                    <th>Category Mandarin Detail</th>
                    <?php if($this->session->userdata('branch_id')==null){?>
                    <th>Branch Name</th>
                    <?php }?>
                    <th>Category Image</th>
                    <th>Status</th>
                    <th>Priority</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($category as $categories): ?>
                      <tr>
                        <td><?= $categories['category_name']?></td>
                        <td><?= $categories['category_mandarin_name']?></td>
                        <td><?= $categories['category_detail']?></td>
                        <td><?= $categories['category_mandarin_detail']?></td>
                        <?php if($this->session->userdata('branch_id')==null){?>
                        <td><?= $categories['branch_name']?></td>
                        <?php }?>
                        <td><img src="<?= base_url('uploads/'.$categories['category_image'])?>" width="40" height="40"></td>
                        <td><?= $categories['status']?></td>
                        <td><?= $categories['priority']?></td>
                        <td><a href="<?= base_url('admin/welcome/deleteCategory/'. $categories['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#541728"><i class="fa fa-trash"></i></a></td>
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