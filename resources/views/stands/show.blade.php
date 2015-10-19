<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Eventguide: Stand - Detail </h4>
</div>
<div class="modal-body">

    <ul class="list-group col-md-12">
        <li class="list-group-item">
            <strong>Stand number:</strong> {{ $stand->id }}
        </li>
        <li class="list-group-item">
            <strong>Price:</strong> $ {{ number_format($stand->price,2) }} USD
        </li>
        <li class="list-group-item">
            <a href="{{ route('reservation',['id' => $stand->id ]) }}" class="btn btn-info">Book this stand</a>
        </li>
    </ul>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close window</button>
</div>