<template>
    <div class="container" style="background-color: lightgrey;">
        <div class="row justify-content-center">
            <div class="col-md-8">
            
                <button type='submit' >Применить</button>        
                
            </div>
            <h3>{{this.counter}}</h3>
        </div>       
    </div>
</template>

<script>
import CarouselControl from './CarouselControl.vue'

    export default {
        components:{

        },
        data () {
            return {
                counter : 0,
            }
        },
        computed:{

        },
        methods: {

            
        },
    }
</script>
 
<style>

</style>

