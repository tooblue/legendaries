<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="login-modal-label">New TCG Collection</h4>
</div>
<div class="modal-body">

    <form id="new-instance-modal-form" method="POST" action="{{ route('api::app::newInstance') }}">
        {!! csrf_field() !!}

        <div class="form-group{{ $errors->has('tcg_id') ? ' has-error' : '' }}">
            <label for="tcg">Select a Game:</label>
            <select class="form-control" name="tcg_id">
                @foreach ($tcgs as $tcg)
                    <option value="{{ $tcg->id }}">{{ $tcg->name }}</option>
                @endforeach
            </select>

            @if ($errors->has('tcg_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('tcg_id') }}</strong>
                </span>
            @endif
        </div>

    </form>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" form="new-instance-modal-form" class="btn btn-primary">Add</button>
</div>
