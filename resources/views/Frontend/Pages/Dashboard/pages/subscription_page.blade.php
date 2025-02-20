@extends('Frontend.Pages.Dashboard.app')
@section('title', 'Dashboard')
@section('dashbaord_content')



@push('css')
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/subscription_page.css') }}">
@endpush

<section class='pro_plan_section'>

    <div class="pro_plan_heading">
        <h2>Ready to Choose Plan for Appling jobs?</h2>
        <p>Choose the package that best suit you</p>
    </div>

            <div class="pro_plan_card">
                <div class="blank-1"></div>
                <div class="cards">

                @foreach ($packages as $package)

                    @if($package->name=='Basic')
                        <div class="card">
                            <div class="pro_body">
                                <h2><span>{{$package->apply}}</span> Apply</h2>
                                <h1><span><i class="fa-solid fa-bangladeshi-taka-sign"></i></span>{{$package->price}}</h1>
                                <div class="subscribe_box">
                                    <a href="{{ route('subscribe.package', $package->id) }}"><button>Subscribe Now</button></a>
                                    <ul>
                                        <li><div class="icon"><i class="fa-solid fa-circle-check"></i></div>Become 1 Month Pro Care Giverr</li>
                                        <li><div class="icon"><i class="fa-solid fa-circle-check"></i></div>Become lifetime Well Care member</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($package->name=='Standard')
                    <div class="card">
                        <div class="pro_body">
                            <h2><span>{{$package->apply}}</span> Apply</h2>
                            <h1><span><i class="fa-solid fa-bangladeshi-taka-sign"></i></span>{{$package->price}}</h1>
                            <div class="subscribe_box">
                                <a href="{{ route('subscribe.package', $package->id) }}"><button>Subscribe Now</button></a>
                                <ul>
                                    <li><div class="icon"><i class="fa-solid fa-circle-check"></i></div>Become 2 Month Pro Care Giverr</li>
                                    <li><div class="icon"><i class="fa-solid fa-circle-check"></i></div>Become lifetime Well Care member</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($package->name=='Proffessional')
                    <div class="card active">
                        <div class="pro_body">
                            <h2><span>{{$package->apply}}</span> Apply</h2>
                            <h1><span><i class="fa-solid fa-bangladeshi-taka-sign"></i></span>{{$package->price}}</h1>
                            <div class="subscribe_box">
                                <a href="{{ route('subscribe.package', $package->id) }}"><button>Subscribe Now</button></a>
                                <ul>
                                    <li><div class="icon"><i class="fa-solid fa-circle-check"></i></div>Become 6 Month Pro Care Giverr</li>
                                    <li><div class="icon"><i class="fa-solid fa-circle-check"></i></div>Become lifetime Well Care member</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif

                    @endforeach

                </div>
                <div class="blank-2"></div>
            </div>

            </section>
            @endsection