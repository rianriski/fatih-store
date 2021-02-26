<template>
  <div>
    <navbar-vue></navbar-vue>
    <post-breadcrumb></post-breadcrumb>

    <!-- awal article -->
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12">
          <h3 class="mb-3 font-weight-bold">
            {{postDetail.title}}
          </h3>
          <p class="blockquote-footer">
            Admin in <cite title="Source Title">{{postDetail.created_at.substring(0,10)}}</cite>
          </p>
          <hr />
          <img
              :src="picture"
              alt=""
              class="img-fluid rounded"
          />
          <p v-html="postDetail.post">

          </p>
                  
          <hr />
          <post-comments></post-comments>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 border-left">
          <post-popular v-on:changePostDetail="updatePost($event)"></post-popular>
          <post-latest v-on:changePostDetail="updatePost($event)"></post-latest>
        </div>
      </div>
    </div>
    <!-- akhir article -->

    <footer-vue></footer-vue>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      postDetail: [],
      picture: "",
      preUrl: ""
    };
  },
  mounted() {
    console.log(this.$route.params.id);
    axios
      .get("http://127.0.0.1:8000/API/posts/byid", {
        params: {
          id: this.$route.params.id
        }
      })
      .then(res => this.setDataPost(res.data.data))
      .catch((err) => console.log(err));
  },
  methods: {
    setDataPost(data) {
      this.postDetail = data;
      this.preUrl = '/storage/'
      this.picture = this.preUrl+data.thumbnail;
    },
    async updatePost($id) {
      await axios
        .get("http://127.0.0.1:8000/API/posts/byid", {
          params: {
            id: $id
          }
        })
        .then(res => this.setDataPost(res.data.data))
        .catch((err) => console.log(err));
    },
  }
};
</script>

<style scoped>
.blog-photo {
  height: 150px;
  object-fit: cover;
  object-position: center;
}

.headline {
  height: 350px;
  object-fit: cover;
  object-position: center;
}

.bg {
  background-color: lemonchiffon;
}
</style>
