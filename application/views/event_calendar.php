  <div class="container container-sm clearfix">
    <div class="row">
      <div class="col-12 col-md-12 box1">
        <div class="col-12 col-md-12 col-lg-12 demo box1-1 py-3" style="background-color: white !important;">
            <div id="calendar"></div>
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
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo base_url();?>assets/js/calendar/calendar-main.js"></script>
<script src="<?php echo base_url(); ?>assets/js/contact.js"></script>


<script>
    var events  = <?php echo $event_result;?>;
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    
    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        //initialDate: '2020-09-14',
        defaultView:'month',
        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectMirror: true,
        eventClick: function (arg) {
            $.ajax({
                url     :   baseURL+'getEventData/'+arg.event.groupId,
                method  :   'GET',
                success: function(response) {
                    // console.log(response);
                    var res = JSON.parse(response);
                    // console.log(res.data);
                    if(res.st === parseInt(1)){
                        $("#event_modal_data").modal('show');
                        $("#view_title").val(res.data.event_title);   
                        $("#view_description").val(res.data.event_description);   
                        $("#view_event_location").val(res.data.event_location);   
                        $("#view_event_type").val(res.data.event_type);   
                        $("#view_start_date").val(res.data.event_start_date);   
                        $("#view_end_date").val(res.data.event_end_date);   
                    }
                }
            });
        },
        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: events
    });

    calendar.render();
  });
</script>
