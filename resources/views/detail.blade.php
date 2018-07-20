<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>{{ $title }}</strong>
                <a href="{{ $back_url }}" class="float-right btn btn-sm btn-secondary">Kembali</a>
            </div>
            <div class="card-body card-block">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>