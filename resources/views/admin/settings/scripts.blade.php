@section('vendors')
    <!-- Toastr Notifications -->
    <script src="{{asset('vendors/toastr/toastr.min.js')}}"></script>
    <!-- CK-Editor -->
    <script src="{{asset('vendors/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
@endsection

@section('scripts')
    {{--Setup ajax--}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).ready(function () {

            //Initializing CK-Editor
            CKEDITOR.replace('about_us');

            //Submitting the Add & the Edit forms
            $('#settings_form').on('submit', function (event) {
                event.preventDefault();
                var form_data = new FormData($('#settings_form')[0]);
                $.ajax({
                    url: '{{route('settings.store')}}',
                    type: 'POST',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (data) {
                        if (data.error.length > 0) {
                            var error_html = '';
                            data.error.forEach(function (error) {
                                error_html += "<div class='alert alert-danger'>" + error + "</div>";
                            });
                            $('#form_output').html(error_html);
                            toastr.error('Validation error', 'Error!', {timeOut: 1500});
                        } else {
                            $('#form_output').html('');
                            $('#logo').val('');
                            $('#logo2').val('');
                            $('.logo_container').html('<img src="{{asset('/storage/settings')}}/'+data.settings.logo+'" width="30px" height="30px" alt="store-logo">');
                            $('.logo_container2').html('<img src="{{asset('/storage/settings')}}/'+data.settings.logo2+'" width="30px" height="30px" alt="store-logo">');
                            toastr.success('Settings updated successfully.', 'Success!', {timeOut: 1500});
                            $('#website_name_container').text(data.settings.website_name);
                        }
                    }
                });
            });
        });
    </script>
@endsection