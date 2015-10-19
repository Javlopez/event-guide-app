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
                        <a class="page-scroll" href="#services"></a>
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
                    <h2 class="section-heading">{{$stand->event->name}} </h2>
                    <hr class="primary">
                </div>
            </div>
        </div>


        <div class="container">

            <h4 class="section-heading" style="padding-left:31px">Complete your book</h4>
            <div class="row">
                <ul class="list-group col-md-4" style="padding-left:31px">
                    <li class="list-group-item"><strong>{{$stand->event->name}}</strong></li>
                    <li class="list-group-item">Information: {{$stand->event->description}}</li>
                    <li class="list-group-item">Date: {{$stand->event->date}}</li>
                </ul>
                <div class="row col-md-12 text-center br-b">
                    <p style="color:#f05f40;font-weight:900;">
                        <span class="caret"></span> Please complete the follow form<span class="caret"></span>
                    </p>
                </div>
            </div>

            <div class="container row">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    {!! Form::open(['route' => 'reservations.save', 'method' => 'post', 'class' => 'form-horizontal col-lg-6', 'style' => 'border:1px solid #ccc;padding:30px', 'files' => true]) !!}
                    <div class="form-group">
                        {!! Form::hidden('stand', $stand->id) !!}
                        {!! Form::label('name', 'Name',['class' => 'col-sm-3 control-label' ]) !!}
                        <div class="col-sm-9">
                            {!! Form::text('name', null, ['placeholder' => 'Write your name', 'class'=> 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', 'E-mail',['class' => 'col-sm-3 control-label' ]) !!}
                        <div class="col-sm-9">
                            {!! Form::email('email', null, ['placeholder' => 'Write your email', 'class'=> 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('address', 'Address',['class' => 'col-sm-3 control-label' ]) !!}
                        <div class="col-sm-9">
                            {!! Form::text('address', null, ['placeholder' => 'Write your address', 'class'=> 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('logo', 'Company Logo',['class' => 'col-sm-3 control-label' ]) !!}
                        <div class="col-sm-9">
                            {!! Form::file('logo', null, [ 'class'=> 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('documents', 'Documents (only zip are allowed)',['class' => 'col-sm-3 control-label' ]) !!}
                        <div class="col-sm-9">
                            {!! Form::file('documents', null, [ 'class'=> 'form-control']) !!}
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            {!! Form::submit('Confirm Reservation', ['class' => 'btn btn-warning']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
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
@endsection