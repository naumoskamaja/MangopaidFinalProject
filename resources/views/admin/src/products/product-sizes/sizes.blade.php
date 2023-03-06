<div class="row layout-top-spacing" id="sizesSection">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing p-0-auto">
        <div class="widget-content widget-content-area br-6">
            <h4>Size</h4>
            <div class="table-responsive mb-4 mt-4">
                <table class="table w-100">
                    <thead>
                    <tr>
                        <th>@lang("website.size")</th>
                        <th>@lang("website.stock")</th>
                        <th>@lang("website.action")</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(index,size) in sizes">
                        <td>
                            <input type="text" class="form-control" v-model="size.size"></td>
                        <td><input type="number" class="form-control" v-model="size.stock"></td>
                        <td>
                            <label @click="saveSize(index)" class="pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-save">
                                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                    <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                    <polyline points="7 3 7 8 15 8"></polyline>
                                </svg>
                            </label>
                            <label @click="removeSize(index)" class="pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-x-circle table-cancel">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                </svg>
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group upload-img-container text-center upload-product-file-container">
                    <div class="row w-100">
                        <div class="col-5">
                            <input type="text" class="form-control" v-model="size.size">
                        </div>
                        <div class="col-5">
                            <input type="number" class="form-control" v-model="size.stock">
                        </div>
                        <div class="col-2 text-right">
                            <button type="button" v-on:click="saveSize()" style="border: 0; background: none; height: 45px!important;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-save">
                                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                    <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                    <polyline points="7 3 7 8 15 8"></polyline>
                                </svg>

                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.src.products.scripts.sizes-vue-file')

