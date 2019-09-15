<template>
    <div class="">
        <div class="navigation navbar navbar-expand-sm p-0">
            <div class="container ">

                    <ul class="navbar-nav">
                        <li class="nav-item  ">
                            <a class="nav-link" href="/">
                                <router-link :to='`/`'>
                                    <a class="nav-link font-weight-bold" href="">Home</a>
                                </router-link>
                            </a>
                        </li>

                        <li class="nav-item  ">
                            <a class="nav-link" href="/">
                                <router-link :to='`/post/create`'>
                                    <a class="nav-link font-weight-bold" href="">Create Post</a>
                                </router-link>
                            </a>
                        </li>
                    </ul>
                <router-link :to="`/login`">
                    <a class="nav-link font-weight-bold" href="/login">Login</a>
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>


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

    .nav-link, .nav-item{
        color: #777;
    }
    .nav-link:hover, .nav-item:hover{
        color: #555;
    }
    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/1500/svg'%3E%3Cpath stroke='rgba(255, 255, 255, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }
    a {
        color: #555;
    }
</style>

