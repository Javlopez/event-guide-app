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
                <a class="navbar-brand page-scroll" href="/">
                    EventGuide.io
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="/">Go back to list of events</a>
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
                    <h2 class="section-heading">{{$event->name}} </h2>
                    <hr class="primary">
                </div>
            </div>
        </div>

        <div class="container">

            <h4 class="section-heading" style="padding-left:31px">Please Book your place</h4>
            <div class="row">
                <ul class="list-group col-md-4" style="padding-left:31px">
                    <li class="list-group-item"><strong>{{$event->name}}</strong></li>
                    <li class="list-group-item">Information: {{$event->description}}</li>
                    <li class="list-group-item">Date: {{$event->date}}</li>
                </ul>
                <div class="row col-md-12 text-center br-b">
                    <p style="color:#f05f40;font-weight:900;">
                        <span class="caret"></span> Please Book your place <span class="caret"></span>
                    </p>
                </div>
            </div>
            <div class="container showroom">
                @if(Session::has('success'))
                    <br>
                    <p class="bg-primary br" style="font-size:20px;padding:6px;">{{ Session::get('success') }}</p>
                @endif
            @foreach($event->stands()->get() as $index => $stand)
                @if(($index%5)==0 AND $index!=0)
                    <div class="row no-br">
                        <div class="col-md-10"></div>
                    </div>
                @endif

                 @if($stand->reservation)
                        <div class="col-md-2 br text-center booked">
                            <br>
                            <ul class="list-group col-md-12 options">
                                <li class="list-group-item"><img src="{{ asset('/uploads/logos/'. $stand->reservation->logo) }}"></li>
                                <li class="list-group-item">
                                    {{ $stand->reservation->name }} - {{ $stand->reservation->email }}
                                    - {{ $stand->reservation->address }}
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ asset('/uploads/documents/'. $stand->reservation->documents) }}" type="button" class="btn btn-success" style="font-size:11px">Get documents</a>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="col-md-2 br text-center available">
                            <br>
                            <ul class="list-group col-md-12 options">
                                <li class="list-group-item"> Stand {{$stand->id}}: available</li>
                                <li class="list-group-item">
                                    <a href="{{ route('stands.show',['id' => $stand->id]) }}" class="btn btn-default btn-primary" data-toggle="modal" data-target="#stand-details">Reserve</a>
                                </li>
                            </ul>
                        </div>
                    @endif
            @endforeach
            </div>
        </div>
    </section>

<div class="modal" id="stand-details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <!-- Modal -->
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        </div>
    </div>
</div>
<script>
    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
    });
</script>
@endsection