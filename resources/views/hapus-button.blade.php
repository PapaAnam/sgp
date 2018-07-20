@if(config('app.button_type') == 'text')
<button class="btn btn-danger {{ config('app.button_size') == 'default' ? '' :  'btn-'.config('app.button_size')}}" onclick="hapusD('{{ $link }}', event)">
	{{ config('app.delete_button') }}
</button>
@else
<button class="btn btn-danger {{ config('app.button_size') == 'default' ? '' :  'btn-'.config('app.button_size')}}" onclick="hapusD('{{ $link }}', event)">
	<i class="{{ config('app.delete_button') }}"></i>
</button>
@endif