<template>
    <div class="container">
        <div id="menu_wrap" class="bg-yellow-600 text-black w-128 px-1 py-2">
            <div class="option">
                <button class="py-2 px-4 rounded-lg shadow-md text-white bg-blue-500" v-on:click="getData">
                    Click [{{title}}]
                </button>
                <button class="absolute mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width={1.5} stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                    </svg>
                </button>

                <input type="text" id="keyword" size="20" class="w-full px-5 py-1 rounded-lg outline-none" placeholder="입력해 주세요" v-model="title" @keyup="display_on" @keyup.enter="submit">
            </div>
            <div class="top-wrapper w-128 flex justify-between pb-8 px-6 py-8  bg-amber-300 hover:bg-amber-500 rounded-t-lg " v-show="display" >
                <div class="memo-side">
                    <div class="new-title text-3xl font-bold ">{{title}}</div>
                </div>
            </div>
            <div class="memo-side" >
                <div class="top-wrapper w-128 flex justify-between pb-8 px-6 py-8  bg-amber-300 hover:bg-amber-500 rounded-t-lg " v-for="(item,idx) in memoList" :key="idx"  >

                    <div class="new-title text-3xl font-bold ">
                        <div pt-3>
                            {{item.title}}
<<<<<<< Updated upstream
=======
                            <button class="py-2 px-4 rounded-lg shadow-md text-white bg-red-500" v-on:click="deleteData(item.id)">
                            x
                            </button>
>>>>>>> Stashed changes
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {

    data() {
        return {
            memoList : [],
            title: '', // Memo 생성할 때, text form 값과 v-model 로 바인딩
            display: false,
        }
    },
    created() {
        axios.get('api/memo').then((res) => {
            this.memoList = res.data.memoList;
            console.log(res.data.memoList)
        }).catch(error => {
            console.log(error)
        });}
,
    methods: {
        submit()
            {
                if (this.title === '') {
                    alert('메모를 입력해 주세요');
                } else {
                  axios.post('api/memo/title', {
                        title: this.title,
                    }).then((res => {
                        this.memoList = res.data.memoList
                        this.getData()
                    })
                        .catch(error => console.log(error.response)));
                }
            this.title = ''; // 초기화
            }
            ,
            display_on(){
                this.display = this.title !== '';
            }
            ,
        getData(){
            axios.get('api/memo').then((res) => {
                this.memoList = res.data.memoList;
                console.log(res.data.memoList)
            }).catch(error => {
                console.log(error)
            });}
        }
}
</script>
