<br>

{!! $content !!}
{{-- <img src="http://localhost:8000/email-open-tracking/7eb869e6-f854-44c8-92d5-4515cdb84272" alt=""> --}}
@if (isset($links))
    <img src="{{ $links['openTrackingLink'] }}">
@endif