@if(config('app.button_type') == 'text')
<a href="{{ $link }}" class="btn btn-primary {{ config('app.button_size') == 'default' ? '' :  'btn-'.config('app.button_size')}}">
	{{ config('app.see_button') }}
</a>
@else
<a href="{{ $link }}" class="btn btn-primary {{ config('app.button_size') == 'default' ? '' :  'btn-'.config('app.button_size')}}">
	<i class="{{ config('app.see_button') }}"></i>
</a>
@endif