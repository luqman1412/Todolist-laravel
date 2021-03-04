@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            
            <div class="col-md-10">
                <div class="title">
                    <h4><b>Todo list app</b></h4>
                </div>
                <div>
                    <a href="{{route('todolist.create')}}"><button class="btn btn-primary">Add List</button></a>
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
                                    <th scope="col">To do </th>
                                    <th scope="col">Label </th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($item as $items)
                                    <tr>
                                    <td>{{$items->name}}</td>
                                    <td><span class="badge badge-primary">{{$items->label->label_name}}</span> </td>
                                    <td>
                                        {{-- view button --}}
                                        <a href="{{route('todolist.show',['todolist'=>$items])}}"><button class="btn btn-sm btn-primary">View</button></a>                                        
                                        {{-- update button --}}
                                        <a href="{{route('todolist.edit',['todolist'=> $items])}}"><button class="btn btn-sm btn-warning">Edit</button></a>
                                        {{-- delete button --}}
                                        <a href="#" onclick="event.preventDefault(); $('#todolist-delete--{{ $items->id}}').submit();" ><button class="btn btn-sm btn-danger">Delete</button></a>
                                        <form action="{{route('todolist.destroy',['todolist'=> $items])}}" class="d-none" method="POST" id="todolist-delete--{{ $items->id}}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
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
