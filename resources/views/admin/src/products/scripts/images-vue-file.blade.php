<script>
    var app = new Vue({
        el: '#mediaGallery',
        data() {
            return {
                media: {!! json_encode($product->images) !!},
                id: '{{$product->id}}',
                url: '{{url('/')}}'
            }
        },

        methods: {
            generateUrl(thumb) {
                if (thumb.includes('http://') || thumb.includes('https://')) return thumb;
                else return this.url + '/' +thumb;
            },

            removeImage(index) {
                const self = this;
                let imageId = self.media[index].id;
                axios.post(self.url + '/admin/product/upload/' + self.id + '/image/' + imageId + '/delete').then(function (res) {
                    showToast('success', res.data.message);
                    self.media = res.data.values;
                }).catch(function () {
                    showToast('error', `@lang("website.failed_to_delete_media")`);
                });
            },

            submitFile() {
                const self = this;
                let formData = new FormData();
                formData.append('file', self.file);
                axios.post(self.url + '/admin/product/upload/' + self.id + '/image',
                    formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(function (res) {
                    showToast('success', res.data.message);
                    if (res.data.status == 200) {
                        self.media.push(res.data.values);
                    }
                })
                    .catch(function () {
                        showToast('error', `@lang("website.uploading_failed")`);
                    });
            },

            /* Handles a change on the file upload */
            handleFileUpload() {
                this.file = document.querySelector('#file').files[0];
            }
        }
    });
</script>
