<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Appointments</h1><small>Register All</small>
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
                <a href="<?=base_url('admin/welcome/add_appointment')?>"><button type="button" class="btn btn-primary btn-custom" style="float: right;">Add Appointment New</button></a>         
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                    <div class="site-table" style="overflow: auto; height: 250px ">            
                      <table class="table table-bordered" style="overflow: auto; width: 800px; height: 250px; text-align: center;">
                    <thead style="background-color: #fff; color:#541728">
                          <tr>
                            <th>Customer Number</th>
                            <th>Customer Name</th>
                            <?php if($this->session->userdata('branch_id')==null){ ?>
                            <th>Branch Name</th>
                            <?php } ?>
                            <th>Services</th>
                            <th>Therapist</th>
                            <th>Total Amount</th>
                            <th>Time Slots</th>
                            <th>Appointment Date</th>
                            <th>Receipt</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                      </thead>
                     <tbody>
                    <?php foreach($appointment as $appointments): ?>
                      <tr>
                        <td><?= $appointments['customer_number']?></td>
                        <td><?= $appointments['customer_name']?></td>
                        <?php if($this->session->userdata('branch_id')==null){ ?>
                        <td><?= $appointments['branch_name']?></td>
                        <?php } ?>
                        <td><?= $appointments['service_name']?></td>
                        <td><?= $appointments['first_name'].' ' .$appointments['last_name']?></td>
                        <td><?= $appointments['total_amount']?></td>
                        <td><?= $appointments['time_slot']?></td>
                        <td><?= $appointments['appointment_date']?></td>
                        <td><?= $appointments['receipt']?></td>
                        <td><?= $appointments['status']?></td>
                        <td><a href="<?= base_url('admin/welcome/editAppointment/'. $appointments['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#541728"><i class="fa fa-edit"></i></a> <a href="<?= base_url('admin/welcome/deleteAppointment/'. $appointments['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#541728"><i class="fa fa-trash"></i></a></td>
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