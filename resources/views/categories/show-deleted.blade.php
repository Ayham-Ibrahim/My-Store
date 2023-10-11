@extends('layouts.admindashboard')


    @section('content')

    <div class="container mt-5">
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
                                <form action="{{ route('forcedelete_category',$category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('restore_category',$category->id) }}" class="btn btn-success">restore</a>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                               </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
            </div>
        </div>


    @endsection

