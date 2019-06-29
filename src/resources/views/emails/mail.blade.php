@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => 'https://www.zoomaal.com'])
            Zoomaal
        @endcomponent
    @endslot

    {{-- Body --}}
    <div>
        <h2>Hello !</h2>
        <p>Please click the button below to get access to the application, which will be valid only for 15 minutes.</p>
        <div>
            @if(isset($data['content']))
                @if (!is_array($data['content'])){
                {!! $data['content'] !!}
                @else
                    <ul>
                        @foreach ($data['content'] as $datum)
                            <li>{{$datum}}</li>
                        @endforeach
                    </ul>
                @endif
            @endif

        </div>
        <p>
            Thank you for using our application,
            <br/>
            Zoomaal Team
        </p>
    </div>

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} Zoomaal. @lang('All rights reserved.')
        @endcomponent
    @endslot
@endcomponent