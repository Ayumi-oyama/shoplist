@extends('admin.base')

@section('title', $blog->id . ':' . $blog->title)
@section('subtitle', '編集')
@section('css')

@endsection

@section('content')
<form action="{{ route('admin.blogs.confirm', ['blog' => $blog]) }}" method="POST">
  @csrf
  @include('admin.blogs.form-controls', ['readOnly' => false])
  <div class="form-group row">
    <div class="col-3">
      <a href="{{ route('admin.blogs.show', ['blog' => $blog]) }}" class="btn btn-secondary">詳細へ</a>
    </div>
    <div class="col-9 text-right">
      <button type="submit" class="btn btn-primary">確認</button>
    </div>
  </div>
</form>
@endsection

@section('script')

@endsection
