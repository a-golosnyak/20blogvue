<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component!!!</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
                <h3>{{this.counter}}</h3>
                <carousel-control dir="right" @counter="changeValue"></carousel-control>
                <carousel-control dir="left"  @counter="changeValue"></carousel-control>
            </div>
        </div>
    </div>
</template>

<script>
import CarouselControl from './CarouselControl.vue'

    export default {
        components:{
            CarouselControl
        },
        data: () => ({
            counter : 0,
        }),
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            changeValue(val){
                this.counter = this.val;
                alert("asd");
            },
        },
    }
</script>
 
<style>
    .card{
        background-color: aquamarine;
    }
</style>

