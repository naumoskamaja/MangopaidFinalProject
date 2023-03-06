<div class="row layout-top-spacing w-100" id="mediaGallery2">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing p-0-auto">
        <div class="widget-content widget-content-area br-6">
            <h4>Media</h4>
            <div class="table-responsive mb-4 mt-4">
                <table class="table w-100">
                    <thead>
                    <tr>
                        <th>@lang("website.image")</th>
                        <th>@lang("website.link")</th>
                        <th>@lang("website.action")</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(index,image) of media">
                        <td><img :src="generateUrl(image.image, image.newsletter_id)"
                                 :alt="image.thumbnail" class="height-40"/></td>
                        <td>@{{image.image}}</td>
                        <td>
                            <label @click="removeImage(index)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-x-circle table-cancel">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                </svg>
                            </label>
                            <label @click="copyLink(index)" class="font-18">
                                <span><i class="fa fa-link"></i> </span>
                            </label>
                            <input type="hidden" :id="'src-input-' + index" :value="image.image">
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group upload-img-container text-center file-upload-div">
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
                        <span class="icon-name"> share</span>
                        @lang("website.upload")
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    console.log('img', {!! json_encode($newsletter->images) !!});
    var app = new Vue({
        el: '#mediaGallery2',
        data() {
            return {
                media: {!! json_encode($newsletter->images) !!},
                id: '{{$newsletter->id}}',
                url: '{{url('/')}}',
                src: ''
            }
        },

        methods: {
            generateUrl(thumb, newsletter_id) {
                if (thumb.includes('http://') || thumb.includes('https://')) {
                    return thumb;
                } else {
                    return this.url + thumb;
                }
            },
            removeImage(index) {
                const self = this;
                let imageId = self.media[index].id;
                axios.post(self.url + '/admin/newsletter/upload/' + self.id + '/image/' + imageId + '/delete').then(function (res) {
                    showToast('success', res.data.message);
                    self.media = res.data.values;
                }).catch(function () {
                    showToast('error', `@lang("website.failed_to_delete_media")`);
                });
            },
            copyLink(index) {
                const self = this;
                let imageId = self.media[index].id;
                let image = self.media[index];
                this.src = image.image;

                var copyText = document.getElementById("src-input-" + index);
                copyText.select();
                document.execCommand("copy");
                let content = document.getElementsByClassName("ck-content")[0];
                content.append('<img src="' + copyText.value + '"style="max-height: 400px; object-fit: contain !important;">');
            },
            createMenuItem(url) {
                let img = document.createElement('img');
                img.src = url;
                return img;
            },

            submitFile() {
                const self = this;
                let formData = new FormData();
                formData.append('file', self.file);
                axios.post(self.url + '/admin/newsletter/upload/' + self.id + '/image',
                    formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(function (res) {
                    self.media.push(res.data.values);

                })
                    .catch(function (err) {
                        showToast('error', `@lang("website.uploading_failed")`);
                    });
            },

            /*
              Handles a change on the file upload
            */
            // handleFileUpload() {
            //     const self = this;
            //     this.file = document.querySelector('#file').files[0];
            // }
            // handleFileUpload(){
            //     // console.log(event.target.files[0]);
            //     const self = this;
            //     this.file = document.querySelector('#myFile').files[0];
            //     // this.file = this.$refs.file.files[0];
            //
            // }
            handleFileUpload() {
                const self = this;
                this.file = document.querySelector('#file').files[0];
            }
        }
    });
</script>
