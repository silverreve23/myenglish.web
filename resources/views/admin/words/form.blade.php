<div class="form-group {{ $errors->has('word') ? 'has-error' : ''}}">
    <label for="word" class="control-label">{{ 'Word' }}</label>
    <textarea class="form-control" rows="5" name="word" type="textarea" id="word" >{{ @$word->word ?? '' }}</textarea>
    {!! $errors->first('word', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('trans') ? 'has-error' : ''}}">
    <label for="trans" class="control-label">{{ 'Trans' }}</label>
    <textarea class="form-control" rows="5" name="trans" type="textarea" id="trans" >{{ @$word->trans ?? ''}}</textarea>
    {!! $errors->first('trans', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('hint') ? 'has-error' : ''}}">
    <label for="hint" class="control-label">{{ 'Hint' }}</label>
    <textarea class="form-control" rows="5" name="hint" type="textarea" id="hint" >{{ @$word->hint ?? ''}}</textarea>
    {!! $errors->first('hint', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
