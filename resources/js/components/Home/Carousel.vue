<template>
    <section class="hero-section">
        <carousel
            class="hero-items"
            :items="1"
            :nav="false"
            :autoplay="true"
            :dots="false"
        >
            <div
                class="single-hero-items set-bg"
                style="background-image: url('/images/slider/slider1.jpg')"
            >
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1 class="text-light">Black friday</h1>
                            <p class="text-light">
                                Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore
                            </p>
                            <a
                                href="#"
                                class="primary-btn btn btn-warning p-2 pl-4 pr-4"
                                >Shop Now</a
                            >
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="single-hero-items set-bg"
                style="background-image: url('/images/slider/slider3.jpg')"
            >
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1 class="text-light">Black friday</h1>
                            <p class="text-light">
                                Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore
                            </p>
                            <a
                                href="#"
                                class="primary-btn btn btn-warning p-2 pl-4 pr-4"
                                >Shop Now</a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </carousel>
    </section>
</template>

<script>
import carousel from "vue-owl-carousel";

export default {
    components: {
        carousel
    }
};
</script>

<style scoped>
.hero-items .single-hero-items {
    height: 650px;
    padding-top: 210px;
}

.hero-items .single-hero-items span {
    color: #e7ab3c;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    line-height: 28px;
    display: inline-block;
    position: relative;
    top: 50px;
    opacity: 0;
}

.hero-items .single-hero-items h1 {
    color: #252525;
    font-size: 72px;
    font-weight: 700;
    margin-bottom: 6px;
    position: relative;
    top: 50px;
    opacity: 0;
}

.hero-items .single-hero-items p {
    margin-bottom: 42px;
    position: relative;
    top: 100px;
    opacity: 0;
}

.hero-items .single-hero-items .primary-btn {
    position: relative;
    top: 100px;
    opacity: 0;
}

.hero-items .off-card {
    height: 154px;
    width: 154px;
    padding-top: 40px;
    border-radius: 50%;
    text-align: center;
    line-height: 140px;
    position: absolute;
    left: 47%;
    top: 160px;
    background: #e7ab3c;
    z-index: 1;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
    opacity: 0;
}

.hero-items .off-card:after {
    position: absolute;
    left: 5px;
    top: 5px;
    width: calc(100% - 10px);
    height: calc(100% - 10px);
    border: 2px dashed #ffffff;
    content: "";
    border-radius: 50%;
    z-index: -1;
}

.hero-items .off-card h2 {
    font-size: 32px;
    font-weight: 700;
    color: #ffffff;
    text-transform: uppercase;
}

.hero-items .off-card h2 span {
    display: block;
    font-size: 32px;
    font-weight: 700;
    color: #ffffff;
    text-transform: uppercase;
    margin-top: 6px;
}

.hero-items .owl-item.active .single-hero-items span,
.hero-items .owl-item.active .single-hero-items h1,
.hero-items .owl-item.active .single-hero-items p,
.hero-items .owl-item.active .single-hero-items .primary-btn {
    top: 0;
    opacity: 1;
}

.hero-items .owl-item.active .single-hero-items span {
    -webkit-transition: all 0.2s ease 0.2s;
    -o-transition: all 0.2s ease 0.2s;
    transition: all 0.2s ease 0.2s;
}

.hero-items .owl-item.active .single-hero-items h1 {
    -webkit-transition: all 0.4s ease 0.4s;
    -o-transition: all 0.4s ease 0.4s;
    transition: all 0.4s ease 0.4s;
}

.hero-items .owl-item.active .single-hero-items p {
    -webkit-transition: all 0.6s ease 0.6s;
    -o-transition: all 0.6s ease 0.6s;
    transition: all 0.6s ease 0.6s;
}

.hero-items .owl-item.active .single-hero-items .primary-btn {
    -webkit-transition: all 0.8s ease 0.8s;
    -o-transition: all 0.8s ease 0.8s;
    transition: all 0.8s ease 0.8s;
}

.hero-items .owl-item.active .single-hero-items .off-card {
    opacity: 1;
    -webkit-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    transform: rotate(0deg);
    -webkit-transition: all 1s ease 1s;
    -o-transition: all 1s ease 1s;
    transition: all 1s ease 1s;
}

.hero-items .owl-nav button[type="button"] {
    font-size: 30px;
    position: absolute;
    left: 40px;
    top: 45%;
    color: #252525;
}

.hero-items .owl-nav button[type="button"]:hover {
    color: #dfad51;
}

.hero-items .owl-nav button[type="button"].owl-next {
    left: auto;
    right: 40px;
}

.set-bg {
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
}
</style>
