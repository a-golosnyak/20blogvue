<template>
        <div class='col-md-8 blog-main '>
            <div class='blog-post '>
                <div
                    class='container-fluid p-4'
                    v-if="post.user"
                >
                    <h2 class='blog-post-title'>{{ post.title }}</h2>

                    <h6 class='blog-post-meta'>
                        {{ post.created_at }} auhor {{ post.user.name }}
                        <a class='none-decored' href='#'></a>
                    </h6>

                    <h5>{{ post.body }}</h5>

                    <hr>

                    <!--router-link :to="`/post/${post.id}/edit`">
                        <button class="comment-btn float-right ml-2">Edit</button>
                    </router-link-->

                    <button
                        class="comment-btn float-right ml-2"
                        @click="Edit"
                    >Edit
                    </button>
                    <button
                        class="comment-btn float-right"
                        @click="Delete"
                    >Delete</button>
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
            console.log(document.querySelector('meta[name="login-token"]').content);

            axios.defaults.headers.common['Authorization'] = 'Bearer ' + document.querySelector('meta[name="login-token"]').content;
            axios
                .get(`/api/post/${this.id}`)
                .then(({data})=>{
                    this.post = data;
                })
                .catch(({response}) => {
                    this.$toast.error({
                        title: 'Error!',
                        message: 'Unable to load post',
                    })
                })
        },
        computed: {

        },
        methods: {
            Edit(){
                this.$router.push({ name: 'post.edit', params: {
                    title:  this.post.title,
                    body:   this.post.body
                }})
            },
            Delete(){
                console.log("Delete method. " + this.post.title);
                axios
                    .delete(`/api/post/${this.id}`)
                    .then(({data})=>{
                        console.log('Post Deleted.')
                        this.$router.go(-1);
                    })
                    .catch(({response}) => {
                        if ((response.status = 422)) {
                            this.errors = response.data;
                            console.log(this.errors);

                            this.$toast.error({
                                title: 'Error!',
                                message: this.errors.message,
                            })
                        }
                    })
            }
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
