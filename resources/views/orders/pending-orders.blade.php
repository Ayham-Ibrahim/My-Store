@extends('layouts.admindashboard')


    @section('content')

    <div class="container mt-5">
            <div class="row" style="margin-top:10px;">
                <div class="row" style="margin-top:10px;">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">user-name</th>
                            <th scope="col">user-email</th>
                            <th scope="col">total-price</th>
                            <th scope="col">order-status</th>
                            <th scope="col">edit</th>


                          </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)

                            <tr>
                              <th scope="row">{{ $loop->index }}</th>
                              <td>{{ $order->user->name }}</td>
                              <td>{{ $order->user->email }}</td>
                              <td>{{ $order->total_price }}</td>
                              <td>{{ $order->status }}</td>
                              <td><a href="{{ route('show_order_items',$order->id) }}" class="btn btn-secondary">show</a></td>

                              <td>
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
                               </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
            </div>
        </div>


    @endsection


