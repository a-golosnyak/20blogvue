<template>
    <div>
        <div
            v-for="comment in comments"
        >
            <div class="border rounded my-3 p-2">
                <span>{{ comment.user.name }}</span>
                <span>{{ comment.created_at }}</span>
                <span>{{ comment.body }}</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                comments : [],
            }
        },
        created(){
            this.getPostComments();

        },
        methods: {
            getPostComments(){
                console.log("getComments");

                axios
                    .get('/api/comments/1')
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
            }
        },
    }
</script>

<style>

</style>

