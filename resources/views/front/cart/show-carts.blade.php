@extends('front.master')

@section('title')
    Product Page
@endsection

@section('body')
    <!-- top Products -->
    <div class="ads-grid">
        <div class="container">
            <!-- tittle heading -->
            <h4 class="mb-5">Your shopping cart contains:
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
                            <th>Product Image</th>
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
                                <td>
                                    <img src="{{ asset($item->attributes->images) }}" alt="" height="100" width="100">
                                </td>
                                <td class="invert">{{ $item->name }}</td>
                                <td class="invert">
                                    <form action="{{ route('update-cart-product') }}" method="post">
                                        @csrf
                                        <input type="number" min="1" name="qty" value="{{ $item->quantity }}"/>
                                        <input type="hidden" min="1" name="id" value="{{ $item->id }}"/>
                                        <input type="submit" name="btn" value="update"/>
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
                            <?php $total = $total + $itemTotal?>
                            @endforeach
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
                                    $tax = ($total * 0.15)
                                ?>
                                {{ $tax }}
                            </td>
                        </tr>
                        <tr>
                            <th>Grand Total</th>
                            <td>
                                <?php
                                $grand = ($tax + $total)
                                ?>
                                {{ $grand }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
