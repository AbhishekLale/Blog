<template>
  <div class="container">
      
    <h2>feed</h2>
    <div class="mt-2">
      <div class="card text-white bg-dark mb-3 mt-3" v-for="(post, index) in posts_data" v-bind:key="index">
        <div class="card-body">
          <a v-bind:href="`post/get/`+post.id">
            <h5 class="card-title">{{ post.title }}</h5>
          </a>
          <p class="card-text">{{ post.description }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data(){
        return {
            posts_data: []
        }
    },
    created(){
        console.log('created')
        this.fetch()
    },
    mounted(){
        console.log('mounted')
    },
    methods: {
        fetch(){
            axios.get('post/getAll')
            .then( res=> {
                console.log( res )
                this.posts_data = res.data.posts
            })
            .catch( err=> {
                console.log(err)
            })
        }
    }
};
</script>