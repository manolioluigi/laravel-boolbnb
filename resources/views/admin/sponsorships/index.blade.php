@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 my-3">
            <div class="d-flex justify-content-between">
                <div>
                    <h2>Sponsorships:</h2>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex flex-wrap justify-content-around">
            @foreach($sponsorships as $sponsorship)
            <div class="card m-2" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('img/' . $sponsorship['name'] . '.png') }}" alt="{{ $sponsorship['name'] }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $sponsorship['name'] }}</h5>
                    <p class="card-text">{{ $sponsorship['description'] }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ $sponsorship['price'] }} &euro;</li>
                    <li class="list-group-item">{{ $sponsorship['duration'] }} hours</li>
                </ul>
                <div class="card-body d-flex flex-column gap-2">
                    <label for="apartments_select">Choose an Apartment</label>
                    <ul name="apartments_select" id="apartments_select">
                        @foreach($apartments as $apartment)
                        @if($apartment->user_id == $id)
                        <li value="{{ $apartment['id'] }}">
                            <a href="http://127.0.0.1:8000/admin/payments?id={{ $apartment->id }}&price={{ $sponsorship['price'] }}" class="card-link">
                                {{ $apartment['title'] }}
                            </a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection