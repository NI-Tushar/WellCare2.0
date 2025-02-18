@extends('Frontend.app')
@section('title', 'Dashboard')
@section('app-content')

    <!-- Dashboard -->
    @extends('Frontend.includes.side_bar')



    <section class="home-section">
        <div class="home-content">
            @yield('dashbaord_content')
        </div>
    </section>


@endsection
@push('script')
    <script>

    </script>
@endpush
