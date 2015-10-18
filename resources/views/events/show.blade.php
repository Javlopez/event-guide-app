@extends('layout')
@section('content')
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    EventGuide.io
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#services">Choose your event</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <br>
                    <h2 class="section-heading">Select your </h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <style>
            .br{border:1px solid #ccc;}
            .br-l{border-left:1px solid #ccc;}
            .br-r{border-right:1px solid #ccc;}
            .br-t{border-top:1px solid #ccc;}
            .br-b{border-bottom:1px solid #ccc;}
            .showroom > div,.showroom > div > div { height:130px;}
            .showroom > div.col-md-2:hover, .showroom > div > div.col-md-2:hover { background:#ddd;}
            .no-br { border:none !important;}
            .btn{  font-size: 12px;}
            .booked {
                background: url("http://localhost:8000/img/header.jpg") 1px 2px no-repeat;
            }
            address.information {
                font-size: 12px;
                font-family: "Open Sans","Helvetica Neue",Arial,sans-serif;
                padding: 0;
            }
        </style>



        <div class="container showroom">

            <h4 class="section-heading">Please Book your place</h4>
            <div>
                name, location, event dates
            </div>
            <div class="row br">
                <div class="col-md-2 br-r text-center">
                    <div>
                        Stand 1 is available
                        <a href="/events/new/1" class="btn btn-default btn-primary">Reserve</a>
                    </div>
                </div>
                <div class="col-md-2 br-r btn-warning booked">
                        <h5>Twitter .Inc</h5>
                        <h6>Company od tiwtter</h6>
                        <button type="button" class="btn btn-default btn-primary" style="font-size:11px">Download documents</button>
                </div>
                <div class="col-md-2 br-r">.col-md-1</div>
                <div class="col-md-2 br-r">.col-md-1</div>
                <div class="col-md-2 br-r">.col-md-1</div>
                <div class="col-md-2">.col-md-1</div>
            </div>
            <div class="row no-br">
                <div class="col-md-2 br-l br-r">.col-md-1</div>
                <div class="col-md-8"></div>
                <div class="col-md-2 br-l br-r">.col-md-1</div>
            </div>
            <div class="row showroom">
                <div class="col-md-2 br">.col-md-1</div>
                <div class="col-md-2 no-br"></div>
                <div class="col-md-2 br">.col-md-1</div>
                <div class="col-md-2 br-r br-b br-t">.col-md-1</div>
                <div class="col-md-2 no-br"></div>
                <div class="col-md-2 br">.col-md-1</div>
            </div>
            <div class="row showroom">
                <div class="col-md-2 br-r br-l">.col-md-1</div>
                <div class="col-md-8"></div>
                <div class="col-md-2 br-r br-l">.col-md-1</div>
            </div>
            <div class="row showroom">
                <div class="col-md-6 br">.col-md-6</div>
                <div class="col-md-6 br">.col-md-6</div>
            </div>

        </div>
    </section>
@endsection