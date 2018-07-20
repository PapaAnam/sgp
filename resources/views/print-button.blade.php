@if(config('app.button_type') == 'text')
<a target="_blank" href="{{ $link }}" class="btn btn-secondary {{ config('app.button_size') == 'default' ? '' :  'btn-'.config('app.button_size')}}">
	{{ config('app.print_button') }}
</a>
@else
<a target="_blank" href="{{ $link }}" class="btn btn-secondary {{ config('app.button_size') == 'default' ? '' :  'btn-'.config('app.button_size')}}">
	<i class="{{ config('app.print_button') }}"></i>
</a>
@endif