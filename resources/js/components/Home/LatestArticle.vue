<template>
  <div class="container">
    <div class="text-center mt-4">
      <br />
      <h1 class="text-warning bebas">Latest Article</h1>
      <img :src="'./images/underline.jpg'" alt="" class="underline" />
    </div>
    <div class="row text-center">
      <div class="card-deck w-100 mt-3" v-if="posts.length>0">
        <div class="card mb-3" style="max-width: 540px; min-width:400px" v-for="post in posts" :key="post.id">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img
                  :src= "'/storage/' + post.thumbnail"
                  class="card-img"
                  alt="..."
              />
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <router-link :to="'/post/'+post.id"
                  ><h5 class="card-title">{{post.title}}</h5></router-link
                >
                <p v-html="post.post.substring(0,175)+'...'" class="card-text roboto text-left">
                    
                </p>
                <p class="card-text">
                  <small class="text-muted"
                    >Written in "{{post.category.category}}"</small
                  >
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  mounted() {
    console.log("Component mounted.");
  },
  data() {
    return {
    posts: [],
    };
  },
  mounted() {
  axios
    .get("http://127.0.0.1:8000/API/posts/latest")
    .then(res => (this.posts = res.data.data.data))
    .catch((err) => console.log(err));
  },
};
</script>

<style scoped>
.underline {
  height: 3px;
  width: 200px;
  margin-top: -15px;
}

.bebas {
  font-family: "Bebas Neue", cursive;
}

.lora {
  font-family: "Lora", serif;
}

.roboto {
  font-family: "Roboto", sans-serif;
}
</style>
