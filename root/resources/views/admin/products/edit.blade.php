@extends('admin.base')

@section('title', '商品')
@section('subtitle', '編集')
@section('css')

@endsection

@section('content')
<form action="{{ route('admin.product.confirm', ['product' => $product]) }}" method="POST">
  @csrf
  @include('admin.products.form-controls', ['readOnly' => false])
  <div class="form-group row">
    <div class="col-3">
      <a href="{{ route('admin.products.show', ['product' => $product]) }}" class="btn btn-secondary">詳細へ</a>
    </div>
    <div class="col-9 text-right">
      <button type="submit" class="btn btn-primary">確認</button>
    </div>
  </div>
</form>
@endsection

@section('script')

@endsection
