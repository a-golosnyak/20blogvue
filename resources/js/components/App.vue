<template>
    <div>
        <Header>
        </Header>
        <Navigation
            :loggedIn="loggedIn"
        >
        </Navigation>
        <div class='main-field '>
            <div class='container data-field'>
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>
<script>
    import Header from './Header.vue';
    import Navigation from './Navigation.vue';

    export default {
        components: {
            Header,
            Navigation
        },
        data() {
            return {
                loggedIn: false,
            }
        },
        created() {
            console.log("Here App vue. " + window.localStorage.getItem('token'));
            if (window.localStorage.getItem('token') !== '') {
                this.loggedIn = true;
            }

            console.log("Here App vue. " + this.loggedIn);
        },
        methods: {
        },
    }
</script>
<style>

</style>
