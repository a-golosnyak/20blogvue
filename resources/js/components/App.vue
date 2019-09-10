<template>
    <div>
        <Header>
        </Header>
        <Navigation>
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
//              csrf_token: window.csrf_token,
            }
        },
        created() {
            console.log("Here App vue.");
        },
        methods: {
            logout() {
                document.getElementById('logout').submit();
            }
        },
        computed: {
        }
    }
</script>
<style>

</style>
