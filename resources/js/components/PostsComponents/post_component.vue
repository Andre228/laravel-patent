<template>
    <div clas="posts-div">
        <div class="content">
            <div class="title m-b-md">
                Laravel
            </div>
            <div class="links">
                <a href="https://laravel.com/docs">Docs</a>
                <a href="https://laracasts.com">Laracasts</a>
                <a href="https://laravel-news.com">News</a>
                <a href="https://blog.laravel.com">Blog</a>
                <a href="https://nova.laravel.com">Nova</a>
                <a href="https://forge.laravel.com">Forge</a>
                <a href="https://github.com/laravel/laravel">GitHub</a>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <!--<img src="..." class="card-img-top" alt="...">-->
            <div class="card-body">
                <h5 class="card-title">Название карточки</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Переход куда-нибудь</a>
            </div>
        </div>


    </div>
</template>



<script>
    export default {
        mounted() {
            console.log('Component mounted123.')
        }
    }
</script>
