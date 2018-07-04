<div class="row">
    <div class="col-md-12">
        <form action="{{ $action }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="card">
                <div class="card-header">
                    <strong>{{ $title }}</strong>
                    <a href="{{ $back_url }}" class="float-right btn btn-sm btn-secondary">Kembali</a>
                </div>
                <div class="card-body card-block">
                    {{ $slot }}
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Simpan
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>