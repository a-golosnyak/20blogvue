<template>
    <div class="blog-header">
        <div class="container">
            <a class='non-decorated blog-title' href="/">Electro Blog</a>
            <p class=" blog-description">Блог разработчика электроники.</p>
        </div>
    </div>
</template>

<script>

</script>

<style>
    .blog-header {
        padding-top: 1.5rem;
        padding-bottom: 1rem;
        border: 1px solid grey;
        background: linear-gradient(rgba(255, 255, 255, 0.6),
        rgba(255, 255, 255, 0.8)), no-repeat, url(/images/03_pcb.jpg);
        background-position: 50% 10%;
    }

    .blog-title {
        margin-bottom: 0;
        font-size: 4rem;
        font-weight: 500;
        color: #202020;
    }

    .blog-description {
        font-size: 1.2rem;
        font-weight: 500;
        color: #999;
    }

</style>

