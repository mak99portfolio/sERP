@extends('layout')
@section('title', 'Design Page')

@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Design Page</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <button class="btn btn-primary example-bounce-1">No bounce</button>
                        <div class="col-md-3">
                            <button class="btn btn-primary btn-block example-p-2">Confirmation</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $('.example-bounce-1').on('click', function () {
        $.confirm({
            animationBounce: 1
        });
    });

    // confirmation
    $('.example-p-2').on('click', function () {
        $.confirm({
            title: 'A secure action',
            content: 'Its smooth to do multiple confirms at a time. <br> Click confirm or cancel for another modal',
            icon: 'fa fa-question-circle',
            animation: 'scale',
            closeAnimation: 'scale',
            opacity: 0.5,
            buttons: {
                'confirm': {
                    text: 'Proceed',
                    btnClass: 'btn-blue',
                    action: function () {
                        $.confirm({
                            title: 'This maybe critical',
                            content: 'Critical actions can have multiple confirmations like this one.',
                            icon: 'fa fa-warning',
                            animation: 'scale',
                            closeAnimation: 'zoom',
                            buttons: {
                                confirm: {
                                    text: 'Yes, sure!',
                                    btnClass: 'btn-orange',
                                    action: function () {
                                        $.alert('A very critical action <strong>triggered!</strong>');
                                    }
                                },
                                cancel: function () {
                                    $.alert('you clicked on <strong>cancel</strong>');
                                }
                            }
                        });
                    }
                },
                cancel: function () {
                    $.alert('you clicked on <strong>cancel</strong>');
                },
                moreButtons: {
                    text: 'something else',
                    action: function () {
                        $.alert('you clicked on <strong>something else</strong>');
                    }
                },
            }
        });
    });
</script>
@endsection
