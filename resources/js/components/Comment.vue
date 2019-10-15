<template>
    <div>
        <div class="border rounded my-3 p-2">
            <span>{{ comment.user.name }}</span>
            <span>{{ comment.created_at }}</span>
            <span
                v-if="editing"
            >
                <input
                    v-model="comment.body"
                    class="w-50"
                ></input>
            </span>
            <span
                v-else
                v-text="comment.body"
            >
            </span>
            <button
                class="float-right ml-2 py-0 px-2"
                @click="Edit"
            >Edit
            </button>
            <button
                v-if="editing"
                class="float-right py-0 px-2"
                @click="Save"
            >Save
            </button>
            <button
                v-else
                class="float-right py-0 px-2"
                @click="Delete"
            >Delete
            </button>
        </div>
    </div>
</template>

<script>
    import SavedPage from "./SavedPage";
    export default {
        components: {SavedPage},
        data () {
            return {
                editing: false,
            }
        },
        props:{
          comment: {
              Type: Object,
              required: true,
          }
        },
        created(){
        },
        methods: {
            Edit(){
                this.editing = !this.editing;
            },
            Save(){
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + window.localStorage.getItem('token');
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
//                axios.defaults.headers.common['Authorization'] = 'Bearer ' + window.localStorage.getItem('token');

                axios
                    .delete(`/api/comments/${this.comment.id}`)
                    .then(({data})=>{
                        this.$toast.success({
                            title: 'Success!',
                            message: 'Comment deleted.',
                        })
                        this.$router.go();
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

