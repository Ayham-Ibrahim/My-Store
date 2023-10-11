@extends('layouts.admindashboard')


    @section('content')

    <div class="container mt-5">
        @if(Session::get('sucsses'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('sucsses')}}
            </div>
        @endif
        @if(Session::get('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{Session::get('message')}}
            </div>
        @endif
        @if(Session::get('del'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{Session::get('del')}}
            </div>
        @endif
        @if(Session::get('restore'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{Session::get('restore')}}
            </div>
        @endif
            <a href="{{route('categories.create')}}" class="btn btn-primary">Add new category</a>
            <a href="{{ route('deletedcategory') }}" class="btn btn-secondary">show deleted category</a>
            <div class="row" style="margin-top:10px;">
                <div class="row" style="margin-top:10px;">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">name</th>
                            <th scope="col">edit</th>

                          </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)

                            <tr>
                              <th scope="row">{{ $loop->index }}</th>
                              <td>{{ $category->name }}</td>
                              <td>
                                <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('category_products',$category->id) }}" class="btn btn-secondary">show</a>
                                    <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-primary">edit</a>
                                    <button type="submit" class="btn btn-danger">SoftDelete</button>
                                 </form>
                               </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
            </div>
        </div>


    @endsection

