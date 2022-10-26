<template>
    <div class="memo-side" >
    <div class="top-wrapper w-128 flex justify-between pb-8 px-6 py-8  bg-amber-300 hover:bg-amber-500 rounded-t-lg " v-for="(item,idx) in memoList" :key="idx"  >

            <div class="new-title text-3xl font-bold ">
                <div pt-3>
                    {{item.title}}
                </div>
            </div>
        </div>
    </div>
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
