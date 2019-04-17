<template>
    <div class="container" style="background-color: lightgrey;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component!!!</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
                <h3>{{this.counter}}</h3>
                 </div>
        </div>
        <carousel-control dir="right" @counterAction="changeValue"></carousel-control>
                <carousel-control dir="left"  @counterAction="changeValue"></carousel-control>
           
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
            changeValue: function(val){
                this.counter += val;
            },
        },
    }
</script>
 
<style>
    .card{
        background-color: aquamarine;
    }
</style>

