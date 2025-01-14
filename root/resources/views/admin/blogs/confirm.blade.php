@extends('admin.base')

@section('title', $blog->id . ':' . $blog->title)
@section('subtitle', 'ブログの更新確認')

@section('css')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="alert alert-info" role="alert">
    入力内容に間違いなければページ下の<strong>更新ボタン</strong>を押して確定してください。
</div>
<form action="{{ route('admin.blogs.update', ['blog' => $blog]) }}" method="POST">
    @method('PATCH')
    @csrf
    @include('admin.blogs.form-controls', ['readOnly' => true])
    <div class="form-group row">
        <div class="col-3">
            <a href="{{ route('admin.blogs.edit', ['blog' => $blog]) }}" class="btn btn-secondary">戻る</a>
        </div>
        <div class="col-9 text-right">
            <button type="submit" class="btn btn-primary">更新</button>
        </div>
    </div>
</form>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
@endsection