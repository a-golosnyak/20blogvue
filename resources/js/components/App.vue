<template>
    <div>
        <div class='main-field '>
            <div class='container-fluid ' >
                <div class='container data-field'>
                    <div class='row'>
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>s
        <router-view></router-view>
        <custom-footer></custom-footer>
    </div>
</template>
<script>
    import CustomFooter from './CustomFooter.vue';

    export default {
        components: {
            CustomFooter
        },
        data() {
            return {
                csrf_token: window.csrf_token
            }
        },
        methods: {
            logout() {
                document.getElementById('logout').submit();
            }
        },
        computed: {
            logoUrl() {
                return `${window.cdn_url || ''}images/logo.png`;
            }
        }
    }
</script>
<style>

</style>
