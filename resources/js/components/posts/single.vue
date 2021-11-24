<template>
    <div>
        
        <div class="card text-white bg-dark mb-3 mt-3">
            <div class="card-body">
                <h5 class="card-title">{{ post.title }}</h5>
                <h6 class="card-subtitle mt-2">{{author}}</h6>
                <p class="card-text">{{ post.description }}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['post','author']
}
</script>