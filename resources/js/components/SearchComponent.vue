<template>
    <div>


   <input type="text" v-model="keyword" class="form-control" placeholder="Search Blogs ..." v-on:keyup="SearchBlogs">

        <div class="card-footer" v-if="results.length">
            <ul class="list-group">
                <li class="list-group-item" v-for="result in results">
                    <a href="">
                        {{result.title}}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SearchComponent",
        data(){
          return {
              keyword:'',
              results:[],
          }
        },
        methods:{
            SearchBlogs(){
                this.results =[];
                if (this.keyword.length > 1){
                    axios.get('/larablog/blogs/search',{params:{keyword:this.keyword}}).then(response=>{
                        this.results = response.data;
                    });
                }
            }
        }
    }
</script>

<style scoped>

</style>
