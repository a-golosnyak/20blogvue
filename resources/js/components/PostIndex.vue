<template>
        <div class='col-md-9 blog-main '>
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
                    <!--router-link :to="`/post/${post.id}/edit`">
                        <button class="float-right ml-2">Edit</button>
                    </router-link-->
                    <br>
                    <button
                        class="float-right ml-2"
                        @click="Edit"
                    >Edit
                    </button>
                    <button
                        class="float-right"
                        @click="Delete"
                    >Delete</button>
                    <h5
                        class="mt-5"
                    >Comments
                    </h5>
                    <div>
                        <textarea
                            class="w-100 border-radius-3"
                            v-model="comment.body"
                        ></textarea>
                        <button
                            class="float-right mt-2"
                            :disabled="isLoading"
                            @click="SendComment">Send
                        </button>
                    </div>
                    <br style="clear: both;" >
                    <div v-for="comment in comments" >
                        <comment
                            :comment="comment"
                        ></comment>
                </div>
                </div>
            </div>
        </div>
</template>

<script>
    import axios from 'axios';
    import Comment from './Comment'

    export default {
        name: 'PostIndex',
        components:{
          Comment,
        },
        data (){
            return{
                post: {},
                comments : [],

                comment: {
                    user_id: null,
                    post_id: null,
                    body: null,
                },

                isLoading: null,
            }
        },
        props: {
            id: {
                type: String,
                default: null,
            },
        },
        created() {
            this.loadPost();
            this.loadPostComments();
        },

        methods: {
            loadPost(){
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + window.localStorage.getItem('token');
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

            loadPostComments(){
                console.log("getComments");

                axios
                    .get(`/api/comments/${this.id}`)
                    .then(({data})=>{
                        this.comments = data;
//                        console.log(this.comments)
                    })
                    .catch(({response}) =>{
                        if((response.status = 422)) {
                            this.errors = response.data;
                            console.log(this.errors);

                            this.$toast.error({
                                title: 'Error!',
                                message: this.errors.message,
                            })
                        }
                    })
            },

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
                        this.$toast.success({
                            title: 'Success!',
                            message: 'Post deleted.',
                        })
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
            },
            SendComment(){
                this.isLoading = true;
                axios
                    .post(`/api/comments`, {
                        'user_id':  window.localStorage.getItem('auth_user'),
                        'post_id':  this.post.id,
                        'body':     this.comment.body,
                    })
                    .then(({data}) => {
                        this.$toast.success({
                            title: 'Success!',
                            message: 'Comment created.',
                        });

                        location.reload();
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
                    .finally(() => this.isLoading = false);
            },
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
    }

    .blog-post-meta {
        margin-bottom: 1.25rem;
        color: #999;
    }

    .border-radius-3{
        border-radius: 3px;
    }

</style>
