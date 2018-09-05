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
                        <div v-bind:class="{ 'navbar-menu': true, 'is-active': isActive }" >
                            <div class="navbar-start">
                                <p class="navbar-item">
                                    <router-link :to="{ name: 'home' }" class="link is-info">Home</router-link>
                                </p>
                                <p class="navbar-item">
                                    <router-link :to="{ name: 'hello' }" class="link is-info">Hello World</router-link>
                                </p>
                                
                                <p class="navbar-item">
                                    <router-link :to="{ name: 'login' }" class="link is-info">Login</router-link>
                                </p>
                                <p class="navbar-item">
                                </p>
                            </div>
                        </div>
                        <a role="button" @click="activate" class="navbar-burger" aria-label="menu" aria-expanded="false">
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
    export default {
        data() {
            return {
                isActive: false,
            };
        },
        methods: {
            activate() {
                this.isActive = !this.isActive;
                return this.isActive;
            }
        }
    };
</script>