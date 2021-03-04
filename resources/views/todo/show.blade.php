@extends('layouts.app')
@section('content')
     <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Todo Detail</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-success" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <h5>Name: {{$items->name}}</h5>
                        <h5>Label: {{$items->label->label_name}}</h5>
                        <h5>Time Added: {{$items->created_at->diffForHumans()}}</h5>
                        <br>
                        <a href="{{ route('todolist.index') }}"><button class="btn btn-sm btn-secondary">Back</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection