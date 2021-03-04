@extends('layouts.app')
@section('content')
   <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Edit list</div>

                    <div class="card-body">
                       
                        <form action="{{route('todolist.update',[$todolist])}}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="form-group row">
                                <div class="form-group col-md-8">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter list name" value="{{$todolist->name}}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        {{$message}}
                                    </span>                                        
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="label">Label</label>
                                    <select id="label" name="label_id" class="form-control">
                                        @forelse ($labels as $label)
                                            <option value="{{$label->id}}" >{{$label->label_name}}</option>
                                            
                                        @empty
                                            empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Save list</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection