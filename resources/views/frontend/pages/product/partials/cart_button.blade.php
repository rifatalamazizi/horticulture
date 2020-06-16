<form class="form-inline" action="{{ route('carts.store') }}" method="post">
    @csrf
    <div class="product-action">
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <button onclick="addToCart({{ $product->id }})" type="button" class="btn-product btn-cart" style="color:white; font-size:1.3rem; background-color:#A6C76C; border-color:#A6C76C">Add to cart</button>
    </div>
</form>

<!-- <div class="product-action">
    <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
</div> -->