<!-- simplebar js -->
<script src="{{ asset('public/backend/assets/plugins/simplebar/js/simplebar.js')}}"></script>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('public/backend/assets/js/jquery.min.js')}}"></script>
<script src="{{ asset('public/backend/assets/js/popper.min.js')}}"></script>
<script src="{{ asset('public/backend/assets/js/bootstrap.min.js')}}"></script>

<!-- loader scripts -->
<!-- <script src="{{ asset('public/backend/assets/js/jquery.loading-indicator.js')}}"></script> -->

<!-- Index js -->
<!-- Don't put index.js it will crash with data-tables -->

<!-- sidebar-menu js -->
<script src="{{ asset('public/backend/assets/js/sidebar-menu.js')}}"></script>

<!-- Custom scripts -->
<script src="{{ asset('public/backend/assets/js/app-script.js')}}"></script>

<!-- Chart js -->
<script src="{{ asset('public/backend/assets/plugins/Chart.js/Chart.min.js')}}"></script>

<!-- Vector map JavaScript -->
<script src="{{ asset('public/backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{ asset('public/backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>

<!-- Easy Pie Chart JS -->
<script src="{{ asset('public/backend/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>

<!-- Sparkline JS -->
<script src="{{ asset('public/backend/assets/plugins/sparkline-charts/jquery.sparkline.min.js')}}"></script>
<script src="{{ asset('public/backend/assets/plugins/jquery-knob/excanvas.js')}}"></script>
<script src="{{ asset('public/backend/assets/plugins/jquery-knob/jquery.knob.js')}}"></script>
<script>
$(function() {
    $(".knob").knob();
});
</script>

<!-- Summernote JS -->
<script src="{{ asset('public/backend/assets/plugins/summernote/dist/summernote-bs4.min.js')}}"></script>
<script>
$('#summernoteEditor').summernote({
    height: 400,
    tabsize: 2
});
</script>

<!-- ToastR plugins -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script>
@if(Session::has('message'))
var type = "{{ Session::get('alert-type', 'info') }}";
switch (type) {
    case 'info':
        toastr.info("{{ Session::get('message') }}");
        break;

    case 'warning':
        toastr.warning("{{ Session::get('message') }}");
        break;

    case 'success':
        toastr.success("{{ Session::get('message') }}");
        break;

    case 'error':
        toastr.error("{{ Session::get('message') }}");
        break;
}
@endif
</script>
<!-- End of ToastR plugins -->

<!-- SweetAlert2 Plugins -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
$(document).on("click", "#delete", function(e) {
    e.preventDefault();
    var link = $(this).attr("href");

    swal.fire({

            title: 'Are you sure?',
            text: "Once Delete, This will be Permanently delete!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'

        })
        .then((result) => {
            if (result.value) {
                /**
                 * 
                 * this link= variable and it called at the first of line
                 * it will deleted the href="" where the id="delete" passed
                 * 
                 **/
                window.location.href = link;
            } else {
                swal.fire(
                    'Safe!',
                    'Your file is safe!',
                    'success'
                );
            }
        });

});
</script>
<!-- SweetAlert2 Plugins -->



<!--Data Tables js-->
<script src="{{ asset('public/backend/assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('public/backend/assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('public/backend/assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('public/backend/assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('public/backend/assets/plugins/bootstrap-datatable/js/jszip.min.js')}}"></script>
<script src="{{ asset('public/backend/assets/plugins/bootstrap-datatable/js/pdfmake.min.js')}}"></script>
<script src="{{ asset('public/backend/assets/plugins/bootstrap-datatable/js/vfs_fonts.js')}}"></script>
<script src="{{ asset('public/backend/assets/plugins/bootstrap-datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('public/backend/assets/plugins/bootstrap-datatable/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('public/backend/assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js')}}"></script>

<script>
$(document).ready(function() {
    //Default data table
    $('#default-datatable').DataTable();


    var table = $('#example').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
    });

    table.buttons().container()
        .appendTo('#example_wrapper .col-md-6:eq(0)');

});
</script>