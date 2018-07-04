<div class="row form-group">
    <div class="col col-md-3">
        <label for="{{ $id }}" class=" form-control-label">{{ $label }}</label>
    </div>
    <div class="col-12 col-md-9">
        <select name="{{ $id }}" id="{{ $id }}" class="form-control">
            @foreach($selectData as $d)
            <option value="{{ $d['value'] }}">{{ $d['text'] }}</option>
            @endforeach
        </select>
    </div>
</div>