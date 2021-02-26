<template>
  <div v-if="posts.length>0">
    <h4 class="mb-4 mt-5 font-weight-bold">Latest Article</h4>
    <div v-for="post in posts" :key="post.index">
      <button @click="loadPost(post.id)" class="text-dark btn btn-block bg-transparent text-left customCSS">
        <p>{{post.title}}</p>
      </button>
      <hr />
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
    .get("http://127.0.0.1:8000/API/posts/latest")
    .then(res => (this.posts = res.data.data.data))
    .catch((err) => console.log(err));
  },
  methods: {
    loadPost($id) {
      this.$emit('changePostDetail', $id);
    },
  }
};
</script>

<style scoped>
.btn {
  border: none !important;
  margin-bottom: -25px;
  margin-top: -10px;
  box-shadow: none;
}
</style>
