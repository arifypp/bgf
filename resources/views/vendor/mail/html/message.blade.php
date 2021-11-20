@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => route('homepage')])
Bismillah Garden Ltd
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} Bismillah Garden Ltd. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
