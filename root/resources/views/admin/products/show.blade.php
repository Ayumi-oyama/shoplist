@extends('admin.base')

@section('title', '商品')
@section('subtitle', '詳細')
@section('css')

@endsection

@section('content')
<form>
  @include('admin.products.form-controls', ['readOnly' => true])
  <div class="form-group row">
    <div class="col-3">
      <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">一覧へ</a>
    </div>
    <div class="col-9 text-right">
      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">削除</button>
      <a href="{{ route('admin.products.edit', ['product' => $product]) }}" class="btn btn-primary">編集</a>
    </div>
  </div>
</form>
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">削除確認</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" role="alert">
          <span>{{ $product->id . ':' . $product->name }}</span> を削除してもよろしいですか？
        </div>
      </div>
      <div class="modal-footer">
        <form action="{{ route('admin.products.destroy', ['product' => $product]) }}" method="POST">
          @method('DELETE')
          @csrf
          <button type="submit" class="btn btn-danger">OK</button>
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')

@endsection