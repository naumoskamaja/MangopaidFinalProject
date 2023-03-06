<div class="tab-pane fade" id="productExpertTips" role="tabpanel"
     aria-labelledby="product-expert-tips-tab">
    <div class="product-content" style="width: 100% !important;">
        {!! html_entity_decode(\App\Library\LibHelper::echoJson($product->expert_tips,__('website.lang'))) !!}
    </div>
</div>
