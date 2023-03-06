<div class="row layout-top-spacing" id="mediaGallery">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing p-0-auto">
        <div class="widget-content widget-content-area br-6">
            <h5>Media</h5>
            <div class="table-responsive mb-4 mt-4">
                <table class="table w-100">
                    <thead>
                    <tr>
                        <th>@lang("website.image")</th>
                        <th class="align-center">@lang("website.meta_tag")</th>
                        <th class="align-right">@lang("website.action")</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(index, image) in media">
                        <td><img :src="generateUrl(image.image)" class="height-40" :alt="image.thumbnail"/></td>
                        <td class="align-center"><input type="text" class="form-control" v-model="image.meta_tag"></td>
                        <td class="align-right">
                            <label @click="removeImage(index)">
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
                    <label class="width-200px">
                        <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
                    </label>
                    <br/>
                    <button type="button" v-on:click="submitFile()" class="btn btn-info">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-share">
                            <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                            <polyline points="16 6 12 2 8 6"></polyline>
                            <line x1="12" y1="2" x2="12" y2="15"></line>
                        </svg>
                        <span class="icon-name"> </span>
                        @lang("website.upload")
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.src.products.scripts.images-vue-file')

