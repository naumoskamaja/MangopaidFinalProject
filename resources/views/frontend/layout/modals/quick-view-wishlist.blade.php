<div class="modal fade" id="product-modal-wishlist-{{$details['p_id']}}" tabindex="-1" aria-labelledby="product-wishlist-{{$details['p_id']}}-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe src="{{url('/view-product/'.$details['p_id'])}}" width="100%" height="600"></iframe>
            </div>
        </div>
    </div>
</div>
