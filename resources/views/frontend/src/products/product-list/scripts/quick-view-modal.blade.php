<script>
    var quickViewModal = $(".product-quick-view-modal");
    $(".product-action .action-add-to-cart-open-modal").on('click', function () {
        quickViewModal.addClass('active');
        $("body").addClass('fix');
    });
    $(".btn-close, .canvas-overlay").on('click', function () {
        quickViewModal.removeClass('active');
        $("body").removeClass('fix');
    });
</script>
