<template>
    <div class='row'>
        <div class='col-md-9 '>
            <div class=''>
                <div
                    v-for="post in posts"
                    class='container-fluid p-4'
                >
                    <router-link
                        :to="`/post/${post.id}`"
                        class="non-decorated"
                    >
                        <h2 class=''>{{ post.title }}</h2>
                    </router-link>

                    <p class='blog-post-meta' v-if="post.user">{{ post.created_at}} author {{  post.user.name}}<a class='none-decored' href='#'></a>
                    </p>
                    <br>
                    <div class='post-footer'>
                        <router-link :to="`/post/${post.id}`">
                            <b-button class="">More...</b-button>
                        </router-link>

                        <!--a href="/delete/" class="float-left mr-2"><button class="">Edit</button></a>
                        <a href="/delpost/" class="float-left mr-2"><button class="">Delete</button></a-->

                        <!--a href='/#commentAnchor' class='cursor-pointer none-decored float-right mr-2'>
                            <div class=''>Comments</div>
                        </a-->
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    name: 'PostIndex',
    data() {
        return {
            posts: [],
            isLoggedIn: null,
        }
    },
    created() {
        this.isLoggedIn = document.querySelector('meta[name="login-status"]').content;
        console.log('Logged in: ' + this.isLoggedIn );

        axios
        .get('/api/post')
        .then(({data}) => {
            this.posts = data;
        })
        .catch(({response}) => {
            this.$toast.error({
            title: 'Error!',
            message: 'Unable to load posts',
            })
        })
    },
    computed: {

    },
    components: {
    }
}
</script>

<style>

</style>
