@php
    $mini_cart_contents = Cart::content();
    $mini_sub_total = 0;
@endphp
@foreach ($mini_cart_contents as $mini_cart_content)
    <li class="min-item-{{ $mini_cart_content->rowId }}" data-mini-item-rowid="{{ $mini_cart_content->rowId }}">
        <div class="menu_cart_img">
            <img src="{{ asset($mini_cart_content->options->image) }}" alt="menu" class="img-fluid w-100">
        </div>
        <div class="menu_cart_text">
            <a class="title" href="{{ route('show-product', $mini_cart_content->options->slug) }}">{{ $mini_cart_content->name }} </a>
            <p class="size">{{ $mini_cart_content->options->size }}</p>
            @foreach ($mini_cart_content->options->optional_items as $optional_item)
            <span class="extra">{{ $optional_item['optional_name'] }} (+{{ $currency_icon }}{{ $optional_item['optional_price'] }})</span>
            @endforeach

            @php
                $item_price = $mini_cart_content->price * $mini_cart_content->qty;
                $item_total = $item_price + $mini_cart_content->options->optional_item_price;
                $mini_sub_total += $item_total;
            @endphp

            <p class="price mini-price-{{ $mini_cart_content->rowId }}">{{ $currency_icon }}{{ $item_total }}</p>
        </div>
        <input type="hidden" class="mini-input-price set-mini-input-price-{{ $mini_cart_content->rowId }}" value="{{ $item_total }}">
        <span class="del_icon mini-item-remove"><i class="fal fa-times"></i></span>
    </li>
@endforeach
