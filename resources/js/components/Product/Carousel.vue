<template>
  <section class="hero-section">
    <div class="container">
      <carousel class="hero-items" :items="1" :nav="false" :autoplay="true" :dots="false">
        <div
          class="single-hero-items set-bg rounded"
          style="background-image: url('/images/slider/slider1.jpg')"
        ></div>
        <div
          class="single-hero-items set-bg rounded"
          style="background-image: url('/images/slider/slider3.jpg')"
        ></div>
        <div
          class="single-hero-items set-bg rounded"
          style="background-image: url('/images/slider/slider2.jpg')"
        ></div>
      </carousel>
    </div>
  </section>
</template>

<script>
import carousel from "vue-owl-carousel";

export default {
  components: {
    carousel,
  },
};
</script>

<style scoped>
.hero-items .single-hero-items {
  height: 300px;
  object-fit: cover;
  object-position: center;
  padding-top: 210px;
}

.set-bg {
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
}
</style>
