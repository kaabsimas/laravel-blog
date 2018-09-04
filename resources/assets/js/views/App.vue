<template>
    <div class="container">
        <section class="hero is-primary">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">Demo App</h1>
                    <h2 class="subtitle">a vue router and Bulma blog!</h2>
                    <nav class="navbar" role="navigation" aria-label="main navigation">
                        <div class="navbar-item">
                        </div>
                        <div class="navbar-menu">
                            <div class="navbar-start">
                                <p class="navbar-item">
                                    <router-link :to="{ name: 'home' }" class="link is-info">Home</router-link>
                                </p>
                                <p class="navbar-item">
                                    <router-link :to="{ name: 'hello' }" class="link is-info">Hello World</router-link>
                                </p>
                                
                                <p class="navbar-item">
                                    <router-link :to="{ name: 'posts' }" class="link is-info">Postagens</router-link>
                                </p>
                                <p class="navbar-item">
                                </p>
                            </div>
                        </div>
                        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
                            <span aria-hidden="true"></span>
                            <span aria-hidden="true"></span>
                            <span aria-hidden="true"></span>
                        </a>
                    </nav>
                </div>
            </div>
        </section>
        <section class="section">
            <router-view></router-view>
        </section>
    </div>
</template>
<script>
    export default {}
</script>