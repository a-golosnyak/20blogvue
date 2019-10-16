<template>
    <div>
        <div v-for="comment in comments" >
            <comment
                    class=""
                    :comment="comment"
                    @save="Save"
                    @delete="Delete"
            ></comment>
        </div>
    </div>
</template>

<script>
    import Comment from "./Comment";

    export default {
        name: 'CommentList',

        components: {
            Comment
        },
        data () {
            return {
                comments : [],
            }
        },
        props:{
            post_id: {
                type: String,
                default: null,
            },
        },
        created() {
            this.loadPostComments();
        },
        methods: {
            loadPostComments(){
                axios
                    .get(`/api/comments/${this.post_id}`)
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
                this.editing = !this.editing;
            },
            Save(){
                axios
                    .put(`/api/comments/${this.comment.id}`, {
                        'body':     this.comment.body
                    })
                    .then((data)=>{
                        this.editing = false;

                        this.$toast.success({
                            title: 'Success!',
                            message: 'Comment updated.',
                        })
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
            Delete(){

                axios
                    .delete(`/api/comments/${this.comment.id}`)
                    .then(({data})=>{
                        this.$toast.success({
                            title: 'Success!',
                            message: 'Comment deleted.',
                        })
//                        this.$router.go();
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
        },
    }
</script>

<style>
    input{
        paddig: 0px;
    }
</style>

