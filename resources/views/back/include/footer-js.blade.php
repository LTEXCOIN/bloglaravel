<script src="{{ asset('assets/back/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/back/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/back/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/back/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/back/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('assets/back/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('assets/back/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{ asset('assets/back/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{ asset('assets/back/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('assets/back/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('assets/back/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('assets/back/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/back/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/back/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/back/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/back/dist/js/pages/dashboard.js')}}"></script>
<script src="{{ asset('assets/back/js/toastr.min.js')}}"></script>
<script src="{{ asset('assets/back/js/summernote.min.js')}}"></script>
<script>
    $(document).ready(function () {

        $('#summernote').summernote({
            height: "200px",
            onMediaDelete: function ($target, editor, $editable) {
                alert($target.context.dataset.filename);
                $target.remove();
            },
            callbacks: {
                onImageUpload: function (files) {
                    const url = $(this).data('upload'); //path is defined as data attribute for  textarea
                    sendFile(files[0], url, $(this));
                },
            }
        });

        /*$('#summernote1').summernote({
            height: "200px",
            callbacks: {
                onImageUpload: function (files) {
                    const url = $(this).data('upload'); //path is defined as data attribute for  textarea
                    sendFile(files[0], url, $(this));
                }
            }
        });*/

        /**
         * FIle Upload to service
         * @param file
         * @param url
         * @param editor
         */
        function sendFile(file, url, editor) {
            const data = new FormData();
            data.append("image", file);

            $.ajax({
                data: data,
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('admin/service/ajax-file-upload') }}",
                cache: false,
                contentType: false,
                processData: false,
                success: function (objFile) {
                    const url = '{{ url("/service") }}/' + objFile.image;
                    editor.summernote('insertImage', url);
                },
                error: function (jqXHR, textStatus, errorThrown) {

                }
            });
        }
    });
</script>
@stack('extra-script')
<script type="text/javascript">

    const type = "{{ Session::get('alert-type') }}";

    switch (type) {

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

</script>
