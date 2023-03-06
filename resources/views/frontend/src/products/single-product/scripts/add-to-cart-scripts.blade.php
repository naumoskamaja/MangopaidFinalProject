<script>
    let slider = new Swiper('.gallery-slider', {
        slidesPerView: 1,
        spaceBetween: 10,
        centeredSlides: true,
        loop: false,
        loopedSlides: 6,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    let thumbs = new Swiper('.gallery-thumbs', {
        slidesPerView: 'auto',
        spaceBetween: 10,
        centeredSlides: true,
        loop: false,
        slideToClickedSlide: true,
    });
    slider.controller.control = thumbs;
    thumbs.controller.control = slider;

    let productSizes = {!! json_encode($product->sizes) !!};
    let product = {!! json_encode($product) !!};
    let app = new Vue({
        el: '#app2',
        data: {
            productSizes: productSizes,
            product: product,
            sizes: [],
            showLoader: true
        },
        methods: {
            retClass(index) {
                let returnValue = 'margin-right: 5px;padding: 0 10px !important; cursor: pointer;float:left;text-align:center;border:3px solid #efefef;';
                if (index == this.product.selectedSize.replaceAll(' ', '-')) {
                    $('#sizeId-' + index).css('border', '3px solid #000');
                    for (let i = 0; i < this.sizes.length; i++) {
                        if (this.product.selectedSize.replaceAll(' ', '-') == this.sizes[i].size.replaceAll(' ', '-')) {
                            if (parseInt(this.sizes[i].stock) > 0){
                                document.getElementById('in-stock').innerText = '@lang('website.in_stock')';
                                document.getElementById('in-stock').classList.remove('red')
                            }
                            else{
                                document.getElementById('in-stock').innerText = '@lang('website.out_of_stock')';
                                document.getElementById('in-stock').classList.add('red');
                            }

                        }
                    }
                } else
                    $('#sizeId-' + index).css('border', '3px solid #efefef');
                return returnValue;
            },

            checkAddToCartButton() {
                if (typeof this.product.selectedSize != 'undefined' && this.product.selectedSize != null)
                    return false;
                return true;
            },

            checkClassButton() {
                let disabledClass = 'btn-theme btn-black disabled'
                let flag = false;
                for (let i = 0; i < productSizes.length; i++) {
                    if (productSizes[i].size == this.product.selectedSize && productSizes[i].stock > 0)
                        flag = true;
                }
                if (productSizes.length > 0) {
                    if ((typeof this.product.selectedSize != 'undefined' && this.product.selectedSize != null && flag == true)) {
                        disabledClass = 'btn-theme btn-black';
                        document.getElementById('sizeBtn').classList.remove('disabled')

                    }
                } else {
                    if (this.product.stock > 0) {
                        disabledClass = 'btn-theme btn-black';
                        document.getElementById('sizeBtn').classList.remove('disabled')
                    }
                }


                return disabledClass


            },

            checkClassDiv() {
                if (typeof this.product.selectedSize != 'undefined')
                    return 'akasha-variation-add-to-cart variations_button';
                return 'akas' +
                    'ha-variation-add-to-cart variations_button akasha-variation-add-to-cart-disabled';
            },
            checkClassWishlist() {
                if (typeof this.product.selectedSize != 'undefined') {
                    return 'add_to_wishlist';
                }
                return 'add_to_wishlist disabled wish-disabled';
            },

            makeActiveSize(index) {
                const self = this;
                this.product.selectedSize = index;
                this.sizes.map(size => {
                        if (size.size == index) {
                            size.active = true;
                            $('#selectedSize').val(self.product.selectedSize);
                        } else
                            size.active = false;
                        self.retClass(size.size);
                    }
                );
                this.checkClassButton();
            },
        },

        created() {
            const self = this;
            this.product.selectedSize = null;
            axios.get('/product/getSize?product=' + this.product.id)
                .then(function (response) {
                    // handle success
                    response.data.values.map(function (i) {
                        if (i.stock > 0) {
                            self.sizes.push(
                                {
                                    size: i.size,
                                    stock: i.stock,
                                    active: false
                                }
                            )
                        }
                    });
                })
                .catch(function (error) {
                    console.log(error);
                })
        }
    })

</script>
