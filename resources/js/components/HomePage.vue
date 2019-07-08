<template>
    <div class="home-container">
        <div
            v-for="(group, country) in listing_groups"
            :key="country"
            :listings="group"
            :country="country"
            class="listing-summary-group"
        ></div>
    </div>
</template>
<script>
    import { groupByCountry } from '../helpers';

    export default {
        computed: {
            listing_groups() {
            }
        },
        components: {

        }
    }
</script>
