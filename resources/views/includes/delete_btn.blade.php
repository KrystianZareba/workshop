@php $randomId = Str::random(10) @endphp

<div style="position:absolute; bottom: 10px; right: 10px;">
    <a href="javascript:;" class="btn btn-danger btn-md" data-toggle="modal" data-target="#{{ $randomId }}">
        Usuń
    </a>
</div>

<div class="modal fade" id="{{ $randomId }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        {!! Form::open(['url' => $url, 'method' => 'DELETE']) !!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Usuń element</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Czy na pewno chcesz usunąć ten element?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-md" data-dismiss="modal">Anuluj</button>
                <button type="submit" class="btn btn-danger btn-md">Usuń</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
