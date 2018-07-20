@push('script')
<script>
	function hapusD(link, e) {
		e.preventDefault();
		if(confirm('Anda yakin?')){
			var ff = document.getElementById('form-hapus');
			ff.action = link;
			ff.submit();
		}
	}
</script>
@endpush