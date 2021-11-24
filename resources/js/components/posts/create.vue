<template>
    <div class="container">
        <form action="" method="POST">
          <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" id="title" aria-describedby="title" placeholder="" v-model="title">
        </div>
        <span>{{ title }}</span>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" name="description" id="description" rows="3" v-model="description"></textarea>
        </div>
        <button type="button" class="btn btn-success" :disabled='check' @click="createPost()">Create Post</button>
    </form>
    </div>
</template>

<script>
export default {
    data(){
        return{
            title: '',
            description: ''
        }
    },
    computed:{
        check(){
            if(this.title.length > 0 && this.description.length > 0){
                return false;
            }
            else{
                return true
            }
        }
    },
    methods: {
        createPost(){
            let data= {
                title: this.title,
                description: this.description
            }
            axios.post('/post/store', data)
            .then( res => {
                if(res.data.message == 'success'){
                    window.location = 'post/myposts'
                }
                else{
                    console.log('some error');
                }
            })
            .catch( err=> {
                console.log(err);
            })
        }
    }
}
</script>