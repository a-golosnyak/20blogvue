<template>
    <div class="container" style="background-color: lightgrey;">
        <div class="row justify-content-center">
            <div class="col-md-8">
            
                <div class="image-carousel">
                    <img :src="image">
                    <div class="controls">
                        <carousel-control
                            dir="left"
                            @change-image="changeImage"
                            @counterAction="changeValue"
                        >
                        </carousel-control>
                        <carousel-control
                            dir="right"
                            @change-image="changeImage"
                            @counterAction="changeValue"
                            >
                        </carousel-control>
                    </div>
                </div>
                
            </div>
            <h3>{{this.counter}}</h3>
        </div>       
    </div>
</template>

<script>
import CarouselControl from './CarouselControl.vue'

    export default {
        components:{
            CarouselControl
        },
        data () {
            return {
                counter : 0,
                images: [
                    '/images/2/Image_1.jpg',
                    '/images/2/Image_2.jpg',
                    '/images/2/Image_3.jpg',
                    '/images/2/Image_4.jpg'
                ]
            }
        },
        computed:{
            image(){
                return this.images[this.counter];
            }
        },
        methods: {
            changeValue: function(val){
                this.counter += val;
            },
            changeImage(val) {
                letnewVal = this.index + parseInt(val);
                
                if (newVal < 0) {
                    this.index = this.images.length -1;
                } else if (newVal === this.images.length) {
                    this.index = 0;
                } else {
                    this.index =newVal;
                }
            }
            
        },
    }
</script>
 
<style>
    .image-carousel {
        height:100%;
        margin-top: 0;
        position:relative;
        display:flex;
        align-items:center;
        justify-content:center;
    }
    
    .image-carousel img {
        width:100%;
    }
        
    .image-carousel .controls {
        position:absolute;
        width:100%;
        display:flex;
        justify-content:space-between;
    }
</style>

