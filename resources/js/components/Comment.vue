<template>
    <div class="">
        <div class="d-flex flex-row border rounded my-2 p-2 align-items-center">
            <div class="d-flex flex-row flex-grow-1 align-items-center">
                <div class="" v-text="comment.user.name"></div>
                <div class="ml-3" v-text="comment.created_at"></div>
                <div
                    v-if="editing"
                    class="ml-3"
                >
                    <input
                        v-model="comment.body"
                        class="p-1 m-0"
                    />
                </div>
                <div
                    v-else
                    class="ml-3"
                    v-text="comment.body"
                >
                </div>
            </div>
            <button
                v-if="editing"
                class="px-3"
                @click="editing = false"
            >Cancel
            </button>
            <button
                v-else
                class="px-3"
                @click="$emit('delete', comment.id)"
            >Delete
            </button>

            <button
                v-if="editing"
                class="px-4 ml-2"
                @click="saveComment(comment)"
            >Save
            </button>
            <button
                v-else
                class="ml-2"
                @click="editing = !editing"
            >Edit
            </button>


        </div>
    </div>
</template>

<script>
    export default {
        name: 'Comment',
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
            saveComment(newComment){
                this.$emit("update", newComment);
                this.editing = false;
            }
        },
    }
</script>

<style>

</style>

