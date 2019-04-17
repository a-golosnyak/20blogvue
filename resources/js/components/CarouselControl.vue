<template>
    <div>
        <div @click="clicked">
            <i :class="classes" ></i>
        </div>
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
            clicked: function() {
                this.$emit('counterAction', this.dir === 'left' ? -1 : 1);
            },
        }
    }
</script>

<style>
.carousel-control {
        padding:1rem;
        color:rgb(107, 202, 174);
        opacity:0.85;
        cursor: pointer;
        font-size:1rem;
        width: 20px;
    }
    @media (min-width:744px) {
        .carousel-control {
            font-size:3rem;
        }
    }

</style>

