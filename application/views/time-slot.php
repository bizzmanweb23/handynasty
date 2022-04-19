<link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style1.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Time Slot</h1>
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
                <div class="form-group">
                    <label for="">Date</label>
                    <input type="date" class="form-control" id="date" name="date" placeholder="">
                </div> 
               <button type="button" class="btn btn-purple"  style="color: #cb0c9f">Show Time Slot</button>
                <div class="row" id="timeslot">
                  <div class="col-lg-12">
                    <div class="token-slot mt-2">
                      <?php foreach ($slots as $slot):?>
                      <div class="form-check-inline visits mr-0">
                        <label class="visit-btns">
                        <input type="checkbox" class="form-check-input" value="18" name="">
                        <span class="visit-rsn" data-toggle="tooltip" title="<?= implode(" - ",$slot); ?>"><?= implode(" - ",$slot); ?></span>
                        </label>
                      </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
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

<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
<script src="<?= base_url(); ?>assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $("#timeslot").toggle();
  });
});
</script>