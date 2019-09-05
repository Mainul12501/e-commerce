@extends('front.master')

@section('title')
    Product Page
@endsection

@section('body')
    <!-- top Products -->
    <div class="ads-grid">
        <div class="container">
            <!-- tittle heading -->
            <h4>Your shopping cart contains:
                <span>{{ $cartCollection->count() }} Products</span>
            </h4>
            <!-- //tittle heading -->
            <!-- product left -->
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="timetable_sub">
                        <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Product</th>
                            <th>Product Name</th>
                            <th>Quality</th>
                            <th>Unit Price</th>
                            <th>Sub Total</th>
                            <th>Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @php($total = 0)
                        @foreach($cartCollection as $item)
                        <tr class="rem1">
                            <td class="invert">{{ $i++ }}</td>
                            <td class="">
                                <img src="{{ asset($item->attributes->image) }}" alt=""  height="50" width="80">
                            </td>
                            <td class="invert">{{ $item->name }}</td>
                            <td class="invert">
                                <form action="{{ route('update-cart-product') }}" method="post">
                                    @csrf
                                    <input type="number" min="1" name="qty" value="{{ $item->quantity }}"/>
                                    <input type="hidden" min="1" name="id" value="{{ $item->id }}"/>
                                    <input type="submit" name="btn" value="Update">
                                </form>
                            </td>

                            <td class="invert">{{ $item->price }}</td>
                            <td class="invert">{{ $itemTotal = $item->price * $item->quantity }}</td>
                            <td class="invert">
                                <div class="rem">
                                    <a class="close1" href="{{ route('delete-cart-item',['id' => $item->id]) }}"> </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        <?php $total = $total + $itemTotal ?>
                        </tbody>
                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <th>Sub Total</th>
                            <td>{{ $total }}</td>
                        </tr>
                        <tr>
                            <th>Tax Total</th>
                            <td>
                                <?php
                                $tax = ($total*.15)
                                ?>
                                {{ $tax }}
                            </td>
                        </tr>
                        <tr>
                            <th>Grand Total</th>
                            <td>
                                <?php
                                $grandTotal = $total + $tax
                                ?>
                                {{ $grandTotal }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
