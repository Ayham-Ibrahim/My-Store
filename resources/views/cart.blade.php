@extends('layouts.cart')

@section('content')

    <div class="container">
        <form action="{{ route('store_orders') }}" method="POST">
            @csrf
            @method('post')
            <div class="row" style="margin-top:10px;">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">product-image</th>
                            <th scope="col">name</th>
                            <th scope="col">price</th>
                            <th scope="col">quantity of product</th>
                            <th scope="col">quantity for order</th>
                            <th scope="col">delete</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        <tr>
                                        <th scope="row">{{ $loop->index }}</th>
                                        <td style="width:18%;"><img src="{{ asset('imgs') }}/{{ $details['photo'] }}" width="100" height="100" class="img-responsive"/></td>
                                        <td>{{ $details['product_name'] }}</td>
                                        <td> ل.س {{ $details['price'] }}</td>
                                        <td>{{ $details['quantity'] }}</td>
                                        <td>
                                            <input name="products_ids[]" type="hidden" value="{{ $id }}"/>
                                            <input name="quantity[]" type="number" class="form-control quantity cart_update" min="1" />
                                        </td>
                                        <td>
                                            <form id="remove-form-{{ $id }}" action="{{ route('remove_from_cart', $id) }}" method="post">
                                                @csrf
                                                <button type="button" class="btn btn-danger btn-sm cart_remove" onclick="removeCartItem({{ $id }})">
                                                    <i class="fa fa-trash-o"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                        </tr>
                                    @endforeach
                            @endif
                        </tbody>
                        <tfoot>

                            <tr>
                                <td colspan="5" class="text-right">
                                    <a href="{{ url('home') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-money"></i> Checkout</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
<script>
    function removeCartItem(id) {
        if (confirm('Are you sure you want to delete this item?')) {
            fetch(`/remove-from-cart/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            })
            .then(response => {
                if (response.ok) {
                    document.getElementById(`remove-form-${id}`).remove();

                }
                window.location.reload();
            })

            .catch(error => {
                console.error('Error:', error);
            });
        }
    }
</script>
@endsection
