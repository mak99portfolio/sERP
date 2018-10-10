@extends('layout')
@section('title', 'Design Page')
@section('style')
<!--myidjs-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<!--animatedModal-->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css">
<style>
    #closebt-container {
        position: relative;
        width: 100%;
        text-align: center;
        margin-top: 40px;
    }
    .closebt {
        -webkit-transition: all 0.2s;
        -moz-transition: all 0.2s;
        -ms-transition: all 0.2s;
        -o-transition: all 0.2s;
        transition: all 0.2s;
        cursor: pointer;
    }
    .closebt:hover {
        transform: rotate(90deg);
    }
    .lock_wrapper {
        right: 0;
        margin: 15% auto 0;
        max-width: 350px;
        position: relative;
    }
</style>
@endsection
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
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <form action="" method="post">
                                    <fieldset>
                                        <div class="item">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="ex. John f. Kennedy" required="required" />
                                                <div class='tooltip help'>
                                                    <span>?</span>
                                                    <div class='content'>
                                                        <b></b>
                                                        <p>Name must be at least 2 words</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <button type='submit'>Submit</button>
                                </form>
                            </div>
                        </div>
                        <!--Call your modal-->
                        <ul>
                            <li><a id="demo01" href="#animatedModal">DEMO01</a></li>
                            <li><a id="demo02" href="#modal-02">DEMO02</a></li>
                        </ul>
                        <!--DEMO01-->
                        <div id="animatedModal">
                            <!--THIS IS IMPORTANT! to close the modal, the class name has to match the name given on the ID -->
                            <!-- <div  id="btn-close-modal" class="close-animatedModal"> 
                                CLOSE MODAL
                            </div>-->
                            <div id="closebt-container" class="close-animatedModal">
                                <img class="closebt" src="https://joaopereirawd.github.io/animatedModal.js/img/closebt.svg">
                            </div>
                            <div class="modal-content">
                                <!--Your modal content goes here-->
                            </div>
                        </div>

                        <!--DEMO02-->
                        <div id="modal-02">
                            <div class="lock_wrapper">
                                <div class="animate form login_form">
                                    <section class="login_content">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <!--<img src="{{asset('assets/build/images/logo.png')}}" alt="" class="img-responsive" style="padding-bottom: 25px;">-->
                                            <h2>Lock Your Window enter your password </h2>
                                            <div>
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" required>
                                                @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-default">
                                                        {{ __('Login') }}
                                                    </button>
                                                </div>
                                            </div>
                                            <div>
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            </div>

                                            <div class="clearfix"></div>
                                        </form>
                                    </section>
                                </div>
                            </div>
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
<!--myidjs-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
<!--animatedModal-->
<script src="{{asset('assets/vendors/animatedModal/animatedModal.min.js')}}"></script>

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
//demo 01
$("#demo01").animatedModal({
    animatedIn: 'zoomIn',
    animatedOut: 'bounceOut',
    color: '#39BEB9',
    beforeOpen: function () {

        var children = $(".thumb");
        var index = 0;

        function addClassNextChild() {
            if (index == children.length)
                return;
            children.eq(index++).show().velocity("transition.expandIn", {opacity: 1, stagger: 250});
            window.setTimeout(addClassNextChild, 200);
        }

        addClassNextChild();

    },
    afterClose: function () {
        $(".thumb").hide();

    }
});

//demo 02
$("#demo02").animatedModal({
    modalTarget: 'modal-02',
    animatedIn: 'lightSpeedIn',
    animatedOut: 'bounceOutDown',
    color: '#3498db',
    // Callbacks
    beforeOpen: function () {
        console.log("The animation was called");
    },
    afterOpen: function () {
        console.log("The animation is completed");
    },
    beforeClose: function () {
        console.log("The animation was called");
    },
    afterClose: function () {
        console.log("The animation is completed");
    }
});
</script>
@endsection
