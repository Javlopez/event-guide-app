@extends('layout')
@section('content')
    @include('partials.nav')
<header>
    <div class="header-content">
        <div class="header-content-inner">
            <hr>
            <p>Find the best events in the bests places</p>
            <a href="#services" class="btn btn-primary btn-xl page-scroll">Find my Event</a>
        </div>
    </div>
</header>

<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Select your place</h2>
                <hr class="primary">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                    <div id="map">
                    </div>
                {!!  Form::hidden('eventsList', $places, ['id' => 'eventsList']) !!}
            </div>
        </div>
    </div>
    <script>
        var itemsEvents = jQuery.parseJSON(  $('#eventsList').val() );
        var eventsLists = "";

        var center = new google.maps.LatLng(37.43457,-122.16119);
        var options = {
            zoom: 13,
            center: center,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var div = document.getElementById('map');
        var map = new google.maps.Map(div, options);
        var infowindow = new google.maps.InfoWindow({
            content: ''
        });


        var markers = [];
        for (var i = 0, j = itemsEvents.length; i < j; i++) {
            var place = itemsEvents[i];
            eventsLists = "";

            jQuery.each(place.events, function(key,value) {
                eventsLists = eventsLists+
                        '<li class="list-group-item">' + value.name + ', date: ' + value.date +
                        '<a href="/events/' +  value.id + '" style="font-weight:900;"> book a place <i class="fa fa-angle-double-right"></i></a></li>';

            });

            var contentString = '<div id="content">'+
                    '<div id="siteNotice">'+
                    '</div>'+
                    '<ul class="list-group">'+
                    eventsLists +
                    '</ul> '+
                    '</div>'+
                    '</div>';

            var item = {
                position: {
                    lat: place.latitude,
                    lng: place.longitude
                },
                content: contentString
            };

            markers.push(item);
        }

        for (var i = 0, j = markers.length; i < j; i++) {
            var content = markers[i].content;
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(markers[i].position.lat, markers[i].position.lng),
                map: map
            });
            (function(marker, content) {
                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.setContent(content);
                    infowindow.open(map, marker);
                });
            })(marker, content);
        }


    </script>
</section>
@endsection