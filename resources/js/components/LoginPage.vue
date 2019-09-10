<template>
    <div id="login" class="login-container rpw">
        <form role="form" method="POST" action="/login" class="">
            <input type="hidden" name="_token" :value="csrf_token">
            <div class="form-control">
                <input id="email" type="email" name="email" placeholder="Email Address" required autofocus>
            </div>
            <div class="form-control">
                <input id="password" type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-control pt-4">
                <button type="submit">Log in</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                csrf_token: window.csrf_token
            }
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
