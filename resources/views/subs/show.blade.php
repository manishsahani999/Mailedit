@extends('layouts.app')



@section('content')

<div class="row">
    <div class="col-sm-4">
        <div class="box p-2">
            <h4>User Info</h4>
            <div>
                Name : {{ $subs->first_name.' '.$subs->last_name }}
            </div>
            <div>
                Email: {{ $subs->email }}
            </div>
            <div>
                Phone: {{ $subs->phone }}
            </div>
        </div>
    </div>
    <div class="col-sm-8">      
        <div class="accordion" id="emailHistory">
            @foreach($emails as $email)
            <div class="card m-1">
                <div class="card-header" id="">
                <h5 class="mb-0">
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#{{ $email->uuid }}" aria-expanded="true" aria-controls="collapseOne">
                     View
                    </button>
                    <div class="is-inline">
                        <span class="badge badge-primary">{{ $email->subject}}</span>
                        <span class="badge badge-success">{{ $email->status }}</span>
                        <span class="badge badge-success">opend at: {{ $email->opened_on }}</span>
                    </div>
                </h5>
                </div>

                <div id="{{ $email->uuid }}" class="collapse" aria-labelledby="headingOne" data-parent="#emailHistory">
                <div class="card-body">
                   {!! json_decode($email->content, true) !!}
                </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>  
</div>

@endsection