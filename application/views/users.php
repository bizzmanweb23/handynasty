<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users Detail</h1>
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
                <table id="example2" class="table table-bordered">
                  <thead style="background-color: #fff; color:#541728">
                  <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($user as $users): ?>
                      <tr>
                        <td><?= $users['first_name']?></td>
                        <td><?= $users['email']?></td>
                        <td><?= $users['created_at']?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
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