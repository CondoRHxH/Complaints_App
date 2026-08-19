{{-- @if(Auth::check())
    @if(Auth::user()->role === 'admin')
        @include('layouts.navigation')
    @elseif(Auth::user()->role === 'fonctionnaire')
        @include('layouts.fonctionnaire')
    @endif
@endif --}}


{{-- @if(Auth::check())
    @if(Auth::user()->role === 'admin')
        @include('layouts.admin')
    @elseif(Auth::user()->role === 'etudiant')
        @include('layouts.etudiant')
    @elseif(Auth::user()->role === 'professeur')
        @include('layouts.professeur')
    @endif
@endif --}}
