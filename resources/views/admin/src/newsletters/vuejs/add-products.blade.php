<div class="row layout-top-spacing w-100" id="addProducts">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing p-0-auto">
        <div class="widget-content widget-content-area br-6">
            <h4>Add Products</h4>
            <input type="hidden" name="newsletter_id" value="{{$newsletter->id}}"/>
            <div class="row mb-5">
                <div class="col-6">
                    <label for="title">@lang("website.number-of-products")</label>
                    <div>
                        <select class="form-control" v-model="productsNo">
                            <option class="form-control" disabled
                                    value="0">@lang("website.select_number_of_products")</option>
                            <option class="form-control" value="1">1</option>
                            <option class="form-control" value="2">2</option>
                            <option class="form-control" value="3">3</option>
                        </select>
                    </div>
                </div>
            </div>

            <div v-if="productsNo != 0">
                <div v-for="index in range(productsNo)" class="row">
                    <div class="col-md-6 col-sm-12">
                        <label for="prod">@lang("website.product")</label>
                        <select id="prod" class="form-control" v-model="selectedProducts[index]">
                            <option class="form-control" disabled value="0">@lang("website.select_product")</option>
                            <option class="form-control" v-for="(indexProd,prod) in products" :value="prod">@{{
                                prod.code }} - @{{ echoJson(prod.name, 'en') }}
                            </option>

                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <label for="position">@lang("website.position")</label>
                        <input id="position" class="form-control" type="text" disabled :value="index + 1">
                    </div>
                </div>
                <div class="row">
                    <button class="btn btn-info mt-33" type="button"
                            @click="add()">@lang("website.add")</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var app = new Vue({
        el: '#addProducts',

        data() {
            return {
                productsNo: 0,
                products: {!! json_encode($products)!!},
                product: null,
                selectedProducts: []
            }
        },
        computed: {
            dropdownValue() {
                return this.productsNo
            }

        },
        methods: {
            submitProduct(index) {
            },

            range(number) {
                let a = [];
                for (let i = 0; i <= number - 1; i++) {
                    a.push(i);
                }
                return a;
            },
            echoJson(json, lang) {
                var ret = null;
                if (json[lang])
                    ret = json[lang];
                return ret;
            },

            add() {
                const self = this;
                let selectedProducts = self.selectedProducts;
                let content = document.getElementsByClassName("ck-content")[0];
                let stringDiv = '<table style="border: 1px solid #bebebe;"><tbody>';

                selectedProducts.forEach((el) => {
                    if (el.images[0] != null) {
                        stringDiv += `<tr style="border: 1px solid #bebebe">
                                    <td style="padding: 10px;"><img style="height: 200px; object-fit: contain;" src='${el.images[0].image}'></td>
                                    <td style="padding: 10px;">${this.echoJson(el.name, 'en')}<br />` + self.stringToHTML(this.echoJson(el.short_description, 'en')) + `
                                    <h3 style="padding: 10px 0;">${el.price}€</h3>
                                    </tr>`
                    } else {
                        stringDiv += `<tr style="border: 1px solid #bebebe">
                                    <td style="padding: 10px;">${this.echoJson(el.name, 'en')}<br />` + self.stringToHTML(this.echoJson(el.short_description, 'en'))  + `
                                    <h3 style="padding: 10px 0;">${el.price}€</h3>
                                    </tr>`
                    }
                });
                stringDiv += '</tbody></table>';
                content.append(stringDiv);
            },
            stringToHTML(str) {
                var parser = new DOMParser();
                var doc = parser.parseFromString(str, 'text/html');
                return $(doc.body).html();
            }
        }
    });
</script>
