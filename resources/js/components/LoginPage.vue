<template>
    <div id="login" class="login-container ">
        <h3 class="mt-5 ml-3">Login</h3>
        <form role="" method="POST" action="/login" class="pt-0 mt-5">
            <div class="form-control">
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
            <div class="form-control">
                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="Password"
                    required
                    v-model="password"
                >
            </div>
            <div class="form-control">
                <input type='checkbox' name='remember'> Запомнить меня
            </div>
            <div class="form-control pt-4">
                <button type="button" @click="handleLogin">Log in</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                csrf_token: 'null',
                isLoggedIn: null,
                email : "",
                password : "",
            }
        },
        beforeCreate(){
            this.csrf_token = document.querySelector('meta[name="csrf-token"]').content;
            this.isLoggedIn = document.querySelector('meta[name="login-status"]').content;
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
                    document.querySelector('meta[name="login-token"]').content = data.access_token;

                    window.localStorage.setItem('token', data.access_token)
//                  this.$router.go(-1);
                    location.href = '/';
                    this.$router.push('home');
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
    #login form {
        padding-top: 40px;
    }

    @media (min-width: 744px) {
        #login form {
            padding-top: 80px;
        }
    }

    #login .form-control {
        margin-bottom: 3em;
    }

    #login input[type=email],
    #login input[type=password],
    #login button,
    #login label {
        width: 100%;
        margin-left: auto;
        margin-right: auto;
        font-size: 19px !important;
        line-height: 24px;
        color: #484848;
        font-weight: 300;
        -webkit-appearance: none;
    }

    #login input {
        background-color: transparent;
        padding: 11px;
        border: 1px solid #dbdbdb;
        border-radius: 5px;
        box-sizing:border-box
    }

    #login button {
        background-color: #888;
        color: #ffffff;
        cursor: pointer;
        border: #4fc08d;
        padding-top: 12px;
        padding-bottom: 12px;
        border-radius: 5px;
        font-weight: bold;
    }

    .form-control{
        border: none;
        width: 60%;
    }
</style>
