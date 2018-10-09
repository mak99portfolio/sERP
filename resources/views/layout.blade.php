<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <link rel="shortcut icon" href="{{asset('assets/build/images/magnum.ico')}}" type="image/x-icon" />
        <!-- Bootstrap -->
        <link href="{{asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{asset('assets/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
        <!-- iCheck -->
        <link href="{{asset('assets/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
        <!-- bootstrap-wysiwyg -->
        <link href="{{asset('assets/vendors/google-code-prettify/bin/prettify.min.css')}}" rel="stylesheet">
        <!-- Select2 -->
        <link href="{{asset('assets/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
        <!-- Switchery -->
        <link href="{{asset('assets/vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">
        <!-- starrr -->
        <link href="{{asset('assets/vendors/starrr/dist/starrr.css')}}" rel="stylesheet">
        <!-- bootstrap-daterangepicker -->
        <link href="{{asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
        <!-- PNotify -->
        <link href="{{asset('assets/vendors/pnotify/dist/pnotify.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendors/pnotify/dist/pnotify.buttons.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendors/pnotify/dist/pnotify.nonblock.css')}}" rel="stylesheet">
        <!-- Datatables -->
        <link href="{{asset('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

        <!--animatedModal-->
        <!--<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css">-->
        <!-- Custom Theme Style -->
        <link href="{{asset('assets/build/css/custom.min.css')}}" rel="stylesheet">

        <link href="{{asset('assets/style.css')}}" rel="stylesheet">
        <style>
            .select2-container--default .select2-selection--multiple, .select2-container--default .select2-selection--single {min-height: 30px!important;}
            .select2-container--default .select2-selection--single .select2-selection__rendered {padding-top: 0px!important;}
            .select2-container--default .select2-selection--single .select2-selection__arrow b {top: 42%;}
            /*end select2*/
            .breadcrumb {font-size: 0px;}
            .breadcrumb {padding: 0px;margin-bottom: 5px;}
            .breadcrumb > * {font-size: 10px;color: #253e6a;background: #EDEDED;display: inline-block;padding: 0 9px 0 20px; margin: 0 6px 4px 0;height: 14px;line-height: 14px;position: relative;}
            .breadcrumb a:hover{outline: 1px solid #3C4C5D;}
            .breadcrumb > span {background: #5A738E;color: #fff;outline: 0px;}
            .breadcrumb > span:after { border-color: transparent transparent transparent #5A738E;}
            /* Left inset arrow */
            .breadcrumb > :before {position: absolute;top: 0;content: '';left: 0;width: 0;height: 0; border-style: solid;border-width: 7px 0 7px 7px;border-color: transparent transparent transparent #3c4c5d;z-index: 1;
            }
            /* Right arrow tip */
            .breadcrumb > :after {position: absolute;top: 0;content: '';left: 100%;width: 0;height: 0;border-style: solid;border-width: 7px 0 7px 7px;border-color: transparent transparent transparent #5A738E;z-index: 2;
            }
            /* The first item has no inset arrow */
            .breadcrumb :first-child {padding-left: 10px;}
            .breadcrumb :first-child:before {border: none}

            
            
        </style>
        @yield('style')
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0; background-color: #EDEDED; border-right: 1px solid;">
                          <!--<a href="{{route('dashboard')}}" class="site_title"><i class="fa fa-paw"></i> <span>ShadowERP</span></a>-->
                            <a href="{{route('dashboard')}}" class="site_title"><img src="{{asset('assets/build/images/logo2.png')}}" class="" alt=""></a>
                        </div>

                        <div class="clearfix"></div>
                        <!-- sidebar menu -->
                        @include('partials/sidebar')
                        <!-- /sidebar menu -->

                    </div>
                </div>

                <!-- top navigation -->
                @include('partials/header')
                <!-- /top navigation -->

                <!-- page content -->
                {{-- @include('partials/flash_msg') --}}
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                @yield('content')
                <!-- /page content -->

                <!-- footer content -->
                @include('partials/footer')
                <!-- /footer content -->
            </div>
        </div>
        <!-- Modal -->
        <div id="popUpModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg modal-dialog-centered">

                <!--Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title popup_title">Modal Header</h4>
                    </div>
                    <div class="modal-body" id="modal_body">
                        <p>Some text in the modal.</p>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="popup_destination btn btn-primary">Go To <span class="popup_title"></span></a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <!-- jQuery -->
        <script src="{{asset('assets/vendors/jquery/dist/jquery.min.js')}}"></script>
        <!-- Bootstrap -->
        <script src="{{asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <!-- FastClick -->
        <script src="{{asset('assets/vendors/fastclick/lib/fastclick.js')}}"></script>
        <!-- NProgress -->
        <script src="{{asset('assets/vendors/nprogress/nprogress.js')}}"></script>
        <!-- bootstrap-progressbar -->
        <script src="{{asset('assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
        <!-- iCheck -->
        <script src="{{asset('assets/vendors/iCheck/icheck.min.js')}}"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="{{asset('assets/vendors/moment/min/moment.min.js')}}"></script>
        <script src="{{asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
        <!-- bootstrap-wysiwyg -->
        <script src="{{asset('assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')}}"></script>
        <script src="{{asset('assets/vendors/jquery.hotkeys/jquery.hotkeys.js')}}"></script>
        <script src="{{asset('assets/vendors/google-code-prettify/src/prettify.js')}}"></script>
        <!-- jQuery Tags Input -->
        <script src="{{asset('assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script>
        <!-- Switchery -->
        <script src="{{asset('assets/vendors/switchery/dist/switchery.min.js')}}"></script>
        <!-- Select2 -->
        <script src="{{asset('assets/vendors/select2/dist/js/select2.full.min.js')}}"></script>
        <!-- Parsley -->
        <script src="{{asset('assets/vendors/parsleyjs/dist/parsley.min.js')}}"></script>
        <!-- Autosize -->
        <script src="{{asset('assets/vendors/autosize/dist/autosize.min.js')}}"></script>
        <!-- jQuery autocomplete -->
        <script src="{{asset('assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js')}}"></script>
        <!-- starrr -->
        <script src="{{asset('assets/vendors/starrr/dist/starrr.js')}}"></script>
        <!-- angularjs -->
        <script src="{{asset('assets/vendors/angular/angular.min.js')}}"></script>
        <!-- PNotify -->
        <script src="{{asset('assets/vendors/pnotify/dist/pnotify.js')}}"></script>
        <script src="{{asset('assets/vendors/pnotify/dist/pnotify.buttons.js')}}"></script>
        <script src="{{asset('assets/vendors/pnotify/dist/pnotify.nonblock.js')}}"></script>
        <!-- validator -->
        <script src="{{asset('assets/vendors/validator/validator.js')}}"></script>
        <!-- Datatables -->
        <script src="{{asset('assets/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
        <script src="{{asset('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('assets/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
        <script src="{{asset('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
        <script src="{{asset('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
        <script src="{{asset('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
        <script src="{{asset('assets/vendors/jszip/dist/jszip.min.js')}}"></script>
        <script src="{{asset('assets/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
        <script src="{{asset('assets/vendors/pdfmake/build/vfs_fonts.js')}}"></script>

        <!--animatedModal-->
        <!--<script src="{{asset('assets/vendors/animatedModal/animatedModal.min.js')}}"></script>-->
        <!-- Custom Theme Scripts -->
        <script src="{{asset('assets/build/js/custom.js')}}"></script>
        <script src="{{asset('assets/build/js/init.js')}}"></script>
        <script src="{{asset('assets/build/js/script.js')}}"></script>
        

        @yield('script')

        <script>
$('*[data-popup]').each(function () {
    $("label[for='" + $(this).attr('id') + "']").css({
        'cursor': 'pointer',
        'text-decoration': 'underline'
    });
});
$('*[data-popup]').on('click', function () {
    var destination_url = $(this).data('popup');
    var split = destination_url.split('/');
    var popup_title = split[split.length - 1];
    var popup_title = popup_title.charAt(0).toUpperCase() + popup_title.slice(1);
    $('#popUpModal').modal('show');
    var label = $("label[for='" + $(this).attr('id') + "']");
    $('.popup_title').text(popup_title);
    $('.popup_destination').attr('href', destination_url);

    $('#modal_body').load(destination_url + ' #popup_area');
    
});
toaster_notification();
function toaster_notification() {
    $.ajax("{{route('get_toaster_notification')}}")
            .done(function (data) {
                if (data) {
                    new PNotify(data);
                }
            })

}
// print script
$(function () {
    $(".print-btn").click(function () {
        $('#print-footer').show();
        var contents = $(".print-area").html();
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({"position": "absolute", "top": "-1000000px"});
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html><head><title></title>');
        frameDoc.document.write('</head><body>');
        // address and logo
        frameDoc.document.write('<div style="margin-bottom: 30px;"><table><tr><td><img src="{{asset('assets / build / images / logo1.png')}}" alt="company logo" class="img-responsive" style="max-width: 100px; max-height: 50px;"></td><td style="font-size: 12px; padding-left: 30px;"><p class="pull-right">531, Dhaur(Kamarpara), Turag, Dhaka-1230<br>Tel:(02)-8981941, Fax:+88-02-89819442, Mob:+88-01823-777992<br>E-mail:info@magnumenterprise.net, Web:www.magnumenterprise.net</p></td></tr></table></div>');
        //Append the external CSS file.
        frameDoc.document.write('<link href="{{asset('assets / vendors / bootstrap / dist / css / bootstrap.min.css')}}" rel="stylesheet" type="text/css" />');
        //Append the DIV contents.
        frameDoc.document.write(contents);
        // footer
        frameDoc.document.write('<div></div>');
        frameDoc.document.write('</body></html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);

        $('#print-footer').hide();
    });

    $('.flash').delay(8000).fadeOut('slow');
});
// end print script
validator.defaults.alerts = false;
$('form .alert').remove();

        </script>
    </body>
</html>
