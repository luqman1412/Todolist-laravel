@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Add list</div>

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
                      
                        <form action="{{route('todolist.store')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="form-group col-md-8">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter list name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">    
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="label">Label</label>
                                    <select id="label" name="label_id" class="form-control">
                                        @forelse ($label as $labels)
                                            <option value="{{$labels->id}}" >{{$labels->label_name}}</option>
                                            
                                        @empty
                                            empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection