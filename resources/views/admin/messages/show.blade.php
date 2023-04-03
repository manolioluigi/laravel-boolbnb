@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="d-flex justify-content-between">
                <div>
                    <h2>Message Details for:</h2>
                    <h3 class="my-3">{{ $apartment->title }}</h3>
                </div>
                <div>
                    <a href="{{ route('admin.messages.index') }}" class="btn btn-primary">Back to List</a>
                </div>
            </div>
        </div>
        <div class="col-12 my-5">
            <label class="d-block"><strong>Message content:</strong></label>
            <p><strong>Mail From:</strong>{{ $message->user_mail }}</p>
            <p><strong>Content:</strong></p>
            <p>{{ $message->text }}</p>
        </div>
    </div>
</div>

@endsection