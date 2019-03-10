<template></template>
<script>
export default {
    props: ['type', 'title', 'msg'],
    mounted: function () {
        this.showToastr(this.type, this.title, this.msg)
        console.log('Toastr mounted.')
    },
    methods: {
        showToastr: function (type, title, msg) {
            this.$toastr('add', {
                type: type,
                title: title,
                msg: msg,
                position: 'toast-top-right',
                clickClose: true,
                timeout: 7200
            })
        }
    }
}
</script> 