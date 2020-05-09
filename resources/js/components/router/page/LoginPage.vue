<template>
    <div id="login" class="login-container ">
        <h3 class="mt-5 ml-3">Login</h3>
        <form role="" method="POST" action="/login" class="pt-0 mt-5">
            <div class="">
                <input
                    id="email"
                    type="email"
                    name="email"
                    placeholder="Email Address"
                    required
                    autofocus
                    v-model="email"
                >
            </div>
            <div class="mt-4">
                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="Password"
                    required
                    v-model="password"
                >
            </div>
            <div class="mt-4">
                <input type='checkbox' name='remember'> Remember me
            </div>
            <div class="mt-4">
                <b-button type="button" @click="handleLogin">Log in</b-button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                email : "",
                password : "",
            }
        },
        methods: {
            handleLogin(){
                axios
                .post('api/login', {
                    'email': this.email,
                    'password': this.password,
                })
                .then(({data}) => {
                    this.$toast.success({
                        title: 'Success!',
                        message: data.token_type,
                    })
                    document.querySelector('meta[name="login-status"]').content = true;
                    document.querySelector('meta[name="login-token"]').content = data.access_token;     // use for debug

                    window.localStorage.setItem('token', data.access_token)
                    window.localStorage.setItem('auth_user', data.user_id);
//                  this.$router.go(-1);
                    location.href = '/';
//                  this.$router.push('home');
                    axios.defaults.headers.common['Authorization'] = 'Bearer ' +- window.localStorage.getItem('token');
                })
                .catch(({response}) => {
                    this.$toast.error({
                        title: 'Error!',
                        message: this.errors.message,
                    })
                })
                .finally(() => this.isLoading = false);
            },
        }
    }
</script>

<style>

</style>
