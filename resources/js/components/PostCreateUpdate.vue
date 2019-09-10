<template>
        <div class='col-md-8 blog-main '>
            <form
                class=""
                @submit.prevent="save"
            >
            </form>
        </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'PostCreateUpdate',
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
        computed: {
            hasPost() {
                return !!this.post;
            },
        },
        created() {
            console.log("Here post show.");
            axios
                .get(`/api/post/${this.id}/edit`)
                .then(({data})=>{
                    console.log(data[0]);
                    this.post = data[0];
                })
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
