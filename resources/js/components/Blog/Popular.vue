<template>
  <div class="row" v-if="posts.length>0">
    <div class="card mx-auto mb-4 border-0" style="width: 15.5rem;" v-for="post in posts" :key="post.index">
      <img :src="'/storage/' + post.thumbnail" class="card-img-top blog-photo" alt="post.title" />
      <div class="card-body">
        <router-link :to="'/post/'+post.id">
          <h5 class="card-title">{{post.title}}</h5>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      posts: [],
    }
  },
  mounted() {
  axios
    .get("http://127.0.0.1:8000/API/posts/first")
    .then(res => (this.posts = res.data.data.data))
    .catch((err) => console.log(err));
  },
};
</script>

<style scoped>
.blog-photo {
  height: 150px;
  object-fit: cover;
  object-position: center;
}
</style>
