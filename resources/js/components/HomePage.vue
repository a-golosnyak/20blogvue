<template>
    <div class='row'>
        <div class='col-md-8 blog-main '>
            <div class='blog-post'>
                <div
                    v-for="post in posts"
                    class='container-fluid p-4'
                >
                    <router-link :to="`/post/${post.id}`">
                        <h2 class='blog-post-title'>{{ post.title }}</h2>
                    </router-link>

                    <p class='blog-post-meta' v-if="post.user">{{ post.created_at}} автор {{  post.user.name}}<a class='none-decored' href='#'></a>
                    </p>
                    <br>
                    <div class='post-footer'>
                        <a href="/" class="float-left mr-2"><button class="comment-btn">Читать далее...</button></a>

                        <a href="/delete/" class="float-left mr-2"><button class="comment-btn">Изменить</button></a>
                        <a href="/delpost/" class="float-left mr-2"><button class="comment-btn">Удалить</button></a>

                        <a href='/#commentAnchor' class='cursor-pointer none-decored float-right mr-2'>
                            <div class='comments-link'>Комментарии</div>
                        </a>
                    </div>
                    <br style='clear: both;'>
                    <hr>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { groupByCountry } from '../helpers';
import axios from 'axios';

export default {
    data() {
        return {
            posts: []
        }
    },
    created() {
        console.log("Here Home.");
        axios
            .get('api/posts')
            .then(({data})=>{
                this.posts = data;
            })
    },
    computed: {

    },
    components: {
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
</style>
