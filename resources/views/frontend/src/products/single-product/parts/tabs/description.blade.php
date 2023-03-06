<div class="tab-pane fade show active" id="productDesc" role="tabpanel"
     aria-labelledby="product-desc-tab">
    <div class="product-desc">
        <div class="product-desc-row" style="align-items: flex-start;">
            @if(isset($product->description_image) && $product->description_image!=null)
                <div class="product-thumb">
                    <img src="{{asset($product->description_image)}}" alt="Moren-Shop">
                </div>
            @endif
            <div class="product-content">
                {!! html_entity_decode(  \App\Library\LibHelper::echoJson($product->description,__('website.lang'))) !!}
            </div>
        </div>
    </div>
</div>
