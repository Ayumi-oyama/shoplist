@extends('admin.base')

@section('title', 'あゆみのブログ記事
')
@section('subtitle', '一覧')
@section('css')

@endsection

@section('content')
<div>
  <div class="container">
    <div class="row">
      <div class="col text-right">
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">新規</a>
      </div>
    </div>
  </div>
</div>
<div class="table-responsive">
  <p>{{ $blogs->total() }}&nbsp;件</p>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>ID</th>
        <th>タイトル</th>
        <th>作成日時</th>
        <th>更新日時</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($blogs as $blog)
      <tr>
        <td>{{ $blog->id }}</td>
        <td><a href="{{ route('admin.blogs.show', ['blog' => $blog]) }}">{{ $blog->title }}</a></td>
        <td>{{ $blog->created_at }}</td>
        <td>{{ $blog->updated_at }}</td>
        <td>
          <button type="button" class="btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" data-action="{{ route('admin.blogs.destroy', ['blog' => $blog]) }}" data-text="{{ $blog->id . ':' . $blog->name }}">
            <span data-feather="trash-2"></span>
          </button>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  {{ $blogs->links() }}
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
            <span id="deleteTargetText"></span> を削除してもよろしいですか？
          </div>
        </div>
        <div class="modal-footer">
          <form method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">OK</button>
          </form>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  $(function () {
    // Modal
    $('#deleteModal').on('show.bs.modal', function (event) {
      const button = $(event.relatedTarget);
      const modal = $(this);

      modal.find('#deleteTargetText').text(button.data('text'));
      modal.find('form').attr('action', button.data('action'));
    })
  });
</script>
@endsection
