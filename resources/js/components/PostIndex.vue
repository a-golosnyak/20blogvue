<template>
        <div class='col-md-8 blog-main '>
            <div class='blog-post '>
                <div
                    class='container-fluid p-4'
                    v-if="post.user"
                >
                    <h2 class='blog-post-title'>{{ post.title }}</h2>

                    <h6 class='blog-post-meta'>
                        {{ post.created_at }} автор {{ post.user.name }}
                        <a class='none-decored' href='#'></a>
                    </h6>

                    <h5>{{ post.body }}</h5>

                    <hr>

                    <router-link :to="`/post/${post.id}/edit`">
                        <button class="comment-btn float-right ml-2">Изменить</button>
                    </router-link>
                    <button class="comment-btn float-right">Удалить</button>
                    <br>
                    <br>

                </div>
            </div>
        </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'PostIndex',
        data (){
            return{
                post: {},
            }
        },
        props: {
            id: {
                type: String,
                default: null,
            },
        },
        created() {
            console.log("Here post show.");
            axios
                .get(`/api/post/${this.id}`)
                .then(({data})=>{
                    console.log(data[0]);
                    this.post = data[0];
                })
        },
        computed: {

        },
        methods: {

        }
    }
</script>

<style>

    .blog-post {
        margin-top: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .blog-post-title {
        margin-bottom: .25rem;
        color: #505050;
        /*  font-size: 1.5rem;  */
    }

    .blog-post-meta {
        margin-bottom: 1.25rem;
        color: #999;
    }

    .comment-btn{
        display: inline;
        margin-bottom: 0.7em;
        text-align: center;
    }


</style>
