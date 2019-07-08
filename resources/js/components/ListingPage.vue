<template>
    <div>

    </div>
</template>
<script>
    import { populateAmenitiesAndPrices } from '../helpers';

    import ImageCarousel from './ImageCarousel.vue';
    import ModalWindow from './ModalWindow.vue';
    import HeaderImage from './HeaderImage.vue';
    import ExpandableText from './ExpandableText.vue';

    export default {
        components: {
            ImageCarousel,
            ModalWindow,
            HeaderImage,
            ExpandableText
        },
        computed: {
            listing() {
                return populateAmenitiesAndPrices(
                        this.$store.getters.getListing(this.$route.params.listing)
                );
            }
        },
        methods: {
            openModal() {
                this.$refs.imagemodal.modalOpen = true;
            }
        }
    }
</script>
<style>
    .heading {
        margin-bottom: 2em;
    }

    .heading h1 {
        font-size: 32px;
        font-weight: 700;
    }

    .heading p {
        font-size: 15px;
        color: #767676;;
    }

    .about {
        margin: 2em 0;
    }

    .about h3 {
        font-size: 22px;
    }
</style>
