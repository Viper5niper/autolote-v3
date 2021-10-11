<div class="{{$class}}">
    <label for="{{$label}}">{{$label_name}}</label>
    <input type="{{$type}}" name="{{$name}}" class="form-control @error('licencia') is-invalid @enderror" id="{{$label}}" placeholder="" value="" required>
    @error('licencia')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>