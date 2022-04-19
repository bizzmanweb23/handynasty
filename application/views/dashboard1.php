<head>
    <link rel="stylesheet" href="https://quickproductdemo.com/phpeventcal/css/fullcalendar-2.0.0/fullcalendar.css" />
    <script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<div class="content-wrapper">
<body>

<div class="container">

<!-- /.modal -->
            <div class="row">
                <div class="col-md-10" style="overflow:hidden;float:inherit;width:inherit">
<style>

body {
    margin-top: 40px;
    text-align: center;
    font-size: 14px;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
}
.chosen-container-multi{
    width:100% !important;
}

</style>



<div style="clear: both"></div>
<div id="calendar"></div>
                </div>
            </div>
     

</div><!-- /.container -->

<style>

.guest-view {
    border: 0px none;
    box-shadow: none;
    padding-left: 0px;
    padding-right: 0px;
    width: 90%;
    float: left;
}

.close_guest {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
    border: medium none;
    height: 21px;
    vertical-align: middle;
    border-bottom: 1px dotted #d4d4d4;
}

.close_reminder {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
    border: medium none;
    height: 32px;
    margin-left: 0;
    padding-left: 0;
    vertical-align: middle;
}

.standard {
    display: none;
}

.reminder {
    display: none;
}

.venue {
    display: none;
}

.repeat-box {
    display: none;
}
.well {
    background: transparent;
}
.event-form-break {
    margin-top: 10px;
}
.event-create-btn-input {
    background-image: none;
}
.color-box {
    display: inline-block;
    border: 0 solid;
    height: 18px;
    width: 18px;
    margin-right: 15px;
    cursor: pointer;
    border-radius: 10px;
    color: #ffffff;
    line-height: 22px;
}
.color-box:hover{
    border: 0 solid;
}
.color-box:active{
    border-radius: 0;
}

.color-box-selected {
    border-radius: 0;
}

.panel {
    margin: 0;
}

.col-sm-4, .col-xs-6, .col-lg-6, .col-xs-12, .col-lg-12 {
    padding-left: 0;
    padding-right: 0;
}
button .multiple-select-option-label {
    font-size: 9px;
    border: 1px solid darkgrey;
    border-radius: 5px;
    margin-top: 0;
    display: inline-block;
    padding-top: 4px;
    padding-bottom: 4px;
    padding-left: 2px;
    padding-right: 2px;
    background-color: #ffffff;
}

.time-panel {
    background: none repeat scroll 0 0 #FAFAFA;
    border: 1px solid #D4D4D4;
    height: 140px;
    overflow: auto;
    position: absolute;
    width: 100px;
    z-index: 99999;
    display: none;
}

.time-panel-ul {
    width: 100%;
}
.time-panel-ul li {
    border: 1px solid #F0F0F0;
    float: none;
    list-style: none outside none;
    margin-left: -40px;
    padding: 0;
    text-align: left;
    width: 81px;
    border-right: 0;
    cursor: pointer;
    padding-left: 12px;
}
.time-panel-ul li:hover{
    background-color: #3A87AD;
    color: #ffffff;
}
#guest-list {
    margin-top: 5px;
    height: 100px;
    border: 1px solid #d9d9d9;
    border-radius: 4px;
    overflow:auto;
    padding-left: 4px;
    width: 345px;
    background-color: #F9F9F9;
}
#guest-list div {
    height: 22px;
    margin-top: 1px;
    margin-bottom: 1px;
}
#guest-list input {
    background-color: #F9F9F9;
    border-bottom: 1px dotted #D4D4D4;
    border-radius: 0;
    font-size: 13px;
    height: 22px;
    margin-bottom: 0;
    margin-top: 0;
    padding: 0;
}
</style>
<!-- Modal -->
<div class="modal fade formModal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="text-align:left;">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
            <h5 class="modal-title" id="myModalLabel"></h5>
        </div>
        <h5>CREATE APPOINTMENT</h5>
        <div style="margin: 2px 20px 0px 4px; float: right; display: none" id="remove-block">
            <button type="button" class="btn btn-danger btn-xs ladda-button" data-style="expand-left" data-event-id="" id="remove-link"><span class="ladda-label">Remove This Event</span></button>
        </div>
        <div style="clear: both"></div>
        <form role="form" id="eventForm" class="form-horizontal">
            <div class="modal-body" style="padding-top: 10px">
                <fieldset>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <!-- ?php $id=(int)$_GET['id']; ?-->
                            <!--?php echo '<h1>'.$id.'</h1>';?-->
                            <input type="hidden" class="form-control" id="thera_id" name="thera_id" value="thera_id" />
                            <div class="form-group">
                                <label for="customer_num" class="col-sm-6 control-label">Customer Number</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="customer_num" name="customer_num" placeholder="Customer Number" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Customer Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Customer Name" />
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="services" class="col-sm-6 control-label">Services 
                                </label>
                                <div class="col-sm-12">
                                <select data-placeholder="" multiple class="chosen-select form-control" name="service[]" id="services" style="height: 45px !important;">
                                    <?php foreach($service as $services): ?>
                                    <option value="<?= $services['id']?>"><?= $services['service_name']?></option>
                                <?php endforeach; ?> 
                                    
                                </select>
                                </div>
                            </div>  

                            <div class="form-group ">
                                 <label for="amount" class="col-sm-6 control-label">Total Amount</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="amount" id="amount" placeholder="Total Amount" value="" readonly>
                                    </div>
                            </div> 

                            <div class="form-group">
                                <label for="start-date" class="col-sm-3 control-label">Start</label>
                                <div class="input-group col-sm-6 date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="start" data-link-format="yyyy-mm-dd" >
                                    <input type="date" class="form-control" id="start-date" name="start_date" placeholder="Start Date"  style="background-color: white; cursor: default;" />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <div class="col-sm-3">
                                    <input type="time" name="start_time" id="start-time" class="form-control"  style="background-color: white; cursor: default;"/>
                                    <div class="time-panel" id="time-panel-start">
                                        <ul class="time-panel-ul">
                                            <li data-value="00:00">00:00</li>
                                            <li data-value="00:30">00:30</li>
                                            <li data-value="01:00">01:00</li>
                                            <li data-value="01:30">01:30</li>
                                            <li data-value="02:00">02:00</li>
                                            <li data-value="02:30">02:30</li>
                                            <li data-value="03:00">03:00</li>
                                            <li data-value="03:30">03:30</li>
                                            <li data-value="04:00">04:00</li>
                                            <li data-value="04:30">04:30</li>
                                            <li data-value="05:00">05:00</li>
                                            <li data-value="05:30">05:30</li>
                                            <li data-value="06:00">06:00</li>
                                            <li data-value="06:30">06:30</li>
                                            <li data-value="07:00">07:00</li>
                                            <li data-value="07:30">07:30</li>
                                            <li data-value="08:00">08:00</li>
                                            <li data-value="08:30">08:30</li>
                                            <li data-value="09:00">09:00</li>
                                            <li data-value="09:30">09:30</li>
                                            <li data-value="10:00">10:00</li>
                                            <li data-value="10:30">10:30</li>
                                            <li data-value="11:00">11:00</li>
                                            <li data-value="11:30">11:30</li>
                                            <li data-value="12:00">12:00</li>
                                            <li data-value="12:30">12:30</li>
                                            <li data-value="13:00">13:00</li>
                                            <li data-value="13:30">13:30</li>
                                            <li data-value="14:00">14:00</li>
                                            <li data-value="14:30">14:30</li>
                                            <li data-value="15:00">15:00</li>
                                            <li data-value="15:30">15:30</li>
                                            <li data-value="16:00">16:00</li>
                                            <li data-value="16:30">16:30</li>
                                            <li data-value="17:00">17:00</li>
                                            <li data-value="17:30">17:30</li>
                                            <li data-value="18:00">18:00</li>
                                            <li data-value="18:30">18:30</li>
                                            <li data-value="19:00">19:00</li>
                                            <li data-value="19:30">19:30</li>
                                            <li data-value="20:00">20:00</li>
                                            <li data-value="20:30">20:30</li>
                                            <li data-value="21:00">21:00</li>
                                            <li data-value="21:30">21:30</li>
                                            <li data-value="22:00">22:00</li>
                                            <li data-value="22:30">22:30</li>
                                            <li data-value="23:00">23:00</li>
                                            <li data-value="23:30">23:30</li>
                                                                                    </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" id="end-group">
                                <label for="end" class="col-sm-3 control-label">End</label>
                                <div class="input-group col-sm-6 form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="end" data-link-format="yyyy-mm-dd" >
                                    <input type="date" class="form-control" placeholder="End Date" name="end_date" id="end-date"  style="background-color: white; cursor: default;" />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <div class="col-sm-3">
                                    <input type="time" name="end_time" id="end-time" class="form-control"   style="background-color: white; cursor: default;" />
                                    <div class="time-panel" id="time-panel-end">
                                        <ul class="time-panel-ul">
                                                                                        <li data-value="00:00">00:00</li>
                                            <li data-value="00:30">00:30</li>
                                            <li data-value="01:00">01:00</li>
                                            <li data-value="01:30">01:30</li>
                                            <li data-value="02:00">02:00</li>
                                            <li data-value="02:30">02:30</li>
                                            <li data-value="03:00">03:00</li>
                                            <li data-value="03:30">03:30</li>
                                            <li data-value="04:00">04:00</li>
                                            <li data-value="04:30">04:30</li>
                                            <li data-value="05:00">05:00</li>
                                            <li data-value="05:30">05:30</li>
                                            <li data-value="06:00">06:00</li>
                                            <li data-value="06:30">06:30</li>
                                            <li data-value="07:00">07:00</li>
                                            <li data-value="07:30">07:30</li>
                                            <li data-value="08:00">08:00</li>
                                            <li data-value="08:30">08:30</li>
                                            <li data-value="09:00">09:00</li>
                                            <li data-value="09:30">09:30</li>
                                            <li data-value="10:00">10:00</li>
                                            <li data-value="10:30">10:30</li>
                                            <li data-value="11:00">11:00</li>
                                            <li data-value="11:30">11:30</li>
                                            <li data-value="12:00">12:00</li>
                                            <li data-value="12:30">12:30</li>
                                            <li data-value="13:00">13:00</li>
                                            <li data-value="13:30">13:30</li>
                                            <li data-value="14:00">14:00</li>
                                            <li data-value="14:30">14:30</li>
                                            <li data-value="15:00">15:00</li>
                                            <li data-value="15:30">15:30</li>
                                            <li data-value="16:00">16:00</li>
                                            <li data-value="16:30">16:30</li>
                                            <li data-value="17:00">17:00</li>
                                            <li data-value="17:30">17:30</li>
                                            <li data-value="18:00">18:00</li>
                                            <li data-value="18:30">18:30</li>
                                            <li data-value="19:00">19:00</li>
                                            <li data-value="19:30">19:30</li>
                                            <li data-value="20:00">20:00</li>
                                            <li data-value="20:30">20:30</li>
                                            <li data-value="21:00">21:00</li>
                                            <li data-value="21:30">21:30</li>
                                            <li data-value="22:00">22:00</li>
                                            <li data-value="22:30">22:30</li>
                                            <li data-value="23:00">23:00</li>
                                            <li data-value="23:30">23:30</li>
                                                                                    </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--- Action Links -->

                </fieldset>
            </div>
            <div class="modal-footer">
                <input type="hidden" value="-1" name="update-event" id="update-event" />
                <input type="hidden" value="" name="currentView" id="currentView" />
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="">submit</button>
            </div>
        </form>

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script src="https://quickproductdemo.com/phpeventcal/js/fullcalendar-2.0.0/jquery.min.js" type="text/javascript"></script>
<script src="https://quickproductdemo.com/phpeventcal/js/fullcalendar-2.0.0/moment.min.js" type="text/javascript"></script>
<!-- <script src="https://quickproductdemo.com/phpeventcal/js/fullcalendar-2.0.0/jquery-ui.custom.min.js" type="text/javascript"></script> -->
<!-- <script src="https://quickproductdemo.com/phpeventcal/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
<!-- <script src="https://quickproductdemo.com/phpeventcal/plugins/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script> -->
<!-- <script src="https://quickproductdemo.com/phpeventcal/plugins/bootstrap-colorpicker-master/js/bootstrap-colorpicker.min.js" type="text/javascript"></script> -->
<script src="https://quickproductdemo.com/phpeventcal/js/fullcalendar-2.0.0/fullcalendar.js" type="text/javascript"></script>
<!-- <script src="https://quickproductdemo.com/phpeventcal/plugins/ifightcrime-bootstrap-growl/jquery.bootstrap-growl.min.js" type="text/javascript"></script>
<script src="https://quickproductdemo.com/phpeventcal/plugins/ladda-bootstrap-master/dist/spin.min.js" type="text/javascript"></script>
<script src="https://quickproductdemo.com/phpeventcal/plugins/ladda-bootstrap-master/dist/ladda.min.js" type="text/javascript"></script>
<script src="https://quickproductdemo.com/phpeventcal/plugins/bootstrap-silviomoreto-select/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="https://quickproductdemo.com/phpeventcal/js/file-uploader/vendor/load-image.all.min.js" type="text/javascript"></script>
<script src="https://quickproductdemo.com/phpeventcal/js/file-uploader/vendor/jquery.ui.widget.js" type="text/javascript"></script> -->
<!-- <script src="https://quickproductdemo.com/phpeventcal/js/file-uploader/jquery.fileupload.js" type="text/javascript"></script>
<script src="https://quickproductdemo.com/phpeventcal/js/file-uploader/jquery.fileupload-process.js" type="text/javascript"></script>
<script src="https://quickproductdemo.com/phpeventcal/js/file-uploader/jquery.fileupload-image.js" type="text/javascript"></script>
<script src="https://quickproductdemo.com/phpeventcal/js/file-uploader/jquery.fileupload-validate.js" type="text/javascript"></script> -->
<!-- <script src="https://quickproductdemo.com/phpeventcal/js/fullcalendar-2.0.0/gcal.js" type="text/javascript"></script> -->

<script>
  $("#services").change(function() {
      //console.log($(this).val());
      $.ajax({
      url: "<?= base_url("getServiceByID") ?>",
      type: "get",
      data: {
        id: $(this).val()
      },
      dataType: "json",
      success: function(data) {
        //console.log(data);
        $("#amount").val(data.totalPrice);
        //$("#duration").val(data.totalDuration);
      }
    })
  });
  
  $("#eventForm").submit(function(e) {
      e.preventDefault();
      //alert('shup');
       $.ajax({
           url: "<?= base_url("admin/welcome/postAppointment")?>",
           type:"POST",
           data: $("#eventForm").serialize(),
           dataType: 'json',
           success: function (response) {
             $("#eventForm")[0].reset();
             toastr.success("Appointment created Successfully");
             $(".formModal").modal('hide');
            $('.close').click();
            }
           });
     });
</script>  
<script language="javascript" type="text/javascript"> 
$(document).ready(function(){ 

    

        //==================Event Calander Script=================
        //alert('true');
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        var userRole = 'super';

        $('#calendar').fullCalendar({
            googleCalendarApiKey: 'sdfasdfasdfas',
            header: {
                    center:   'title',
                    //right: 'basicDay, basicWeek, month, agendaDay, agendaWeek',
                    right:  'resourceDay',
                    //'agendaDay, month, agendaWeek,list,
                    left:  'today prev,next'
                },
            allDaySlot:true,
            //allDayText:'',
            //axisFormat:'',
            snapMinutes:'',
            defaultEventMinutes: '',
            firstHour: '',
            minTime: '0',
            //maxTime: '24',
            slotEventOverlap: 'true',
            weekends: true,
            firstDay: 0,
            isRTL: false,
            hiddenDays: [],
            year:2022,
            month:2,
            date:16,
            theme: false,
            buttonIcons: { prev: 'left-single-arrow',
                            next: 'right-single-arrow',
                            prevYear: 'left-double-arrow',
                            nextYear: 'right-double-arrow'},
            weekMode: 'fixed',
            weekNumbers: false,
            weekNumberCalculation: 'iso',
            height:'',
            contentHeight: '',
            aspectRatio: 1.35,
            handleWindowResize: true,
            defaultView: 'resourceDay',
            timeFormat: {'agenda':'HH:mm','':'HH:mm'},
            columnFormat: {'month':'ddd','week':'ddd M\/D','day':'dddd M\/D'},
            titleFormat: {'month':'MMMM YYYY','week':'MMM D YYYY','day':'dddd, MMM D, YYYY'},
            buttonText: {'prev':'Prev','next':'Next','agendaDay':'Day','basicDay':'Day','month':'Month','agendaWeek':'Week','list':'Agenda','resourceDay':'Resource','pec':'Upcoming'},
            //monthNames: ['January','February','March','April','May','June','July','August','September','October','November','December'],
            //monthNamesShort: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
            //dayNames: ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
            //dayNamesShort: ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'],
            //weekNumberTitle: 'W',
            selectable: 'false',
            selectHelper: 'false',
            unselectAuto: 'true',
            unselectCancel: '',
            viewRender: function(view, element){
                //alert('here');
                //alert(view);
                var view = $('#calendar').fullCalendar('getView');
                    document.cookie = 'currentView='+view.name;
                    //alert(view.name);
            },

            eventResize: function(event, revertFunc, jsEvent, ui, view) {
                processMovedEvent(event, revertFunc, jsEvent, ui, view);

                /*
                alert(
                    'The end date of ' + event.title + 'has been moved ' +
                    dayDelta + ' days and ' +
                    minuteDelta + ' minutes.'
                );

                if (!confirm('is this okay?')) {
                    revertFunc();
                }
                */
            },

            eventDrop: function(event, revertFunc, jsEvent, ui, view) {
                processMovedEvent(event, revertFunc, jsEvent, ui, view);
            },
            select:function(start, end, jsEvent, view, resource) {
                //alert(view);
                //==== show this panel if it is hidden
                $('#end-group').show();
                $('#remove-block').hide();
                $('#repeat_by_group').hide();

                //===Clearing Reminder Settings Panel
                $('#hide-reminder-settings').click();
                serial = 1;
                $('#guest-list div').remove();

                //===Selecting Multiple Calendar

                $('#eventForm fieldset').removeAttr('disabled');

                var dt = new Date();

                var hours   = start.format('hh');
                var minutes = start.format('mm');
                if(minutes > 30) minutes = 30;
                else minutes = 0;
                var ehours;
                if(hours > 0) ehours = hours+1;
                if(hours == 0) ehours = hours;
                if(hours == 23) ehours = hours;

                var eminutes;
                if(ehours >= 24) ehours = '0';
                if(hours > 0) eminutes = minutes;
                if(hours == 0) eminutes = '59';
                if(hours == 23) eminutes = '59';

                var mm = start.format('M');
                var dd = start.format('D');
                var yyyy = start.format('YYYY');

                if(parseInt(mm) <= 9) mm = '0'+(parseInt(mm)+0);
                if(parseInt(dd) <= 9) dd = '0'+dd;
                if(parseInt(hours) <= 9) hours = '0'+hours;
                if(parseInt(minutes) <= 9) minutes = '0'+minutes;
                if(parseInt(ehours) <= 9) ehours = '0'+ehours;
                if(parseInt(eminutes) <= 9) eminutes = '0'+eminutes;

                var curDate = yyyy+'-'+mm+'-'+dd+' '+hours+':'+minutes;
                var curDateInput = yyyy+'-'+mm+'-'+dd;

                var shortdateFormat = 'DD/MM/YYYY';
                var longdateFormat = 'dddd, DD MMMM YYYY';
                var title = $.fullCalendar.moment(start).format(longdateFormat+' HH:mm');
                $('#myModal').modal('show');
                $('#myModalLabel').html(title);
                $('#myTab a:first').tab('show');
                //$('#create-event').html('Create Event');
                $('#update-event').val('');

                //==== resetting fields
                document.getElementById('eventForm').reset();
                $('.checkbox-inline input, #allDay').removeAttr('checked');
                $('.repeat-box').hide();
                $('#hide-standard-settings').click();
                //$('.color-box').removeClass('color-box-selected');
                $('#backgroundColor').val('#3a87ad');
                $('#repeat_end_on').val('');
                $('#repeat_end_after').val('');
                $('#repeat_never').val('1');
                $('#ends-db-val').datetimepicker('remove');
                $('#ends-db-val').attr('readonly','readonly');

                //====For Agenda Week & Agenda Day
                if(hours > 0 || minutes > 0){

                }

                //====Setting Date Fields
                $('#start-date').val(curDateInput);
                $('#end-date').val(curDateInput);
                $('#repeat_start_date').val(curDateInput);

                //===convert 24 hours to 12 hours format
                var startTime12Format = formatTimeStr(hours+':'+minutes);
                var endTime12Format = formatTimeStr(ehours+':'+eminutes);

                $('#start-time').val(start.format('HH:mm'));
                $('#end-time').val(end.format('HH:mm'));


                //$('#select-calendar').removeAttr('disabled');
                //$('.select-calendar-cls').css('opacity','1');
                var jqxhr = $.ajax({
                    type: 'POST',
                    url: '/phpeventcal/server/ajax/events_manager.php',
                        data: {action:'LOAD_SELECTED_CALENDAR_FROM_SESSION'},
                        dataType: 'json'
                    })
                    .done(function(selCal) {
                        //====setting up values
                        $('.selectpicker').selectpicker('val', selCal);
                    })
                    .fail(function() {
                    });

                var jqxhr = $.ajax({
                    type: 'POST',
                    url: '/phpeventcal/server/ajax/events_manager.php',
                        data: {action:'LOAD_SELECTED_CALENDAR_COLOR'},
                    })
                    .done(function(selCalColor) {
                        //====setting up values
                        $('#backgroundColor').val(selCalColor);
                        var selCalColorData = selCalColor.split('#');
                        var colorID = 'cid_'+selCalColorData[1];
                        $('#'+colorID).click();
                    })
                    .fail(function() {
                    });
            },
            dayClick: function(date, allDay, jsEvent, view) {
                //==== show this panel if it is hidden
                $('#end-group').show();
                $('#remove-block').hide();
                $('#repeat_by_group').hide();

                //===Clearing Reminder Settings Panel
                $('#hide-reminder-settings').click();
                serial = 1;
                $('#guest-list div').remove();

                //===Selecting Multiple Calendar

                $('#eventForm fieldset').removeAttr('disabled');

                var dt = new Date();

                var hours   = dt.getHours();
                var minutes = dt.getMinutes();
                if(minutes > 30) minutes = 30;
                else minutes = 0;
                var ehours;
                if(hours > 0) ehours = hours+1;
                if(hours == 0) ehours = hours;
                if(hours == 23) ehours = hours;

                var eminutes;
                if(ehours >= 24) ehours = '0';
                if(hours > 0) eminutes = minutes;
                if(hours == 0) eminutes = '59';
                if(hours == 23) eminutes = '59';

                var mm = date.format('M');
                var dd = date.format('D');
                var yyyy = date.format('YYYY');

                if(parseInt(mm) <= 9) mm = '0'+(parseInt(mm)+0);
                if(parseInt(dd) <= 9) dd = '0'+dd;
                if(parseInt(hours) <= 9) hours = '0'+hours;
                if(parseInt(minutes) <= 9) minutes = '0'+minutes;
                if(parseInt(ehours) <= 9) ehours = '0'+ehours;
                if(parseInt(eminutes) <= 9) eminutes = '0'+eminutes;

                var curDate = yyyy+'-'+mm+'-'+dd+' '+hours+':'+minutes;
                var curDateInput = yyyy+'-'+mm+'-'+dd;

                var shortdateFormat = 'DD/MM/YYYY';
                var longdateFormat = 'dddd, DD MMMM YYYY';
                var title = $.fullCalendar.moment(date).format(longdateFormat+' HH:mm');
                $('#myModal').modal('show');
                $('#myModalLabel').html(title);
                $('#myTab a:first').tab('show');
                //$('#create-event').html('Create Event');
                $('#update-event').val('');

                //==== resetting fields
                document.getElementById('eventForm').reset();
                $('.checkbox-inline input, #allDay').removeAttr('checked');
                $('.repeat-box').hide();
                $('#hide-standard-settings').click();
                //$('.color-box').removeClass('color-box-selected');
                $('#backgroundColor').val('#3a87ad');
                $('#repeat_end_on').val('');
                $('#repeat_end_after').val('');
                $('#repeat_never').val('1');
                $('#ends-db-val').datetimepicker('remove');
                $('#ends-db-val').attr('readonly','readonly');
                $('#files').children('div').remove();

                //====For Agenda Week & Agenda Day
                if(hours > 0 || minutes > 0){

                }

                //====Setting Date Fields
                $('#start-date').val(curDateInput);
                $('#end-date').val(curDateInput);
                $('#repeat_start_date').val(curDateInput);

                //===convert 24 hours to 12 hours format
                var startTime12Format = formatTimeStr(hours+':'+minutes);
                var endTime12Format = formatTimeStr(ehours+':'+eminutes);

                $('#start-time').val(startTime12Format);
                $('#end-time').val(endTime12Format);


                //$('#select-calendar').removeAttr('disabled');
                //$('.select-calendar-cls').css('opacity','1');
                var jqxhr = $.ajax({
                    type: 'POST',
                    url: '/phpeventcal/server/ajax/events_manager.php',
                        data: {action:'LOAD_SELECTED_CALENDAR_FROM_SESSION'},
                        dataType: 'json'
                    })
                    .done(function(selCal) {
                        //====setting up values
                        //$('#select-calendar').selectpicker({val: selCal});
                        $('#select-calendar').val(selCal);
                        $('#select-calendar').selectpicker('refresh');
                    })
                    .fail(function() {
                    });

                var jqxhr = $.ajax({
                    type: 'POST',
                    url: '/phpeventcal/server/ajax/events_manager.php',
                        data: {action:'LOAD_SELECTED_CALENDAR_COLOR'},
                    })
                    .done(function(selCalColor) {
                        //====setting up values
                        $('#backgroundColor').val(selCalColor);
                        var selCalColorData = selCalColor.split('#');
                        var colorID = 'cid_'+selCalColorData[1];
                        $('#'+colorID).click();
                    })
                    .fail(function() {
                    });
            },
            // events: [{"id":"383","title":"23432432","location":"","resources":"","image":"","thumbnail":"","start":"2022-03-17T00:00:00","end":"2022-03-28T01:30:00","borderColor":"#3a87ad","textColor":null,"backgroundColor":"#3a87ad","allDay":"","description":""},{"id":"384","title":"test","location":"","resources":"","image":"","thumbnail":"","start":"2022-03-13T04:00:00","end":"2022-03-13T06:30:00","borderColor":"#3a87ad","textColor":null,"backgroundColor":"#3a87ad","allDay":"","description":""},{"id":"385","title":"Abcdef","location":"","resources":"","image":"","thumbnail":"","start":"2022-03-16T10:00:00","end":"2022-03-16T11:30:00","borderColor":"#3a87ad","textColor":null,"backgroundColor":"#3a87ad","allDay":"","description":""}],
            //resources: [{"id":"1708","name":"Richard"}],
            resources: <?php echo $cal; ?>,
            //================================
            eventSources: [],
            allDayDefault: true,
            ignoreTimezone: true,
            startParam: 'start',
            endParam: 'end',
            lazyFetching: true,
            eventColor: '',
            eventBackgroundColor: '',
            eventBorderColor: '',
            editable: true,
            eventStartEditable: true,
            eventDurationEditable: true,
            dragRevertDuration: 500,
            dragOpacity: 0.2,
            droppable: false,
            dropAccept: '*',
            eventClick: function(calEvent, jsEvent, view) {
                var shortdateFormat = 'DD/MM/YYYY';
                var longdateFormat = 'dddd, DD MMMM YYYY';
                userRole = 'admin';
                eventRenderer(calEvent,jsEvent,view,userRole,shortdateFormat,longdateFormat);
            }
        });
});
</script>
<!--
|   ====================================================================================================================
|   JS FOR EVENTS
|   ====================================================================================================================
-->
<script type="text/javascript">
var reminder2Obj;
var reminder3Obj;
var shareForm;
var calEditForm;
$(document).ready(function () {
/*
 $.bootstrapGrowl('<div style="text-align: left">This demo is a working preview of the full calendar control that is currently still under heavy development.' +
 'Check back here from time to time to see the latest changes and updates.' +
 '<b>We appreciate if you can <a href="#" style="color:orange;" data-uv-trigger>send us your feedback</a> so we can continue to improve our product. Thank you!</b></div>',{
 type: 'info',
 width: 550,
 //top_offset: 300,
 //ele: '#feedback_link',
 align: 'right'
 });
 */

//=====Enable Bootstrap Select
$('.selectpicker').selectpicker();

//=====Format Buttons on load
$('.fc-button-basicDay').removeClass('fc-corner-right');
$('.fc-button-basicWeek').removeClass('fc-corner-left fc-corner-right');
$('.fc-button-month').removeClass('fc-corner-left fc-corner-right');
//$('.fc-button-agendaDay').removeClass('fc-corner-left fc-corner-right');
$('.fc-button-agendaDay').removeClass('fc-corner-right');
$('.fc-button-agendaWeek').removeClass('fc-corner-left');
//===== Formatting Buttons Ends

// change any 12-hour time to 24-hour time for Sql compatiblity
function timeFrom12To24Hours(time) {
    var hours = Number(time.match(/^(\d+)/)[1]);
    var minutes = Number(time.match(/:(\d+)/)[1]);

    if (time.indexOf('AM') >= 0 || time.indexOf('PM') >=0) {
        var AMPM = time.match(/\s(.*)$/)[1];

        if (AMPM == "PM" && hours < 12) hours = hours + 12;
        if (AMPM == "AM" && hours == 12) hours = hours - 12;
    }
    
    var sHours = hours.toString();
    var sMinutes = minutes.toString();
    if (hours < 10) sHours = "0" + sHours;
    if (minutes < 10) sMinutes = "0" + sMinutes;
    // alert(sHours + ":" + sMinutes)
    return sHours + ":" + sMinutes;
}

//==== add guest emails here
var serial = 1

// $('#add-guest').click(function () {
//     //=== count existing guest emails
//     serial = $('.guest_email').length + 1;
//     var guest = $('#guest').val();
//     if (isValidEmailAddress(guest) == false || guest == '') {
//         $.bootstrapGrowl("<div style='text-align: left'>Invalid Email</div>", {
//             type: 'warning',
//             width: 450
//         });
//         return false;
//     }
//     var guestView = "<div id='guest_" + serial + "'> <input class='form-control guest-view guest_email reminder_add_guest_in' id='guest_list_" + serial + "' name='guests[]' value='" + guest + "'><button class='close_guest' aria-hidden='true' data-dismiss='guest' type='button'>×</button></div>";
//     $('#guest-list').append(guestView);
//     $('.close_guest').click(function () {
//         $(this).parent().remove();
//     });
//     $('#guest').val(null);
//     serial++;
// });

// $('#guest').keyup(function (jsEventObj) {
//     if (jsEventObj.keyCode == 13) {
//         $('#add-guest').click();
//     }
// });

//=== Add Organizer
// $('#add_organizer').click(function(){
//     $('#selector').hide();
//     $('#organizer-input').show();
//     $('#add_organizer').hide();
//     $('#cancel_organizer').show();
//     //$('#new-organizer').val(1);
// });

//=== Cancel Organizer
// $('#cancel_organizer').click(function(){
//     $('#selector').show();
//     $('#organizer-input').hide();
//     $('#add_organizer').show();
//     $('#cancel_organizer').hide();
//     //$('#new-organizer').val(0);
// });


//=== Add Resource
// $('#add_resource').click(function(){
//     $('#selector-resource').hide();
//     $('#resource-input').show();
//     $('#add_resource').hide();
//     $('#cancel_resource').show();
//     //$('#new-resource').val(1);
// });

//=== Cancel Resource
// $('#cancel_resource').click(function(){
//     $('#selector-resource').show();
//     $('#resource-input').hide();
//     $('#add_resource').show();
//     $('#cancel_resource').hide();
//     //$('#new-resource').val(0);
// });

//=== Add venue
// $('#add_venue').click(function(){
//     $('#venue-select').hide();
//     $('#venue-holder').show();
//     $('#add_venue').hide();
//     $('#cancel_venue').show();
// });

//=== Cancel venue
// $('#cancel_venue').click(function(){
//     $('#venue-select').show();
//     $('#venue-holder').hide();
//     $('#add_venue').show();
//     $('#cancel_venue').hide();
// });

//==== reminder panel setup
reminder2Obj = $('#reminder2').detach();
reminder3Obj = $('#reminder3').detach();

//==== add reminders

var next_reminder_count;
$('#add_reminder').click(function () {
    //=== count existing reminders
    next_reminder_count = $('.reminder-group').length + 1;
    if (next_reminder_count == 2) {
        $('.reminder-group').each(function () {
            if (this.id == 'reminder3') {
                reminder2Obj.appendTo("#reminder-holder");
            }
            else if (this.id == 'reminder2') {
                reminder3Obj.appendTo("#reminder-holder");
            }
            else
                reminder2Obj.appendTo("#reminder-holder");
        });
    }
    if (next_reminder_count == 3) {
        $('.reminder-group').each(function () {
            if (this.id == 'reminder3') {
                reminder2Obj.appendTo("#reminder-holder");
            }
            else if (this.id == 'reminder2') {
                reminder3Obj.appendTo("#reminder-holder");
            }
            else
                reminder3Obj.appendTo("#reminder-holder");

        });
    }

});


//================= Search ===================

$('#search-btn').click(function () {

    var searchKey = $('#search-event-input').val();
    if (searchKey == '') {
        //=== show a warning message
        $.bootstrapGrowl("<div style='text-align: left'>Invalid or empty search keyword</div>", {
            type: 'warning',
            width: 450
        });

        return false;
    }
    searchEventsBasedOnKeyword(searchKey, this);
});

$('#search-event-input').keyup(function (jsEventObj) {
    if (jsEventObj.keyCode == 13) {
        $('#search-btn').click();
    }
});

function searchEventsBasedOnKeyword(searchKey, laddaObj) {
    //=== ladda button animation starts
    var l = Ladda.create(laddaObj);
    l.start();

    //===Reusing calendar search code
    $.post("/phpeventcal/server/ajax/events_manager.php",
        { searchKey: searchKey, action: 'LOAD_EVENTS_BASED_ON_SEARCH_KEY'},
        function (eventJSON) {
        }, "json")
        .always(function (eventJSON) { //==== no event found?
            if (eventJSON.title == 'NO___EVENT___FOUND') {
                //=== show a warning message
                $.bootstrapGrowl("<div style='text-align: left'>No matches found</div>", {
                    type: 'warning',
                    width: 280
                });
            }
            else { //=== results found?
                $('#calendar').fullCalendar('changeView', 'list');
                $('#calendar').fullCalendar('removeEvents');
                $('#calendar').fullCalendar('addEventSource', eventJSON);
            }
            //==== ladda button animation stops
            l.stop();
        }, "json");
}
//=== Create or Update event
function eventCreateUpdate(){

    //==== check repeat week days are checked at least one, if none is checked, then check one by default
    var repeat_type;
    if (repeatChecked == true) {
        var repeatType = $('#repeat_type').val();

        //==== if repeat type is weekly
        if (repeatType == 'weekly') {
            //==== if no repeat day is checked
            /*
             alert(repeat_on_sun);
             alert(repeat_on_mon);
             alert(repeat_on_tue);
             alert(repeat_on_wed);
             alert(repeat_on_thu);
             alert(repeat_on_fri);
             alert(repeat_on_sat);
             */


            if (repeat_on_sun == 0 && repeat_on_mon == 0 && repeat_on_tue == 0 && repeat_on_wed == 0 && repeat_on_thu == 0 && repeat_on_fri == 0 && repeat_on_sat == 0) {
                setRepeatOptionsForDays($('#start-date').val());
            }
        }
    }
    else {
        $('#repeat_type').val('none');
    }
    var formData = $('#eventForm').serializeArray();

    //=== reset repeat check box
    repeatChecked = false;
    $('#eventForm fieldset').attr('disabled', 'disabled');

    var jqxhr = $.ajax({
        type: "POST",
        url: "/phpeventcal/server/ajax/events_manager.php",
        data: formData,
        dataType: "json"
    })
        .done(function (eventJSON) {
            //===Clearing Reminder Settings Panel
            //                    $('#reminder_type_1').val('email');
            //                    $('#reminder_time_1').val('1');
            //                    $('#reminder_time_unit_1').val('minute');
            //
            //                    $('#reminder_type_2').val('email');
            //                    $('#reminder_time_2').val('1');
            //                    $('#reminder_time_unit_2').val('minute');
            //
            //                    $('#reminder_type_3').val('email');
            //                    $('#reminder_time_3').val('1');
            //                    $('#reminder_time_unit_3').val('minute');
            //
            //                    hideReminder2();
            //                    hideReminder3();
            //$('#guest-list div').remove();
            //serial = 1; //reset event reminder guest serial

            //=== Look for if the event is being saved into a different calendar
            if (eventJSON.title == 'NO_EVENT_FOUND_FOR_SELECTED_CALENDARS') {
                $('#myModal').modal('hide');
                $.bootstrapGrowl("<div style='text-align: left'>Event Created Successfully, though it will be shown on the selected the calendar</div>", {
                    type: 'success',
                    width: 450
                });
                return;
            }

            //=== Check if this is an update
            var uid = $('#update-event').val();
            if (parseInt(uid) > 0) {
                $('#calendar').fullCalendar('removeEvents', uid);

                //===get current view
                var view = $('#calendar').fullCalendar('getView');


                //=== if it is a agenda/list view then reload the page immediately
                if (view.name == 'list') {
                    location.reload();
                    return;
                }
                else { //=== wait for 2 seconds for other views
                    setTimeout(function () {
                        location.reload();
                    }, 1000)
                }
            }

            //alert(eventJSON);
            ///$('#calendar').fullCalendar('addEventSource', eventJSON);

            setTimeout(function () {
                location.reload();
            }, 1000);

            $('#myModal').modal('hide');

            if (parseInt(uid) > 0) {
                $.bootstrapGrowl("Event Modified Successfully", {
                    type: 'success',
                    width: 320
                });
            }
            else {
                $.bootstrapGrowl("Event Created Successfully", {
                    type: 'success',
                    width: 320
                });
            }
        })
        .fail(function (eventMsg) {
            //alert(eventMsg)
            $.bootstrapGrowl("Something went wrong, please try again later", {
                type: 'danger',
                width: 350
            });
        })

}
//====validating
function validateEventCreateForm() {
    alert('success');
    var errMsg ='';
    var errMsgTitle ='';

    var title = $('#title').val();
    if (title == '') errMsgTitle = "Title is required!<br/>";

    var start = moment($('#start-date').val());
    var end = moment($('#end-date').val());

    var startDate = start.format('X');
    var endDate = end.format('X');
    var startDateConflict = start.format('YYYY-MM-DD');
    var endDateConflict = end.format('YYYY-MM-DD');
    //alert(startDate);
    //alert(endDate);
    var allDay = $('#allDay').prop('checked');
    var startTimeConflict = timeFrom12To24Hours($('#start-time').val());
    var endTimeConflict = timeFrom12To24Hours($('#end-time').val());
    var startTime = parseInt(timeFrom12To24Hours($('#start-time').val()).replace(/:/, ''));
    var endTime = parseInt(timeFrom12To24Hours($('#end-time').val()).replace(/:/, ''));

    // if (startDate > endDate && allDay == false) errMsg = errMsg + "End Date must need to set after Start Date!<br />";
    // else if ((startTime > endTime) && (startDate >= endDate) && (allDay != 'on' || allDay != true)) errMsg = errMsg + "Sorry, you can't create an event that ends before it starts!<br />";
    // if ((startTime == 2300 && endTime == 0) || (startTime == 2330 && endTime == 30) || (startTime == 2300 && endTime == 2330)) errMsg = '';
    // if (startTime != 0 && endTime == 0) errMsg = '';
    // if (startTime == endTime && allDay == false) errMsg = errMsg + "Sorry, start and end times cannot be equal<br />";

    // //=== if allDay is set to true, then empty the the time for last date
    // if (allDay == true) $('#end-time').val('');
    //alert(startDate);
    //alert(endDate);

    $.post("/phpeventcal/server/ajax/events_manager.php",
        { startDate: startDateConflict, endDate: endDateConflict, startTime: startTimeConflict, endTime: endTimeConflict, action: 'CHECK_CONFLICT'},
        function (eventJSON) {
        }, "json")
        .always(function (eventJSON) { //==== no event found?
            if(errMsg+errMsgTitle == ''){
                if(eventJSON.title > 0){
                    var overlap = confirm('This will conflict with another event, will you proceed? ');

                    if(overlap){
                            eventCreateUpdate();
                    }
                }
                else{
                    if(errMsg+errMsgTitle == '')
                        eventCreateUpdate();
                }
            }
        }, "json");

    return errMsg + errMsgTitle;
}

$('.repeat_on_day').click(function () {
    var tid = this.id;
    var tcheck = this.checked;

    if (tid == 'repeat_on_sun' && tcheck == false) repeat_on_sun = 0;
    if (tid == 'repeat_on_sun' && tcheck == true) repeat_on_sun = 1;

    if (tid == 'repeat_on_mon' && tcheck == false) repeat_on_mon = 0;
    if (tid == 'repeat_on_mon' && tcheck == true) repeat_on_mon = 1;

    if (tid == 'repeat_on_tue' && tcheck == false) repeat_on_tue = 0;
    if (tid == 'repeat_on_tue' && tcheck == true) repeat_on_tue = 1;

    if (tid == 'repeat_on_wed' && tcheck == false) repeat_on_wed = 0;
    if (tid == 'repeat_on_wed' && tcheck == true) repeat_on_wed = 1;

    if (tid == 'repeat_on_thu' && tcheck == false) repeat_on_thu = 0;
    if (tid == 'repeat_on_thu' && tcheck == true) repeat_on_thu = 1;

    if (tid == 'repeat_on_fri' && tcheck == false) repeat_on_fri = 0;
    if (tid == 'repeat_on_fri' && tcheck == true) repeat_on_fri = 1;

    if (tid == 'repeat_on_sat' && tcheck == false) repeat_on_sat = 0;
    if (tid == 'repeat_on_sat' && tcheck == true) repeat_on_sat = 1;

});

$('#myModal').on('hide.bs.modal', function (e) {
    $('#reminder_type_1').val('email');
    $('#reminder_time_1').val('1');
    $('#reminder_time_unit_1').val('minute');

    $('#reminder_type_2').val('email');
    $('#reminder_time_2').val('1');
    $('#reminder_time_unit_2').val('minute');

    $('#reminder_type_3').val('email');
    $('#reminder_time_3').val('1');
    $('#reminder_time_unit_3').val('minute');

    hideReminder2();
    hideReminder3();
    $('#guest-list div').remove();
    serial = 1; //reset event reminder guest serial

    // to reset organizer form
    $('#selector').show();
    $('#organizer-input').hide();
    $('#add_organizer').show();
    $('#cancel_organizer').hide();

    // to reset resource form
    $('#selector').show();
    $('#resource-input').hide();
    $('#add_resource').show();
    $('#cancel_resource').hide();

    // to reset venue settings part
    $('#venue-select').show();
    $('#venue-holder').hide();
    $('#add_venue').show();
    $('#cancel_venue').hide();
    $('#hide-venue-settings').click();
})



$('#create-event').on('click', function(e) {
    //alert('12345556');
    //==== start JS validating
    //var errMsg = '';
    e.preventDefault();
     var errMsg = validateEventCreateForm();
    // //==== display error message if there is any error
    // if (errMsg != '') {
    //     $.bootstrapGrowl("<div style='text-align: left'>" + errMsg + "</div>", {
    //         type: 'warning',
    //         width: 450
    //     });
    //     return false;
    // }

});

$('#start-date').datetimepicker({
    startDate: '2022-03-16',
    startView: 2,
    minView: 2,
    maxView: 2,
    autoclose: true,
    todayHighlight: true,
    format: 'yyyy-mm-dd'
});

$('#start-time').focus(function () {
    $('#time-panel-start').show();
});
$('#start-time').click(function () {
    $('#time-panel-start').show();
});

$('#time-panel-start ul li').click(function () {
    
    var selVal = $(this).attr('data-value');
    $('#start-time').val(formatTimeStr(selVal));
    $('#time-panel-start').hide();
});


$('#end-date').datetimepicker({
    startDate: '2022-03-16',
    startView: 2,
    minView: 2,
    maxView: 2,
    autoclose: true,
    todayHighlight: true,
    format: 'yyyy-mm-dd'
});

$('#end-time').focus(function () {
    $('#time-panel-end').show();
});
$('#end-time').click(function () {
    $('#time-panel-end').show();
});
$('body').focus(function () {
    setTimeout(function () {
        $('#time-panel-start').hide();
    }, 200)
    setTimeout(function () {
        $('#time-panel-end').hide();
    }, 200)
});


$('#time-panel-end ul li').click(function () {
    var selVal = $(this).attr('data-value');
    $('#end-time').val(formatTimeStr(selVal));
    $('#time-panel-end').hide();
});

$('#date-picker').datetimepicker({
    startView: 2,
    minView: 2,
    maxView: 2,
    autoclose: true,
    language: 'en'
}).on('changeDate', function (ev) {

    //alert(ev.date)
    var startMoment = moment(ev.date).subtract('days', 0); // 0 was 1

    //====Move calendar to the selected date
    $('#calendar').fullCalendar('gotoDate', startMoment);
});


$('#backgroundColor-control').colorpicker().on('changeColor', function (ev) {
    bodyStyle.backgroundColor = ev.color.toHex();
});
$('#backgroundColor').click(function () {
    $('#backgroundColor-control').colorpicker('show');
});

$('#borderColor-control').colorpicker().on('changeColor', function (ev) {
    bodyStyle.backgroundColor = ev.color.toHex();
});
$('#borderColor').click(function () {
    $('#borderColor-control').colorpicker('show');
});

$('#textColor-control').colorpicker().on('changeColor', function (ev) {
    bodyStyle.backgroundColor = ev.color.toHex();
});
$('#textColor').click(function () {
    $('#textColor-control').colorpicker('show');
});

$('#create-new-event').click(function () {
    alert('ygygjhgjkhjkhj');
    //==== show this panel if it is hidden
    $('#end-group').show();
    $('#remove-block').hide();

    var dt = new Date();

    var mm = dt.getMonth();
    var dd = dt.getDate();
    var yyyy = dt.getFullYear();

    var hours = dt.getHours();
    var minutes = dt.getMinutes();
    if (parseInt(mm) <= 9) mm = '0' + (parseInt(mm)+1);
    if (parseInt(dd) <= 9) dd = '0' + dd;
    if (minutes > 30) minutes = 30;
    else minutes = 0;
    var ehours = hours + 1;
    if (ehours >= 24) ehours = '0';
    var eminutes = minutes;
    if (parseInt(minutes) <= 9) minutes = '0' + minutes;
    if (parseInt(ehours) <= 9) ehours = '0' + ehours;
    if (parseInt(eminutes) <= 9) eminutes = '0' + eminutes;

    var curDate = yyyy + '-' + mm + '-' + dd + ' ' + hours + ':' + minutes;
    var curDateInput = yyyy + '-' + mm + '-' + dd;

    //===Selecting Multiple Calendar
    $('#eventForm fieldset').removeAttr('disabled');

    $('#myModal').modal({backdrop: 'static', keyboard: false});
    $('#myModalLabel').html('Create New Event');
    $('#myTab a:first').tab('show');
    $('#create-event').html('Create Event');
    $('#update-event').val('');

    //==== resetting fields
    document.getElementById('eventForm').reset();
    $('.checkbox-inline input, #allDay').removeAttr('checked');
    $('.repeat-box').hide();
    $('#hide-standard-settings').click();
    $('#hide-venue-settings').click();
    //$('.color-box').removeClass('color-box-selected');
    $('#backgroundColor').val('#3a87ad');
    $('#repeat_end_on').val('');
    $('#repeat_end_after').val('');
    $('#repeat_never').val('1');
    $('#ends-db-val').datetimepicker('remove');
    $('#ends-db-val').attr('readonly', 'readonly');

    //====Setting Date Fields
    $('#start-date').val(curDateInput);
    $('#end-date').val(curDateInput);
    $('#repeat_start_date').val(curDateInput);
    $('#start-time').val(hours + ':' + minutes);
    $('#end-time').val(ehours + ':' + eminutes);


    var jqxhr = $.ajax({
        type: 'POST',
        url: '/phpeventcal/server/ajax/events_manager.php',
        data: {action: 'LOAD_SELECTED_CALENDAR_FROM_SESSION'},
        dataType: 'json'
    })
        .done(function (selCal) {
            //====setting up values
            $('.selectpicker').selectpicker('val', selCal);
        })
        .fail(function () {
        });

    var jqxhr = $.ajax({
        type: 'POST',
        url: '/phpeventcal/server/ajax/events_manager.php',
        data: {action: 'LOAD_SELECTED_CALENDAR_COLOR'}
    })
        .done(function (selCalColor) {
            //====setting up values
            $('#backgroundColor').val(selCalColor);
            var selCalColorData = selCalColor.split('#');
            var colorID = 'cid_' + selCalColorData[1];
            $('#' + colorID).click();
        })
        .fail(function () {
        });

});

var repeat_on_sun = 0;
var repeat_on_mon = 0;
var repeat_on_tue = 0;
var repeat_on_wed = 0;
var repeat_on_thu = 0;
var repeat_on_fri = 0;
var repeat_on_sat = 0;
var repeat_week_days_checked = false;

function setRepeatOptionsForDays(stDate) {
    var stdUnix = new Date(stDate);
    var weekDay = stdUnix.getDay(stdUnix);

    repeat_week_days_checked = false;

    //==== reset the checkboxes
    if (repeat_on_sun == 1) $('#repeat_on_sun').click(function () {
        this.checked
    });
    if (repeat_on_mon == 1) $('#repeat_on_mon').click(function () {
        this.checked
    });
    if (repeat_on_tue == 1) $('#repeat_on_tue').click(function () {
        this.checked
    });
    if (repeat_on_wed == 1) $('#repeat_on_wed').click(function () {
        this.checked
    });
    if (repeat_on_thu == 1) $('#repeat_on_thu').click(function () {
        this.checked
    });
    if (repeat_on_fri == 1) $('#repeat_on_fri').click(function () {
        this.checked
    });
    if (repeat_on_sat == 1) $('#repeat_on_sat').click(function () {
        this.checked
    });

    repeat_on_sun = 0;
    repeat_on_mon = 0;
    repeat_on_tue = 0;
    repeat_on_wed = 0;
    repeat_on_thu = 0;
    repeat_on_fri = 0;
    repeat_on_sat = 0;

    //==== set repeat day checkboxes based on start date
    switch (weekDay) {
        case 0:
            $('#repeat_on_sun').click();
            repeat_on_sun = 1;
            repeat_week_days_checked = true;
            break;
        case 1:
            $('#repeat_on_mon').click();
            repeat_on_mon = 1;
            repeat_week_days_checked = true;
            break;
        case 2:
            $('#repeat_on_tue').click();
            repeat_on_tue = 1;
            repeat_week_days_checked = true;
            break;
        case 3:
            $('#repeat_on_wed').click();
            repeat_on_wed = 1;
            repeat_week_days_checked = true;
            break;
        case 4:
            $('#repeat_on_thu').click();
            repeat_on_thu = 1;
            repeat_week_days_checked = true;
            break;
        case 5:
            $('#repeat_on_fri').click();
            repeat_on_fri = 1;
            repeat_week_days_checked = true;
            break;
        case 6:
            $('#repeat_on_sat').click();
            repeat_on_sat = 1;
            repeat_week_days_checked = true;
            break;
    }

}


$('#start-date').change(function () {
    var thisDate = $(this).val();
    $('#end-date').val(thisDate);

    //==== set repeat options
    $('#repeat_start_date').val(thisDate);
    setRepeatOptionsForDays(thisDate);
});

$('#repeat_type').change(function () {
    var repeatType = $(this).val();
    var intervalLabel = 'weeks';
    $('#repeat_interval_group').show();
    $('#repeat_on_group').show();
    $('#repeat_by_group').hide();
    $('.repeat_by').removeAttr('checked');
    //$('#repeat_on_wed').removeAttr('checked');

    switch (repeatType) {
        case 'daily':
            $('#repeat_on_group').hide();
            intervalLabel = 'Days';
            break;
        case 'everyWeekDay':
            intervalLabel = '';
            $('#repeat_interval_group').hide();
            $('#repeat_on_group').hide();
            break;
        case 'everyMWFDay':
            intervalLabel = '';
            $('#repeat_interval_group').hide();
            $('#repeat_on_group').hide();
            break;
        case 'everyTTDay':
            intervalLabel = '';
            $('#repeat_interval_group').hide();
            $('#repeat_on_group').hide();
            break;
        case 'weekly':
            intervalLabel = 'Weeks';
            //$('#repeat_on_wed').attr('checked','checked');
            setRepeatOptionsForDays($('#start-date').val());
            break;
        case 'monthly':
            $('#repeat_on_group').hide();
            $('#repeat_by_group').show();
            $('#repeat_by_day_of_the_month').click();
            intervalLabel = 'Months';
            break;
        case 'yearly':
            intervalLabel = 'Years';
            $('#repeat_on_group').hide();
            break;
        case 'none':
        default :
            $('#repeat_on_group').hide();
            intervalLabel = 'Days';
            break;
    }
    $('#repeat_interval_label').html(intervalLabel);
});

$('#show-standard-settings').click(function () {
    $('.standard').fadeIn();
    $('.basic .show-link').hide();
    $('.standard').css('display', 'inline-block');
});

$('#hide-standard-settings').click(function () {
    $('.basic .show-link').fadeIn();
    $('.standard').hide();
    //$('.repeat-box').fadeOut();
    //$('.repeat-box').css('display','none');
    //$('#repeat').removeAttr('checked')
});

$('#show-reminder-settings').click(function () {
    $('.reminder').fadeIn();
    $('.basic-remind .show-link-remind').hide();
    $('.reminder').css('display', 'inline-block');
});

$('#hide-reminder-settings').click(function () {
    $('.basic-remind .show-link-remind').fadeIn();
    $('.reminder').hide();
});

$('#show-venue-settings').click(function () {
    $('.venue').fadeIn();
    $('.basic-venue .show-link-venue').hide();
    $('.venue').css('display', 'inline-block');
});

$('#hide-venue-settings').click(function () {
    $('.basic-venue .show-link-venue').fadeIn();
    $('.venue').hide();
});

var repeatChecked = false;
$('#repeat').click(function () {
    if (this.checked) {
        repeatChecked = true;
        $('.repeat-box').fadeIn();
        $('.repeat-box').css('display', 'inline-table');
        $('#repeat_type').val('daily');
        $('#repeat_on_group').hide();
        //setRepeatOptionsForDays($('#start-date').val());
    }
    else {
        repeatChecked = false;
        $('.repeat-box').fadeOut();
        $('.repeat-box').css('display', 'none');
    }
    //$('#repeat_on_group').hide();
});

var endsParamSelected = 'Never';
$('.ends-params').click(function () {
    var endsVal = $(this).attr('data-value');
    //==setting label
    $('#ends-status').html(endsVal);

    //===resetting
    $('#ends-after-label').css('display', 'none');
    $('#repeat_end_on').val('');
    $('#repeat_end_after').val('');
    $('#repeat_never').val('');
    $('#ends-db-val').val('');

    endsParamSelected = endsVal;
    switch (endsVal) {
        case 'On':
            $('#ends-db-val').datetimepicker({
                startView: 2,
                minView: 2,
                maxView: 2,
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd'
            });
            $('#ends-db-val').removeAttr('readonly');
            //$('#repeat_end_on').val('');
            break;
        case 'Never':
            $('#ends-db-val').datetimepicker('remove');
            $('#ends-db-val').attr('readonly', 'readonly');
            $('#repeat_never').val('1');
            break;
        case 'After':
            $('#ends-db-val').datetimepicker('remove');
            $('#ends-db-val').removeAttr('readonly');
            //$('#repeat_end_after').val('');
            $('#ends-after-label').css('display', 'inline-block');
            break;
    }
});

$('#ends-db-val').change(function () {
    var endsDBVal = $('#ends-db-val').val();
    switch (endsParamSelected) {
        case 'On':
            $('#repeat_end_on').val(endsDBVal);
            break;
        case 'Never':
            $('#repeat_never').val('1');
            break;
        case 'After':
            $('#repeat_end_after').val(endsDBVal);
            break;
    }
});

$('.color-box').click(function () {
    $('.color-box').html('&nbsp;');
    $('.color-box').removeClass('color-box-selected');
    $(this).addClass('color-box-selected');
    $(this).html('&nbsp;✔');
    var cVal = $(this).attr('data-color');
    $('#backgroundColor').val(cVal);
});

$('.cal-color-box').click(function () {
    $('.cal-color-box').html('&nbsp;');
    $('.cal-color-box').removeClass('color-box-selected');
    $(this).addClass('color-box-selected');
    $(this).html('&nbsp;✔');
    var cVal = $(this).attr('data-color');
    $('#cal-color').val(cVal);
});


$('#add-calendar').click(function () {
    $('#myModalCalendarCreate').modal({backdrop: 'static', keyboard: false});
});

$('#manage-calendar').click(function () {
    $('#myModalCalendarManage').modal({backdrop: 'static', keyboard: false});
});
//====== Export Calendar ========

$('#calManagerHolder').delegate('.exportCal','click',function(){
    var calID = $(this).data('vid');

    var jqxhr = $.ajax({
        type: "POST",
        url: "/phpeventcal/server/ajax/calendar_manager.php",
        data: {cID:calID, action: 'EXPORT_CALENDAR'}
    })
        .done(function (directory) {
            if(directory == 'fail'){
                $.bootstrapGrowl("This Calendar Has No Event!", {
                    type: 'danger',
                    width: 350
                });
            }
            else{
                $.bootstrapGrowl("Calendar Exported Successfully", {
                    type: 'success',
                    width: 350
                });

                setTimeout(function (){
                    location.href = directory;
                }, 3000);
            }
        })
        .fail(function () {
            $.bootstrapGrowl("Something went wrong, please try again later", {
                type: 'danger',
                width: 350
            });
        });
});
// ===== Delete Calendar ======

$('#calManagerHolder').delegate('.deleteCal','click',function(){
    var calID = $(this).data('vid');
    var conf = confirm("Are you sure to Delete the Calendar and it's events?");
    if(conf){
        var jqxhr = $.ajax({
            type: "POST",
            url: "/phpeventcal/server/ajax/calendar_manager.php",
            data: {cID:calID, action: 'DELETE_CALENDAR'}
        })
        .done(function (msg) {
            $.bootstrapGrowl("<div style='text-align: left'>Calendar Deleted Successfully</div>", {
                type: 'success',
                width: 450
            });
            location.reload();
        })
        .fail(function () {
            $.bootstrapGrowl("Something went wrong, please try again later", {
                type: 'danger',
                width: 350
            });
        });
    }

});

//====== Edit Calendar ==========
calEditForm = $('#calEditForm');
calEditForm.detach();

$('#calManagerHolder').delegate('.editCal','click',function(){
    $('#calName').val('');
    $('.color-box-selected').html('&nbsp;');
    $('.color-box-selected').removeClass('color-box-selected');

    shareForm.detach();
    calEditForm.detach();

    var calType = $(this).data('type');
    var calName = $(this).data('name');
    var calDesc = $(this).data('desc');
    var calColor = $(this).data('clr');
    var clrLine = calColor.split('#');
    clr = clrLine[1];
    var calPrivacy = "";
    calPrivacy = $(this).data('privacy');


    var parentId = $(this).parent().parent().attr('id');
    var calID = parentId.split('_');
    calID = calID[1];
    $('#'+parentId+' #shareCalendar').append(calEditForm);

     if(calType == 'url'){
         $('div#shareCalendar div#cal-edit-desc-group').hide();
         $('div#shareCalendar div#gcal-edit-desc-group').show();
         $('#gcalDescription').val(calDesc);
     }
     else{
        $('div#shareCalendar div#cal-edit-desc-group').show();
        $('div#shareCalendar div#gcal-edit-desc-group').hide();
        $('#calDescription').val(calDesc);
     }

    //console.log(calPrivacy);
    if(calPrivacy == 1){
        //$('input.cal-private').removeAttr("checked");
        $('input.cal-public').attr('checked','checked');
    }
    else{
       // $('.cal-public').removeAttr("checked");
        $('input.cal-private').attr('checked','checked');
    }

    var colorSelector = '#clr_'+clr;

    $('#calName').val(calName);
    $(colorSelector).addClass('color-box-selected');
    $(colorSelector).html('&nbsp;✔');
    var cVal = $(colorSelector).attr('data-color');
    $('#cal-color').val(cVal);
    $('#cal-id').val(calID);
});
//====== Update Calendar =======
$('#calManagerHolder').delegate('#updateCalendar','click',function(){
    var l = Ladda.create(this);
    l.start();
    var name = $('#calName').val();
    var cal_desc = $('#calDescription').val();
    if(cal_desc == '') cal_desc = $('#gcalDescription').val();
    //alert(cal_desc);
    var clr = $('#cal-color').val();
    var privacy = ($('#public').is(':checked')) ? 'public' : 'private';
    var cID = $('#cal-id').val();

    var jqxhr = $.ajax({
        type: "POST",
        url: "/phpeventcal/server/ajax/calendar_manager.php",
        data: {cID:cID, name:name, cal_desc:cal_desc, clr:clr, privacy:privacy, action: 'UPDATE_CALENDAR'}
    })
        .done(function (calJSON) {
            $.bootstrapGrowl(" Calendar Updated Successfully ", {
                type: 'success',
                width: 350
            });
            calEditForm.detach();
             setTimeout(function (){
             location.href = 'calendar.php';
             }, 3000);
        })
        .fail(function () {
            $.bootstrapGrowl("Something went wrong, please try again later", {
                type: 'danger',
                width: 350
            });
        })
        .always(function (){
            l.stop();
        });

    //== Reload



});
//====== Load Calendar shareForm =====
shareForm = $('#shareForm');
shareForm.detach();

$('span.share-icon').click(function () {
    shareForm.detach();
    calEditForm.detach();
    var parentId = $(this).parent().attr('id');
    $('#'+parentId+' #shareCalendar').append(shareForm);
    var calID = parentId.split('_');
    calID = calID[1];
    $('#link').val('');
    $('#email').val('');
    $('#message').val('');
    $('#link').val('//quickproductdemo.com/phpeventcal/guest/index.php?c='+calID);
    //http://localhost/highpitch_eventcal/guest/index.php?c=1
});

$('#calManagerHolder').delegate('#sendEmail','click',function (){
    //var parentId = $(this).parent().attr('id');
    var l = Ladda.create(this);
    l.start();

    var link = $('#link').val();
    var email = $('#email').val();
    var message = $('#message').val();
    if (isValidEmailAddress(email) == false || email == '') {
        $.bootstrapGrowl("<div style='text-align: left'>Invalid Email</div>", {
            type: 'warning',
            width: 450
        });
        l.stop();
        return false;
    }
    var jqxhr = $.ajax({
        type: "POST",
        url: "/phpeventcal/server/ajax/calendar_manager.php",
        data: {link:link, email:email, message:message, action: 'SHARE_CALENDAR'}
    })
        .done(function (calJSON) {
            $.bootstrapGrowl(" Calendar Shared Successfully ", {
                type: 'success',
                width: 350
            });
            shareForm.detach();
        })
        .fail(function () {
            $.bootstrapGrowl("Something went wrong, please try again later", {
                type: 'danger',
                width: 350
            });
        })
        .always(function (){
            l.stop();
        });

})

    //============= Change the Calendar Privace either Public or Private :)
$('.public').click(function () {
    var l = Ladda.create(this);
    l.start();
    var vpublic = $(this).attr("data-val");
    var vid = $(this).attr("data-vid");
    var parentID = $(this).parent().parent().attr('id');

    var jqxhr = $.ajax({
        type: "POST",
        url: "/phpeventcal/server/ajax/calendar_manager.php",
        data: {vid: vid, vpublic: vpublic, action: 'UPDATE_CAL_PUBLIC'}
    })
        .always(function (vPublic) {

            var chngPrivacy;
            var chngColor;
            var chngTxtColor;


            if (vpublic == 1) {
                chngPrivacy = "Make Private";
                chngColor = "#ffffff";
                vpublic = 0;
                chngTxtColor = "#000000";
                $('#'+parentID+' span.share-icon').addClass('glyphicon glyphicon-globe');
            }
            else {
                chngPrivacy = "Make Public";
                chngColor = "#f3f3f3";
                chngTxtColor = "#ffffff";
                vpublic = 1;
                $('#'+parentID+' span.share-icon').removeClass('glyphicon glyphicon-globe');
            }
            $.bootstrapGrowl(" Calendar Privacy Changed Successfully ", {
                type: 'success',
                width: 350
            });
            $('#'+parentID+' div.cactionss div.public span.ladda-label').html(chngPrivacy);
            $('#'+parentID+' div.cactionss div.public span.ladda-label').css('color',chngTxtColor);
            $('#'+parentID+' div.cactionss div.public').attr('data-val',vPublic);

            $('#'+parentID).css('background-color',chngColor);
            // If any shareForm is open while changing privacy, detach it
            shareForm.detach();
            //data-val
            /*
             setTimeout(function (){
             location.href = 'calendar.php';
             }, 2000);
             */
        })
        .fail(function () {
            $.bootstrapGrowl("Something went wrong, please try again later", {
                type: 'danger',
                width: 350
            });
        });

    l.stop();
});

$('#create-calendar').click(function () {
    var calName = $('#name').val();
    if (calName == '') {
        $.bootstrapGrowl("<div style='text-align: left'>Calendar Name is required</div>", {
            type: 'warning',
            width: 450
        });

        return false;
    }

    var formData = $('#myModalCalendarCreateFrom').serializeArray();

    var jqxhr = $.ajax({
        type: "POST",
        url: "/phpeventcal/server/ajax/calendar_manager.php",
        data: formData
    })
        .done(function (calJSON) {
            var uid = $('#update-calendar').val();
            var calData = $.parseJSON(calJSON);
            var calName = calData.name;
            var calID = calData.id;
            var calColor = calData.color;

            if (parseInt(uid) > 0) {
                //edit calendar

            }
            else {
                var calContent = '<a href="javascript:void(0);" class="list-group-item ladda-button new-cal" data-style="expand-right" style="background-color: ' + calColor + '; color:white;" id="' + calID + '" ><span class="ladda-label">' + calName + '</span></a>';
                $('#my-calendars div.list-group').append(calContent);
                $('.new-cal').click();
                $('.new-cal').removeClass('new-cal');
            }
            $('#myModalCalendarCreate').modal('hide');
            $.bootstrapGrowl("Calendar Created Successfully", {
                type: 'success',
                width: 350
            });

            setTimeout(function () {
                location.href = 'calendar.php';
            }, 2000);

        })
        .fail(function () {
            $.bootstrapGrowl("Something went wrong, please try again later", {
                type: 'danger',
                width: 350
            });
        })
});

//        $('.list-group').delegate(".list-group-item .unselect-calendar","click", function (e){
//            alert($(this).attr('class'));
//        });

$('#list-group').delegate(".list-group-item", "click", function (e) {
    e.preventDefault();
    var cid = new Array();
    var thisObj = new Array();
    var unselectClickedItem = false;

    //===clearing blocks
    $('.list-group-item .ladda-spinner').remove();
    $('.list-group-item .ladda-progress').remove();

    //===Get the current calendar item's ID
    var calendarItemClicked = $(this).attr('id');
    //alert(calendarItemClicked)

    //===Find if the clicked item is requested for unselect
    $('.list-group-item span').each(function () {
        if ($(this).hasClass('unselect-calendar')) {
            if ($(this).parent().attr('id') == calendarItemClicked) {
                unselectClickedItem = true;
            }
            //alert($('#'+calendarItemClicked+' span.ladda-label').html())
        }
    });

    var l = Ladda.create(this);
    l.start();

    $('.list-group-item span').each(function () {
        if ($(this).hasClass('ladda-spinner')) {
            $(this).parent().addClass('selected');
        }
    });

    var tickHTMLLObjSelected = '<span class="glyphicon glyphicon-remove unselect-calendar"></span><span class="glyphicon glyphicon-ok" style="float: right"></span>';

    var i = 0;
    $('.list-group-item').each(function () {
        if ($(this).hasClass('selected')) {
            if (unselectClickedItem == true && $(this).attr('id') == calendarItemClicked) {
                $('#' + calendarItemClicked + ' span.glyphicon').remove();
                $('#' + calendarItemClicked).removeClass('selected');
                unselectClickedItem = false;
            }
            else {
                thisObj[i] = $(this);
                cid[i] = $(this).attr('id');
                //alert(cid[i])
                i = i + 1;
            }
        }
    });

        //alert(thisObj.length)

    $.post("/phpeventcal/server/ajax/events_manager.php",
        { calendarID: cid, action: 'LOAD_EVENTS_BASED_ON_CALENDAR_ID'},
        function (eventJSON) {
        }, "json")
        .always(function (eventJSON) {
            if (eventJSON.title == 'CALENDARS___HAVE___URL') {
                location.href = '/phpeventcal/calendar.php';
            }
            ;
            $('#calendar').fullCalendar('removeEvents');
            $('#calendar').fullCalendar('addEventSource', eventJSON);
            l.stop();

            $('.list-group-item span.glyphicon').remove();
            var j;
            for (j = 0; j < thisObj.length; j = j + 1) {
                thisObj[j].append(tickHTMLLObjSelected);
            }

            var jqxhr = $.ajax({
                type: 'POST',
                url: '/phpeventcal/server/ajax/events_manager.php',
                data: {action:'LOAD_SELECTED_CALENDAR_FROM_SESSION'},
                dataType: 'json'
            })
                .done(function(selCal) {
                    //====setting up values
                    //$('.selectpicker').selectpicker('val', selCal);
                    $('#select-calendar').val(selCal);
                    $('#select-calendar').selectpicker('refresh');
                })
                .fail(function() {
                });
        }, "json");

    return false;
});

//===== Public Calendar List Load
$('#list-group-public').delegate(".list-group-item-public", "click", function (e) {
    e.preventDefault();
    var cid = new Array();
    var thisObj = new Array();
    var unselectClickedItem = false;

    //===clearing blocks
    $('.list-group-item-public .ladda-spinner').remove();
    $('.list-group-item-public .ladda-progress').remove();

    //===Get the current calendar item's ID
    var calendarItemClicked = $(this).attr('id');
    //alert(calendarItemClicked)

    //===Find if the clicked item is requested for unselect
    $('.list-group-item-public span').each(function () {
        if ($(this).hasClass('unselect-calendar')) {
            if ($(this).parent().attr('id') == calendarItemClicked) {
                unselectClickedItem = true;
            }
            //alert($('#'+calendarItemClicked+' span.ladda-label').html())
        }
    });

    var l = Ladda.create(this);
    l.start();

    $('.list-group-item-public span').each(function () {
        if ($(this).hasClass('ladda-spinner')) {
            $(this).parent().addClass('selected');
        }
    });

    var tickHTMLLObjSelected = '<span class="glyphicon glyphicon-remove unselect-calendar"></span><span class="glyphicon glyphicon-ok" style="float: right"></span>';

    var i = 0;
    $('.list-group-item-public').each(function () {
        if ($(this).hasClass('selected')) {
            if (unselectClickedItem == true && $(this).attr('id') == calendarItemClicked) {
                $('#' + calendarItemClicked + ' span.glyphicon').remove();
                $('#' + calendarItemClicked).removeClass('selected');
                unselectClickedItem = false;
            }
            else {
                thisObj[i] = $(this);
                cid[i] = $(this).attr('id');
                //alert(cid[i])
                i = i + 1;
            }
        }
    });

    //alert(thisObj.length)

    $.post("/phpeventcal/server/ajax/events_manager.php",
        { calendarID: cid, action: 'LOAD_PUBLIC_EVENTS_BASED_ON_CALENDAR_ID'},
        function (eventJSON) {
        }, "json")
        .always(function (eventJSON) {
            if (eventJSON.title == 'CALENDARS___HAVE___URL') {
                location.href = '/phpeventcal/calendar.php';
            }
            ;

            $('#calendar').fullCalendar('removeEvents');
            $('#calendar').fullCalendar('addEventSource', eventJSON);
            l.stop();

            $('.list-group-item-public span.glyphicon').remove();
            var j;
            for (j = 0; j < thisObj.length; j = j + 1) {
                thisObj[j].append(tickHTMLLObjSelected);
            }
        }, "json");
    return false;
});


//======= New Calendar Load =================

$('.list-group').delegate(".new-cal", "click", function (e) {
    e.preventDefault();
    var cid = new Array();
    var thisObj = new Array();
    var unselectClickedItem = false;

    //===clearing blocks
    $('.list-group-item .ladda-spinner').remove();
    $('.list-group-item .ladda-progress').remove();

    //===Get the current calendar item's ID
    var calendarItemClicked = $(this).attr('id');
    //alert(calendarItemClicked)

    //===Find if the clicked item is requested for unselect
    $('.list-group-item span').each(function () {
        if ($(this).hasClass('unselect-calendar')) {
            if ($(this).parent().attr('id') == calendarItemClicked) {
                unselectClickedItem = true;
            }
            //alert($('#'+calendarItemClicked+' span.ladda-label').html())
        }
    });

    var l = Ladda.create(this);
    l.start();

    $('.list-group-item span').each(function () {
        if ($(this).hasClass('ladda-spinner')) {
            $(this).parent().addClass('selected');
        }
    });

    var tickHTMLLObjSelected = '<span class="glyphicon glyphicon-remove unselect-calendar"></span><span class="glyphicon glyphicon-ok" style="float: right"></span>';

    var i = 0;
    $('.list-group-item').each(function () {
        if ($(this).hasClass('selected')) {
            if (unselectClickedItem == true && $(this).attr('id') == calendarItemClicked) {
                $('#' + calendarItemClicked + ' span.glyphicon').remove();
                $('#' + calendarItemClicked).removeClass('selected');
                unselectClickedItem = false;
            }
            else {
                thisObj[i] = $(this);
                cid[i] = $(this).attr('id');
                //alert(cid[i])
                i = i + 1;
            }
        }
    });

    //alert(thisObj.length)

    $.post("/phpeventcal/server/ajax/events_manager.php",
        { calendarID: cid, action: 'LOAD_EVENTS_BASED_ON_CALENDAR_ID'},
        function (eventJSON) {
        }, "json")
        .always(function (eventJSON) {
            if (eventJSON.title == 'CALENDARS___HAVE___URL') {
                location.href = '/phpeventcal/calendar.php';
            }
            ;

            $('#calendar').fullCalendar('removeEvents');
            $('#calendar').fullCalendar('addEventSource', eventJSON);
            l.stop();

            $('.list-group-item span.glyphicon').remove();
            var j;
            for (j = 0; j < thisObj.length; j = j + 1) {
                thisObj[j].append(tickHTMLLObjSelected);
            }
        }, "json");
    return false;
});
    //======= New Calendar Load End


$('#cal-settings-link').click(function () {
    $('#myModalCalendarSettings').modal({backdrop: 'static', keyboard: false});
});

$('#calendar-settings-save').click(function () {
    var formData = $('#myModalCalendarSettingsFrom').serializeArray();

    var jqxhr = $.ajax({
        type: "POST",
        url: "/phpeventcal/server/ajax/calendar_manager.php",
        data: formData
    })
        .done(function (calJSON) {
            $('#myModalCalendarCreate').modal('hide');
            $('#myModalCalendarSettingsFrom fieldset').attr('disabled', 'disabled')
            $.bootstrapGrowl("Calendar Settings Saved Successfully", {
                type: 'success',
                width: 350
            })

            setTimeout(function () {
                location.href = '/phpeventcal/calendar.php';
            }, 3000);
        })
        .fail(function () {
            $.bootstrapGrowl("Something went wrong, please try again later", {
                type: 'danger',
                width: 350
            });
        });


});

    //=========== Show-Hide end-group on change allDay
$('#allDay').change(function () {
    if (this.checked) {
        $('#end-group').hide();
    }
    else {
        $('#end-group').show();
    }
});
/*
 $('#allDay').click(function (){
 if(allDay == true){
 $('#end-group').hide();
 allDay = false;
 }
 else {
 $('#end-group').show();
 allDay = true;
 }
 });
 */
$('#select-calendar').change(function () {
    //alert($(this).val());
    var color = $(this).find(':selected').attr('data-color')
    var colorData = color.split('#');
    var cid = 'cid_' + colorData[1];
    $('#' + cid).click();
});

$('#remove-link').click(function () {
    var l = Ladda.create(this);
    l.start();

    var eid = $(this).attr('data-event-id');

    $.post("/phpeventcal/server/ajax/events_manager.php",
        { eventID: eid, action: 'REMOVE_THIS_EVENT'},
        function (eventJSON) {
        }, "json")
        .always(function (eventJSON) {
            $('#calendar').fullCalendar('removeEvents', eid);
            $('#myModal').modal('hide');
            $.bootstrapGrowl("<div style='text-align: left'>Event Removed Successfully</div>", {
                type: 'success',
                width: 450
            });
            l.stop();

        }, "json");
});

$('#gcal-add-link').click(function () {
    $('#gcal-add-link').attr('disabled', 'disabled');
    $('#gcal-add-link').addClass('active');
    $('#gcal-back-link').fadeIn();
    $('#gcal-add-desc-group').show();
    $('#cal-add-desc-group').hide();
    $('#type').val('url');

});

$('#gcal-back-link').click(function () {
    $('#gcal-add-link').removeAttr('disabled');
    $('#gcal-add-link').removeClass('active');
    $('#gcal-back-link').fadeOut();
    $('#gcal-add-desc-group').hide();
    $('#cal-add-desc-group').show();
    $('#type').val('user');
});

//----- File Uploader JS -----//

$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
            '//jquery-file-upload.appspot.com/' : 'server/file-uploader/',
        uploadButton = $('<button/>')
            .addClass('btn btn-primary')
            .attr('type','button')
            .prop('disabled', true)
            .text('Processing...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
    //console.log(url);
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        formData: [{ name: 'custom_dir', value: '/phpeventcal/uploads/' }],
        autoUpload: false,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        maxFileSize: 999000,
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 100,
        previewMaxHeight: 100,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {
        $('#files').children('div').remove();
        data.context = $('<div/>').appendTo('#files');
        $.each(data.files, function (index, file) {
            $('#imageName').val(file.name);
            var node = $('<p/>')
                .append($('<span/>').text(file.name));
            if (!index) {
                node
                    .append('<br>')
                    .append(uploadButton.clone(true).data(data));
            }
            node.appendTo(data.context);
        });
    }).on('fileuploadprocessalways', function (e, data) {
        var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
        if (file.preview) {
            node
                .prepend('<br>')
                .prepend(file.preview);
        }
        if (file.error) {
            node
                .append('<br>')
                .append($('<span class="text-danger"/>').text(file.error));
        }
        if (index + 1 === data.files.length) {
            data.context.find('button')
                .text('Upload')
                .prop('disabled', !!data.files.error);
        }
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {
            if (file.url) {
                var link = $('<a>')
                    .attr('target', '_blank')
                    .prop('href', file.url);
                $(data.context.children()[index])
                    .wrap(link);
            } else if (file.error) {
                var error = $('<span class="text-danger"/>').text(file.error);
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            }
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index) {
            var error = $('<span class="text-danger"/>').text('File upload failed.');
            $(data.context.children()[index])
                .append('<br>')
                .append(error);
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});


});

function eventRenderer(calEvent,jsEvent,view,userRole,shortdateFormat, longdateFormat){

$('#eventForm fieldset').removeAttr('disabled');
document.getElementById('eventForm').reset();

//===Clearing Reminder Settings Panel
$('#hide-reminder-settings').click();
serial = 1;
$('#guest-list div').remove();

//===get current view
var view = $('#calendar').fullCalendar('getView');
$('#currentView').val(view.name);

$('.basic').show();
$('.standard').hide();
$('.repeat-box').fadeOut();
$('.repeat-box').css('display','none');
$('#repeat').removeAttr('checked')
$('#show-link').show();
$('#repeat_by_group').hide();

var jqxhr = $.ajax({
    type: 'POST',
    url: '//quickproductdemo.com/phpeventcal/server/ajax/events_manager.php',
    data: {eventID:calEvent.id,action:'LOAD_SINGLE_EVENT_BASED_ON_EVENT_ID'},
    dataType: 'json'
})
    .done(function(ed) {

        $('#myModal').modal('show');
        var modalTitle = 'Edit Event: <b>'+ calEvent.title.toUpperCase() + '</b> <br >' +  $.fullCalendar.moment(calEvent.start).format(longdateFormat+' HH:mm');
        $('#myModalLabel').html(modalTitle);
        $('#myTab a:first').tab('show');

        //====setting up values

        $('#title').val(calEvent.title);
        var startMoment = moment(ed.start_date+' '+ed.start_time)
        $('#start-date').val(startMoment.format('YYYY-MM-DD'));
        $('#start-time').val(startMoment.format('HH:mm'));            

        var endMiliseconds = Date.parse(calEvent.end);
        var endMoment = '';
        endMoment = moment(calEvent.end);

        if(calEvent.end == null && (calEvent.allDay!='on' || ed.allDay!='on'  )){
            if(ed.end_date == null || ed.end_date == '' || calEvent.end == null){
                var dePrepDate = ed.start_date.split('-');
                var dePrepTime = ed.start_time.split(':');
                var dePrep = new Date(dePrepDate[0],dePrepDate[1]-1,dePrepDate[2],parseInt(dePrepTime[0])+1,dePrepTime[1],0,0);
                endMoment = moment(dePrep)
            }
            else {
                var dePrepDate = ed.end_date.split('-');
                var dePrepTime = ed.end_time.split(':');
                var dePrep = new Date(dePrepDate[0],dePrepDate[1],dePrepDate[2],dePrepTime[0],dePrepTime[1],0,0);
                endMoment = moment(dePrep)
            }
        }

        if(calEvent.end != null){
            $('#end-date').val(endMoment.format('YYYY-MM-DD'));
            $('#end-time').val(endMoment.format('HH:mm'));
        }

        if(calEvent.allDay == 'on' || calEvent.allDay == true || ed.allDay == 'on' || ed.allDay == true) {
            $('#end-group').hide();
            $('#allDay').attr('checked','checked');
        }
        else {
            $('#end-group').show();
            $('#allDay').removeAttr('checked');
        }

        $('#url').val(calEvent.url);
        $('#backgroundColor').val(calEvent.backgroundColor);
        $('#borderColor').val(calEvent.borderColor);
        $('#textColor').val(calEvent.textColor);

        if(calEvent.image == null || calEvent.image == ""){
            $('#files').children('div').remove();
        }
        else{
            $('#imageName').val(calEvent.image);
            var imgHtml = '<div><img style="height: 100px; width: 100px;" src="uploads/'+calEvent.image+'" alt="No Image" /></div>';
            $('#files').children('div').remove();
            $('#files').append(imgHtml);
        }
        var thumb = (calEvent.thumbnail == 1) ? 'yes' : 'no';
        $('#thumbnail_'+thumb).attr('checked','checked');

        $('#create-event').html('Update Event');
        $('#update-event').val(calEvent.id);
        //alert(calEvent.id)


        //====setting data from AJAX load
        $('#repeat_type').val('none');
        $('#repeat_interval').val('1');
        $('#repeat_on_mon').removeAttr('checked');
        $('#repeat_on_sun').removeAttr('checked');
        $('#repeat_on_tue').removeAttr('checked');
        $('#repeat_on_wed').removeAttr('checked');
        $('#repeat_on_thu').removeAttr('checked');
        $('#repeat_on_fri').removeAttr('checked');
        $('#repeat_on_sat').removeAttr('checked');
        $('#repeat_on_group').hide();

        $('#ends-status').html('Never');

        $('#repeat_start_date').val(ed.start_date);

        if(ed.repeat_type =='none' || ed.repeat_type == null) {}
        else {
            //==== If it is repeat event then get the date from eventClick Object
            var startMoment = moment(calEvent.start)
            $('#start-date').val(startMoment.format('YYYY-MM-DD'));
            $('#start-time').val(startMoment.format('HH:mm'));

            var repeatType = ed.repeat_type;
            var intervalLabel = 'weeks';
            $('#repeat_interval_group').show();
            $('#repeat_on_group').show();

            switch (repeatType){
                case 'daily':
                    $('#repeat_on_group').hide();
                    intervalLabel = 'Days';
                    break;
                case 'everyWeekDay':
                    intervalLabel = '';
                    $('#repeat_interval_group').hide();
                    $('#repeat_on_group').hide();
                    break;
                case 'everyMWFDay':
                    intervalLabel = '';
                    $('#repeat_interval_group').hide();
                    $('#repeat_on_group').hide();
                    break;
                case 'everyTTDay':
                    intervalLabel = '';
                    $('#repeat_interval_group').hide();
                    $('#repeat_on_group').hide();
                    break;
                case 'weekly':
                    intervalLabel = 'Weeks';
                    //$('#repeat_on_wed').attr('checked','checked');
                    break;
                case 'monthly':
                    intervalLabel = 'Months';
                    $('#repeat_by_group').show();
                    $('#repeat_on_group').hide();
                    if(ed.repeat_by == 'repeat_by_day_of_the_month') $('#repeat_by_day_of_the_month').click();
                    if(ed.repeat_by == 'repeat_by_day_of_the_week') $('#repeat_by_day_of_the_week').click();

                    break;
                case 'yearly':
                    intervalLabel = 'Years';
                    $('#repeat_on_group').hide();
                    break;
                case 'none':
                default :
                    var intervalLabel = 'weeks';
                    break;
            }
            $('#repeat_interval_label').html(intervalLabel);

            //$('#show-standard-settings').click();
            $('#repeat').click();
            $('#repeat_type').val(ed.repeat_type);

            if(ed.repeat_type == 'weekly')$('#repeat_on_group').show();

            $('#repeat_interval').val(ed.repeat_interval);
            if(ed.repeat_on_sun == '1') $('#repeat_on_sun').click();
            if(ed.repeat_on_mon == '1') $('#repeat_on_mon').click();
            if(ed.repeat_on_tue == '1') $('#repeat_on_tue').click();
            if(ed.repeat_on_wed == '1') $('#repeat_on_wed').click();
            if(ed.repeat_on_thu == '1') $('#repeat_on_thu').click();
            if(ed.repeat_on_fri == '1') $('#repeat_on_fri').click();
            if(ed.repeat_on_sat == '1') $('#repeat_on_sat').click();

            $('#repeat_start_date').val(ed.repeat_start_date);
            if(ed.repeat_end_on != '0000-01-01') {
                $('#repeat_end_on').val(ed.repeat_end_on);
                $('#ends-db-val').removeAttr('readOnly');
                $('#ends-db-val').val(ed.repeat_end_on);
                $('#repeat_never').val('');
                $('#ends-status').html('On');
            }
            if(ed.repeat_end_after != '0') {
                $('#repeat_end_after').val(ed.repeat_end_after);
                $('#ends-db-val').removeAttr('readOnly');
                $('#ends-db-val').val(ed.repeat_end_after);
                $('#repeat_never').val('');
                $('#ends-status').html('After');
            }
            if(ed.repeat_never != '0') {
                $('#repeat_end_after').val(ed.repeat_end_after);
                $('#ends-db-val').attr('readOnly','readOnly');
                $('#ends-db-val').removeAttr('value');
                $('#repeat_never').val('1');
                $('#ends-status').html('Never');
            }
        }
        if(ed.allDay == 'on'){
            //$('#show-standard-settings').click();
        }

        //====setting up selected calendar values
        $('#select-calendar').selectpicker('val', [ed.cal_id]);
        //$('.select-calendar-cls').css('opacity','0.35');
        //$('#select-calendar').attr('disabled','disabled');

        //alert(ed.location);
        $('#location').val(ed.location);
        $('#url').val(ed.url);
        $('#select-organizer').selectpicker('val', ed.organizer);
        $('#select-resource').selectpicker('val', ed.resource);
        $('#select-venue').selectpicker('val', ed.venue);

        $('#description').val(ed.description);
        $('#backgroundColor').val(ed.backgroundColor);
        $('.color-box-selected').html(' ');
        $('.color-box').removeClass('color-box-selected');

        $('.color-box').each(function (){
            var cv = $(this).attr('data-color');
            if(cv == ed.backgroundColor) {
                $(this).addClass('color-box-selected');
                $(this).html('&nbsp;✔');
            }
        });

        $('#reminder_type').val(ed.reminder_type);
        $('#reminder_time').val(ed.reminder_time);
        $('#reminder_time_unit').val(ed.reminder_time_unit);
        $('#free_busy').val(ed.free_busy);
        $('#privacy').val(ed.privacy);

        //====User Previlleged section
        //===============================================
        //====Add event remove link
        if(userRole == 'super' || userRole == 'admin'){
            $('#remove-block').fadeIn(2500);
            $('#remove-link').attr('data-event-id',calEvent.id);
        }

        //====Standard Settings
        //===============================================
        $('#hide-standard-settings').click()
        if((ed.location != null && ed.location!='') || (ed.url != null && ed.url!='')  || (ed.description != null && ed.description!='')) $('#show-standard-settings').click();

        //===Setting Data for Event Reminder if any

        if(ed.reminderData && ed.reminderData.length > 0){
            var i;
            var reminderType;
            var reminderTime;
            var reminderTimeUnit;
            for(i=0;i < ed.reminderData.length; i++){
                //=== for first reminder option
                //alert(i)
                if(i==0){
                    $('#reminder_type_1').val(ed.reminderData[i].type);
                    $('#reminder_time_1').val(ed.reminderData[i].time);
                    $('#reminder_time_unit_1').val(ed.reminderData[i].time_unit);
                }
                if(i==1){
                    //alert(reminder2Obj)
                    reminder2Obj.appendTo('#reminder-holder');
                    $('#reminder_type_2').val(ed.reminderData[i].type);
                    $('#reminder_time_2').val(ed.reminderData[i].time);
                    $('#reminder_time_unit_2').val(ed.reminderData[i].time_unit);
                }
                if(i==2){
                    //alert(reminder3Obj)
                    reminder3Obj.appendTo('#reminder-holder');
                    $('#reminder_type_3').val(ed.reminderData[i].type);
                    $('#reminder_time_3').val(ed.reminderData[i].time);
                    $('#reminder_time_unit_3').val(ed.reminderData[i].time_unit);
                }
            }
        }

        if(ed.reminderGuests && ed.reminderGuests.length > 0){
            var i;
            var guestEmail;
            var reminderID;
            serial = 1;
            var guestView;

            for(i = 0; i < ed.reminderGuests.length; i++){
                guestEmail = ed.reminderGuests[i].email;
                reminderID = ed.reminderGuests[i].id;
                guestView = '<div id=\"guest_'+serial+'\"> <input class=\"form-control guest-view guest_email reminder_add_guest_in\" id=\"guest_list_'+serial+'\" name=\"guests[]\" value=\"'+guestEmail+'\"><button class=\"close_guest\" aria-hidden=\"true\" data-dismiss=\"guest\" type=\"button\">×</button></div>';
                $('#guest-list').append(guestView);
                serial = serial + 1;
            }
            $('.close_guest').click(function(){
                $(this).parent().remove();
            });

        }

    })
    .fail(function() {
    });
/*
 var jqxhr = $.ajax({
 type: 'POST',
 url: '$this->webURL/server/ajax/user_manager.php',
 data: {action:'LOAD_USER_DATA'},
 })
 .done(function(selCalColor) {
 })
 .fail(function() {
 });
 */

}

function formatTime(dateStr) {
var d = new Date(dateStr);
var hh = d.getHours();
var m = d.getMinutes();
var dd = "AM";
var h = hh;
if (h >= 12) {
    h = hh - 12;
    dd = "PM";
}
if (h == 0) {
    h = 12;
}
m = m < 10 ? "0" + m : m;

h = h < 10 ? "0" + h : h;

var replacement = h + ":" + m;
replacement += " " + dd;

return replacement;
}

// format time displayed
function formatTimeStr(dateStr) {


    return dateStr;

}

function isValidEmailAddress(emailAddress) {
var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
return pattern.test(emailAddress);
}
;

function hideReminder2() {
reminder2Obj.appendTo('#reminder-holder');
reminder2Obj = $('#reminder2').detach();
}
function hideReminder3() {
reminder3Obj.appendTo('#reminder-holder');
reminder3Obj = $('#reminder3').detach();
}

function processMovedEvent(event, revertFunc, jsEvent, ui, view) {
var eventID = event.id;
var title = event.title;
var allDay = event.allDay;
//====Full Calendar has a bug that returns allDay param as a HTML Object instead of boolean when hold time pointer and release event is triggered.
//====But it seems OK for drag and drop event
if (allDay && typeof(allDay) != 'object') allDay = '1';
else allDay = '0';

var startMoment = moment(event.start)
var sdate = startMoment.format('YYYY-MM-DD');
var stime = startMoment.format('HH:mm');


if (event.end != null) {
    var endMoment = moment(event.end)
    var edate = endMoment.format('YYYY-MM-DD');
    var etime = endMoment.format('HH:mm');
}
else if(allDay == '0'){
    var edate = startMoment.format('YYYY-MM-DD');
    var etime = startMoment.add('h',1).format('HH:mm');
}

if (!confirm('Are you sure about this change?')) {
    revertFunc();
}
else {
    var jqxhr = $.ajax({
        type: 'POST',
        url: '/phpeventcal/server/ajax/events_manager.php',
        data: {action: 'SAVE_MOVED_EVENT', sdate: sdate, edate: edate, stime: stime, etime: etime, eventID: eventID, title: title, allDay: allDay}
    })
        .done(function (msg) {
            if (msg == 'failed') {
                $.bootstrapGrowl('Something went wrong, please try again later', {
                    type: 'danger',
                    width: 350
                });
            }
            else if (msg == 'repeating') {
                revertFunc();
                $.bootstrapGrowl('<div style="text-align: left">Sorry! This operation is not supported for repeating events. Please try Editing instead</div>', {
                    type: 'warning',
                    width: 350
                });
            }
            else {
                $.bootstrapGrowl('Event Modified Successfully', {
                    type: 'success',
                    width: 350
                });
            }
        })
        .fail(function () {
            $.bootstrapGrowl('Something went wrong, please try again later', {
                type: 'danger',
                width: 350
            });
        });
}
}


</script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=sdfasdfasdfas" type="text/javascript"></script> -->


</body>
</div>
<script>
      $(".chosen-select").chosen({
  no_results_text: "Oops, nothing found!"
})
  </script>
