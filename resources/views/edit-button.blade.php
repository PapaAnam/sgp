@if(config('app.button_type') == 'text')
<a href="{{ $link }}" class="btn btn-success {{ config('app.button_size') == 'default' ? '' :  'btn-'.config('app.button_size')}}">
	{{ config('app.edit_button') }}
</a>
@else
<a href="{{ $link }}" class="btn btn-success {{ config('app.button_size') == 'default' ? '' :  'btn-'.config('app.button_size')}}">
	<i class="{{ config('app.edit_button') }}"></i>
</a>
@endif