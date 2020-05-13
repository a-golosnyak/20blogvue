<template>
    <div class="">
        <div class="navigation navbar navbar-expand-sm py-2">
            <div class="container ">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link :to='`/`' class="non-decorated">
                            <div class="nav-link font-weight-bold" href="">Home</div>
                        </router-link>
                    </li>
                    <li class="nav-item  ">
                        <router-link :to='`/post/create`' class="non-decorated">
                            <div class="nav-link font-weight-bold" href="">Create Post</div>
                        </router-link>
                    </li>

                    <li class="nav-item">
                        <router-link :to='`/post/create`' class="non-decorated">
                            <div class="nav-link font-weight-bold" href="">Forum</div>
                        </router-link>
                    </li>
                </ul>
                <div
                    v-if="loggedIn"
                    class="form-inline pull-right"
                >
                    <div class="nav-item">
                        <router-link :to="`/user/${user_id}`" class="non-decorated">
                            <div class="nav-link font-weight-bold" href="">Profile</div>
                        </router-link>
                    </div>
                    <div
                        class="nav-item font-weight-bold link"
                        @click="logOut"
                    ><div class="nav-link">Log out</div>
                    </div>
                </div>
                <div
                    v-else
                    class="form-inline pull-right"
                >
                    <div class="nav-item">
                        <router-link :to="`/login`" class="non-decorated">
                            <div class="nav-link font-weight-bold" href="">Login</div>
                        </router-link>
                    </div>
                    <div class="nav-item">
                        <router-link :to="`/register`" class="non-decorated">
                            <div class="nav-link font-weight-bold" href="">Register</div>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

export default {
    data() {
        return {
          user_id: null,
        }
    },
    props:{
      loggedIn: {
          type: Boolean,
          default: false,
      }
    },
    computed: {
    },


    created() {
        this.user_id = window.localStorage.getItem('auth_user');
    },
    methods: {
        logOut() {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + window.localStorage.getItem('token');

            window.localStorage.setItem('token', '');
            window.localStorage.setItem('auth_user', '');

            axios
                .post('/api/logout')
                .then(({data}) => {
                    this.$toast.success({
                        title: 'Success! You are logged out',
                        message: data.token_type,
                    })
                    document.querySelector('meta[name="login-status"]').content = '';
                    document.querySelector('meta[name="login-token"]').content = '';

                    window.localStorage.setItem('token', '')
                    window.localStorage.setItem('auth_user', '');
//                  this.$router.go(-1);
                })
                .catch(({response}) => {

                    this.$toast.error({
                        title: 'Error!',
                        message: this.errors.message,
                    })
                })
                .finally(() => {
                    this.isLoading = false
                     location.href = '/';
                });
        }
    }
}
</script>

<style>
    .navigation {
        background: linear-gradient(
            rgba(150, 150, 150, 0.7),
            rgba(150, 150, 150, 0.8),
            rgba(150, 150, 150, 0.9),
            rgba(150, 150, 150, 1.0));
        -webkit-box-shadow: inset 0 -0.1rem 0.25rem rgba(0, 0, 0, 0.1);
        box-shadow: inset 0 -0.1rem 0.25rem rgba(0, 0, 0, 0.1);
        font-size: 1.1rem;
    }

    .nav-item{
        margin-left: 0.5em;
        margin-right: 0.5em;
    }
    .nav-item .nav-link{
        color: #777;
        border: 0;
    }
    .nav-item:hover .nav-link:hover{
        color: #555;
        border: 0;
    }
    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/1500/svg'%3E%3Cpath stroke='rgba(255, 255, 255, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }


    .link{
        cursor: pointer;
    }
</style>

