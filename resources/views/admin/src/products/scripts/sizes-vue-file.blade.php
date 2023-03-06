<script>
    var app = new Vue({
        el: '#sizesSection',
        data() {
            return {
                size: {
                    size: null,
                    stock: 0
                },
                sizes: {!! json_encode($product->sizes) !!},
                id: '{{$product->id}}',
                url: '{{url('/')}}'
            }
        },
        methods: {
            saveSize(index = -1) {
                const self = this;
                let size = self.size;
                if (index >= 0)
                    size = self.sizes[index];
                axios.post(self.url + '/admin/product/size/' + self.id + '/save', size).then(function (res) {
                    showToast('success', res.data.message);
                    self.sizes = res.data.values;
                }).catch(function () {
                    showToast('error', `@lang("website.failed")`);
                });
            },
            removeSize(index) {
                const self = this;
                let sizeId = self.sizes[index].id;
                axios.post(self.url + '/admin/product/size/' + self.id + '/delete/' + sizeId).then(function (res) {
                    showToast('success', res.data.message);
                    self.sizes = res.data.values;
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
                    self.media.push(res.data.values);
                })
                    .catch(function () {
                        showToast('error', `@lang("website.uploading_failed")`);
                    });
            },
        }
    });
</script>
