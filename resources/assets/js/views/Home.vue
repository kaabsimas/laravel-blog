<template>
	<div>
	    <div class="loading" v-if="loading">
	        Loading...
	    </div>

	    <div v-if="error" class="error">
	        <p>{{ error }}</p>
	        <p>
	            <button @click.prevent="fetchData">
	                Tente outra vez
	            </button>
	        </p>
	    </div>

	    <div class="columns is-multiline" v-if="posts">
	        <div class="column is-one-third" v-for="{ title, description, user } in posts">
	            <div class="card">
				  	<div class="card-image">
				    	<figure class="image is-4by3">
				      		<img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
				    	</figure>
				  	</div>
				  	<div class="card-content">
				    	<div class="media">
				      		<div class="media-left">
				        		<figure class="image is-48x48">
				          			<img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
				        		</figure>
				      		</div>
				      		<div class="media-content">
						        <p class="title is-4">{{ title }}</p>
						        <p class="subtitle is-6">@{{ user.name }}</p>
				      		</div>
				    	</div>
				    	<div class="content">
				      		{{ description }}
				      		<br>
				      		<time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
				    	</div>
				  	</div>
				</div>
	        </div>
	    </div>
	</div>
</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            loading: false,
            users: null,
            error: null,
            posts: null, 
        };
    },
    created() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            this.error = this.users = null;
            this.loading = true;
            axios
                .get('/api/post')
                .then(response => {
                    this.loading = false;
                    this.posts = response.data;
                    console.log( response.data );
                })
                .catch(error => {
                    this.loading = false;
                    this.error = error.response.data.message || error.message;
                });
        }
    }
}
</script>