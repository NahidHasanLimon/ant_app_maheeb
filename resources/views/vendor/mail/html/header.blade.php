<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
{{--<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">--}}
{{--        <img src="{{asset("backend/img/brand/ant_2.png")}}" class="logo" alt="Antopolis Logo">--}}
{{--        <link rel="icon" href="{{asset("backend/img/brand/ant_2.png")}}" type="image/png">--}}
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
