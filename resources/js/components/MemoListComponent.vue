<template>

</template>
<script>
export default {
    props: {
        memo: {
            type:Object,
        },
    },
    data() {
        return {
            memoList: []
        }
    },
    created() {
        axios.get('api/memo').then(res => {
            this.memoList = res.data.memoList;
            console.log(res.data.memoList)
        }).catch(error => {
            console.log(error)
        });}

}
</script>
