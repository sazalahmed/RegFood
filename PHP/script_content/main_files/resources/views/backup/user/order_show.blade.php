<div class="wsus__track_order">
    <ul>
        @if ($order->order_status == 1)
            <li class="active">{{__('order pending')}}</li>
            <li class="active">{{__('order accept')}}</li>
            <li class="active">{{__('order process')}}</li>
            <li>{{__('on the way')}}</li>
            <li>{{__('Completed')}}</li>
        @elseif ($order->order_status == 2)
            <li class="active">{{__('order pending')}}</li>
            <li class="active">{{__('order accept')}}</li>
            <li class="active">{{__('order process')}}</li>
            <li class="active">{{__('on the way')}}</li>
            <li>{{__('Completed')}}</li>
        @elseif ($order->order_status == 3)
            <li class="active">{{__('order pending')}}</li>
            <li class="active">{{__('order accept')}}</li>
            <li class="active">{{__('order process')}}</li>
            <li class="active">{{__('on the way')}}</li>
            <li class="active">{{__('Completed')}}</li>
        @elseif ($order->order_status == 4)
            <li class="active">{{__('order declined')}}</li>
            <li>{{__('order accept')}}</li>
            <li>{{__('order process')}}</li>
            <li>{{__('on the way')}}</li>
            <li>{{__('Completed')}}</li>
        @else
            <li class="active">{{__('order pending')}}</li>
            <li>{{__('order accept')}}</li>
            <li>{{__('order process')}}</li>
            <li>{{__('on the way')}}</li>
            <li>{{__('Completed')}}</li>
        @endif
    </ul>
</div>

@php
    $orderAddress = $order->orderAddress;
@endphp
<p class="delivary_time">{{__('estimated delivery time')}} : {{ $orderAddress->delivery_time }} {{__('Minutes')}}</p>

<div class="wsus__invoice_header">
    <div class="header_address">
        <h4>{{__('invoice to')}}</h4>

        <p> {{ $orderAddress->address }}</p>
        <p> {{ $orderAddress->name }}
            @if ($orderAddress->phone)
                , {{ $orderAddress->phone }}
            @endif
        </p>
        @if ($orderAddress->email)
            <p>{{ $orderAddress->email }}</p>
        @endif

    </div>
    <div class="header_address">
        <p><b>{{__('Order ID')}}:</b> <span> #{{ $order->order_id }}</span></p>
        <p><b>{{__('date')}}:</b> <span>{{ $order->created_at->format('d M, Y') }}</span></p>
        <p><b>{{__('Payment')}}:</b> <span>{{ $order->payment_status == 1 ? 'Success' : 'Pending' }}</span></p>
    </div>
</div>
<div class="wsus__invoice_body">
    <div class="table-responsive">
        <table class="table table-striped">
            <tbody>
                <tr class="border_none">
                    <th class="sl_no">{{__('SL')}}</th>
                    <th class="package">{{__('item description')}}</th>
                    <th class="price">{{__('Unit Price')}}</th>
                    <th class="qnty">{{__('Quantity')}}</th>
                    <th class="total">{{__('Total')}}</th>
                </tr>
                @php
                    $products = $order->orderProducts;
                @endphp
                @foreach ($products as $index => $product)
                    <tr>
                        <td class="sl_no">{{ ++$index }}</td>
                        <td class="package">
                            <p>{{ $product->product_name }}</p>
                            <span class="size">{{ $product->product_size }}</span>
                            @php
                                $optional_items = json_decode($product->optional_item);
                            @endphp
                            @foreach ($optional_items as $optional_item)
                                <span class="coca_cola">{{ $optional_item->item }}(+{{ $currency_icon }}{{ $optional_item->price }})</span>
                            @endforeach
                        </td>
                        <td class="price">
                            <b>{{ $currency_icon }}{{ $product->unit_price }}</b>
                        </td>
                        <td class="qnty">
                            <b>{{ $product->qty }}</b>
                        </td>
                        <td class="total">
                            <b>{{ $currency_icon }}{{ ($product->qty * $product->unit_price) + $product->optional_price }}</b>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <td class="package" colspan="3">
                        <b>{{__('sub total')}}</b>
                    </td>
                    <td class="qnty">
                        <b>{{ $order->product_qty }}</b>
                    </td>
                    <td class="total">
                        <b>{{ $currency_icon }}{{ $order->sub_total }}</b>
                    </td>
                </tr>
                <tr>
                    <td class="package coupon" colspan="3">
                        <b>(-) {{__('Discount coupon')}}</b>
                    </td>
                    <td class="qnty">
                        <b></b>
                    </td>
                    <td class="total coupon">
                        <b>{{ $currency_icon }}{{ $order->coupon_price }}</b>
                    </td>
                </tr>
                <tr>
                    <td class="package coast" colspan="3">
                        <b>(+) {{__('Delivery Charge')}}</b>
                    </td>
                    <td class="qnty">
                        <b></b>
                    </td>
                    <td class="total coast">
                        <b>{{ $currency_icon }}{{ $order->delivery_charge }}</b>
                    </td>
                </tr>
                <tr>
                    <td class="package" colspan="3">
                        <b>{{__('Grand Total')}}</b>
                    </td>
                    <td class="qnty">
                        <b></b>
                    </td>
                    <td class="total">
                        <b>{{ $currency_icon }}{{ $order->grand_total }}</b>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
