<template>
    <div>
<!--    <a  :href="url">{{url}}</a>-->
<!--    <h3 :data="name">{{name}}</h3>-->
<!--        <form action="">-->
<!--            <input v-model="message" class="form-control" type="text">-->
<!--        </form>-->

<!-- <h2 :style="{color:'blue',fontSize:fontSize+'px'}">{{message}}</h2> -->
<!--        <h2 :style="styleObject">{{message}}</h2>-->
<!--        <hr>-->
<!--        <h2 @click="number++">Increase</h2>-->
<!--        <h2 @click="number&#45;&#45;">Decrease</h2>-->
<!--        {{number}}-->
<!--        <hr>-->
<!--        <form action="" @submit.prevent="number++">-->
<!--            <button type="submit" class="btn btn-primary">Increase</button>-->
<!--        </form>-->
<!--        <form action="" @submit.prevent="number&#45;&#45;">-->
<!--            <button href="" class="btn btn-info" type="submit">Decrease</button>-->
<!--        </form>-->
<!--        <hr>-->
<!--        <button @click="Increase">Increase</button>-->
<!--        <h3 :style="{color: 'red',fontSize:fontSize+'px'}">{{name}}</h3>-->

<!--        <h3 v-if="is_active">{{name}}</h3>-->
<!--        <h3 v-else-if="name ==='Mousa'">Hi {{name}} and welcome</h3>-->
<!--        <h3 v-else>No user It</h3>-->
<!--        <ul>-->
<!--           <li v-for="post in posts" :key="post.id">{{post.name}}</li>-->
<!--        </ul>-->
        <h3>{{is_active === 1 ? 'activate' : 'Not Active'}}</h3>
<!--        <posts inline-template>-->
<!--            <h1 @click="display">Welcome Posts</h1>-->
<!--            <posts :data="33"></posts>-->
<!--        </posts>-->
        <posts></posts>
    </div>
</template>

<script>

    Vue.component('posts',{
        // props:['data'],
        // template:'<h2 style="color: blue">{{data}}</h2>',
        template:
            '<div>' +
            ' <ul> ' +
            '<post v-for="post in posts" :key="post.id">{{post.name}}</post>' +
            '</ul>' +
            ' </div>',
        data(){
            return{
                posts:[
                    {id:1,name:'ahmed'},
                    {id:2,name:'ismail'},
                    {id:3,name:'Mohammed'},
                ]
            }
        },
        methods:{
        display(){
            console.log('done');
    }
        }
    });
    Vue.component('post',{
        template:'<li><slot></slot></li>'
    });

    export default {
        name: "TestComponent",
        data: function() {
            return {
                message: '',
                // name: 'Mousa SH',
                // url: 'www.google.com',
                // number: 1,
                is_active: 1,
                // fontSize:17,
                // styleObject:{
                //     color:'yellow',
                //     fontSize:'20px',
                //     posts:[
                //         {id:1,name:'Mousa',address:'gaza'}  ,
                //         {id:1,name:'Mohammed',address:'Jenine'},
                //         {id:1,name:'Ismail',address:'Nables'}
                //     ],
                // }
            };
        },
        methods:{
            Increase () {
                this.fontSize++;
            }
        },
        watch:{
            is_active(){
            console.log('sending email')
            }
        }

    }
</script>

<style scoped>

</style>
