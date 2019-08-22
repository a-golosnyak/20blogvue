<template>
    <div>
        <div class='main-field '>
            <div class='container-fluid ' >
                <div class='container data-field'>
                    <div class='row'>

                        <div class='col-md-8 blog-main '>
                            <div class='blog-post'>
                                <div
                                    v-for="post in posts"
                                    class='container-fluid p-4'
                                >
                                    <a class='none-decored' href=''>
                                        <h2 class='blog-post-title'>{{ post.title }}</h2>
                                    </a>
                                    <p class='blog-post-meta'>Time автор Author<a class='none-decored' href='#'></a>
                                    </p>
                                    <div style='display: none;'>{{ post.art_id }}</div>
                                    <p>{{ post.intro }}</p>
                                    <p><img class='post-preview-img'></p>
                                    <br>
                                    <div class='post-footer'>
                                        <a href="/" class="float-left"><button class="comment-btn">Читать далее...</button></a>

                                        <a href="/delete/" class="float-left"><button class="comment-btn">Изменить</button></a>
                                        <a href="/delpost/" class="float-left"><button class="comment-btn">Удалить</button></a>

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
                </div>
            </div>
        </div>s
        <router-view></router-view>
        <custom-footer></custom-footer>
    </div>
</template>
<script>
    import CustomFooter from './CustomFooter.vue';
    import axios from 'axios';

    export default {
        components: {
            CustomFooter
        },
        data() {
            return {
                csrf_token: window.csrf_token,
                posts: [{
                    art_id: 1,
                    title: 'asd',
                    intro: 'qwerty',
                    img: null,
                },]
            }
        },
        created() {
            console.log("Here");
          axios
            .get('api/posts')
            .then(({data})=>{
                this.posts = data;
            })
        },
        methods: {
            logout() {
                document.getElementById('logout').submit();
            }
        },
        computed: {
            logoUrl() {
                return `${window.cdn_url || ''}images/logo.png`;
            }
        }
    }
</script>
<style>

</style>
