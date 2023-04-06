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
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('img/' . $sponsorship['name'] . '.png') }}" alt="{{ $sponsorship['name'] }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $sponsorship['name'] }}</h5>
                    <p class="card-text">{{ $sponsorship['description'] }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ $sponsorship['price'] }} &euro;</li>
                    <li class="list-group-item">{{ $sponsorship['duration'] }} hours</li>
                </ul>
                <div class="card-body">
                    <a href="http://127.0.0.1:8000/admin/payments" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection