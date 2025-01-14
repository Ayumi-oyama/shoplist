@extends('admin.base')

@section('title', 'あゆみのブログ記事')
@section('subtitle', '新規')
@section('css')

@endsection

@section('content')
<form action="{{ route('admin.blogs.store') }}" method="POST">
  @csrf
  @include('admin.blogs.form-controls', ['readOnly' => false])
  <div class="form-group row">
    <div class="col-3">
      <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">一覧へ</a>
    </div>
    <div class="col-9 text-right">
      <button type="submit" class="btn btn-primary">登録</button>
    </div>
  </div>
</form>
@endsection

@section('script')

@endsection
