<div class="form-group {{ $errors->has('word') ? 'has-error' : ''}}">
    <label for="word" class="control-label">{{ 'Word' }}</label>
    <textarea class="form-control" rows="5" name="word" type="textarea" id="word" >{{ @$repeat->word ?? '' }}</textarea>
    {!! $errors->first('word', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('trans') ? 'has-error' : ''}}">
    <label for="trans" class="control-label">{{ 'Trans' }}</label>
    <textarea class="form-control" rows="5" name="trans" type="textarea" id="trans" >{{ @$repeat->trans ?? ''}}</textarea>
    {!! $errors->first('trans', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('priority') ? 'has-error' : ''}}">
    <label for="priority" class="control-label">{{ 'Priority' }}</label>
    <input class="form-control" name="priority" type="number" id="priority" value="{{ @$repeat->priority ?? ''}}" >
    {!! $errors->first('priority', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
