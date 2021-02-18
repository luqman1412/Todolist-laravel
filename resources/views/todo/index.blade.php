@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div>
                    <a href="{{route('todo.create')}}"><button class="btn btn-primary">Add List</button></a>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">Todo list</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">To do </th>
                                    <th scope="col">Created on</th>
                                    <th scope="col">Last updated</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($item as $items)
                                    <tr>
                                    <th scope="row">{{$items->id}}</th>
                                    <td>{{$items->name}}</td>
                                    <td>{{$items->created_at->diffForHumans()}}</td>
                                    <td>{{$items->updated_at->diffForHumans()}}</td>
                                    <td>view | delete</td>
                                </tr>
                                @empty
                                    <th >Empty</th>
                                @endforelse
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
