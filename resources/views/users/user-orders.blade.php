@extends('layouts.admindashboard')


    @section('content')

    <div class="container mt-5">
        <a href="{{ route('allusers') }}" class="btn btn-primary">Back to users page</a>

            <div class="row" style="margin-top:10px;">
                <div class="row" style="margin-top:10px;">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">total-price</th>
                            <th scope="col">order-status</th>
                            <th scope="col">show order items</th>
                            <th scope="col">edit status</th>


                          </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)

                            <tr>
                              <th scope="row">{{  $order->id  }}</th>
                              <td>{{ $order->total_price }}</td>
                              <td>{{ $order->status }}</td>
                              <td>
                                    <a href="" class="btn btn-secondary">show</a>
                               </td>
                              <td>
                                <form action="{{ route('accept',$order->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success">accept</button>
                                </form>
                               </td>
                              <td>
                                <form action="{{ route('reject',$order->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger">reject</button>
                                </form>
                               </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
            </div>
        </div>


    @endsection


