<template>
    <div>
        <hr>
        <i :class="classes"  @click="clicked"></i>
        <hr>
    </div>
</template>

<script>
    export default {
        name: 'CarouselControl',

        props: ['dir'],

        computed: {
            classes() {
                return 'carousel-control fa fa-2x fa-chevron-' + this.dir;
            }
        },
        
        methods: {
            clicked() {
                alert("asdasd");
                this.$emit('counter', this.dir === 'left' ? -1 : 1);
            }
        }
    }
</script>

<style>
.carousel-control {
        padding:1rem;
        color:#d35656;
        opacity:0.85
    }
    @media (min-width:744px) {
        .carousel-control {
            font-size:3rem;
        }
    }

</style>

