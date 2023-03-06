<div class="modal fade" id="product-modal-{{$product->id}}" tabindex="-1"
     aria-labelledby="product-{{$product->id}}-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="max-height: 800px;height: 80vh;width: 100%;">
            <div class="modal-header" style="border: none;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe src="{{url('/view-product/'.$product->id)}}" width="100%" height="100%" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</div>
