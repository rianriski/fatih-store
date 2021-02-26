<template>
  <div class="row">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" v-if="posts.length>0">
        <div class="carousel-item active">
          <img :src="'/storage/' + posts[0].thumbnail" class="d-block w-100 headline" alt="..." />
          <div class="carousel-caption d-none d-md-block rounded bg">
            <!-- <h5 class="text-dark"> -->
              <router-link :to="'/post/'+posts[0].id">{{posts[0].title}}</router-link>
            <!-- </h5> -->
            <p class="text-secondary" v-html="posts[0].post.substring(0,75)"></p>
          </div>
        </div>
        <div class="carousel-item">
          <img :src="'/storage/' + posts[0].thumbnail" class="d-block w-100 headline" alt="..." />
          <div class="carousel-caption d-none d-md-block bg rounded">
            <h5 class="text-dark">{{posts[1].title}}</h5>
            <p class="text-secondary" v-html="posts[1].post.substring(0,75)"></p>
          </div>
        </div>
        <div class="carousel-item">
          <img :src="'/storage/' + posts[0].thumbnail" class="d-block w-100 headline" alt="..." />
          <div class="carousel-caption d-none d-md-block bg rounded">
            <h5 class="text-dark">{{posts[2].title}}</h5>
            <p class="text-secondary" v-html="posts[2].post.substring(0,75)"></p>
          </div>
        </div>
      </div>
      <a
        class="carousel-control-prev"
        href="#carouselExampleCaptions"
        role="button"
        data-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a
        class="carousel-control-next"
        href="#carouselExampleCaptions"
        role="button"
        data-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
    posts: [],
    };
  },
  mounted() {
  axios
    .get("http://127.0.0.1:8000/API/posts/popular")
    .then(res => (this.posts = res.data.data.data))
    .catch((err) => console.log(err));
  },
};
</script>

<style scoped>
.headline {
  height: 350px;
  width: 100%;
  object-fit: cover;
  object-position: center;
  overflow: hidden;
}

.bg {
  background-color: lemonchiffon;
}
</style>
