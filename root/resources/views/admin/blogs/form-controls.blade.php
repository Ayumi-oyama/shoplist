
<div class="form-group row">
  <label for="inputId" class="col-sm-2 col-form-label">ID</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="inputId" value="{{ $blog->id ?? '' }}" disabled>
  </div>
</div>
<div class="form-group row">
  <label for="inputTitle" class="col-sm-2 col-form-label">タイトル</label>
  <div class="col-sm-10">
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="inputTitle" name="title" placeholder="タイトル" value="{{ old('title', $blog->title ?? '') }}"{{ $readOnly ? ' readonly="readonly"' : '' }}>
    @error('body')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
  </div>
</div>


<div class="form-group row">
  <label for="inputBody" class="col-sm-2 col-form-label">本文</label>
  <div class="col-sm-10">
    <textarea class="form-control @error('body') is-invalid @enderror" id="inputBody" name="body" placeholder="本文" rows="5"{{ $readOnly ? ' readonly="readonly"' : '' }}>{{ old('body', $blog->body ?? '') }}</textarea>
    @error('body')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
  </div>
</div>
