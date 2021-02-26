import Vue from "vue";

import Navbar from "./components/Navbar.vue";
import Footer from "./components/Footer.vue";

// Home
import Carousel from "./components/Home/Carousel.vue";
import WhyHoney from "./components/Home/WhyHoney.vue";
import BestProduct from "./components/Home/BestProduct.vue";
import BannerPromo from "./components/Home/BannerPromo.vue";
import NewArrival from "./components/Home/NewArrival.vue";
import LatestArticle from "./components/Home/LatestArticle.vue";

// Product
import ProductBreadcrumb from "./components/Product/Breadcrumb.vue";
import ProductCarousel from "./components/Product/Carousel.vue";
// import ProductContent from "./components/Product/Content.vue";
// import ProductFilter from "./components/Product/Filter.vue";
// import Product from "./components/Product/Product.vue";

// Detail
import DetailBreadcrumb from "./components/Detail/Breadcrumb.vue";
// import DetailThumbnail from "./components/Detail/Thumbnail.vue";
// import InfoProduct from "./components/Detail/InfoProduct.vue";
// import ProductDescription from "./components/Detail/Description.vue";
// import RelatedProduct from "./components/Detail/Related.vue";

// Blog
import BlogBreadcrumb from "./components/Blog/Breadcrumb.vue";
import BlogPopular from "./components/Blog/Popular.vue";
import BlogHeadline from "./components/Blog/Headline.vue";

// Post
import PostBreadcrumb from "./components/Post/Breadcrumb.vue";
// import PostArticle from "./components/Post/Article.vue";
import PostComments from "./components/Post/Comments.vue";
import PostLatest from "./components/Post/Latest.vue";
import PostPopular from "./components/Post/Popular.vue";

// About
import AboutBreadcrumb from "./components/About/Breadcrumb.vue";

// Cart
import CartBreadcrumb from "./components/Cart/Breadcrumb.vue";
import CartItem from "./components/Cart/Item.vue";
import CartAddress from "./components/Cart/Address.vue";
import CartCourier from "./components/Cart/Courier.vue";
import CartPayment from "./components/Cart/Payment.vue";
import CartCoupon from "./components/Cart/Coupon.vue";
import CartNote from "./components/Cart/Note.vue";

// Review
import ReviewBreadcrumb from "./components/Review/Breadcrumb.vue";
import ReviewBiaya from "./components/Review/Biaya.vue";
import ToCheckout from "./components/Review/ToCheckout.vue";

// Checkout
import CheckoutBreadcrumb from "./components/Checkout/Breadcrumb.vue";
import CheckoutContent from "./components/Checkout/Content.vue";

// Home
Vue.component("navbar-vue", Navbar);
Vue.component("carousel-vue", Carousel);
Vue.component("why-honey", WhyHoney);
Vue.component("best-product", BestProduct);
Vue.component("banner-promo", BannerPromo);
Vue.component("new-arrival", NewArrival);
Vue.component("latest-article", LatestArticle);
Vue.component("footer-vue", Footer);

// Product
Vue.component("product-breadcrumb", ProductBreadcrumb);
Vue.component("product-carousel", ProductCarousel);
// Vue.component("product-content", ProductContent);
// Vue.component("product-filter", ProductFilter);
// Vue.component("product-vue", Product);

// Detail
Vue.component("detail-breadcrumb", DetailBreadcrumb);
// Vue.component("detail-thumbnail", DetailThumbnail);
// Vue.component("info-product", InfoProduct);
// Vue.component("product-description", ProductDescription);
// Vue.component("related-product", RelatedProduct);

// Blog
Vue.component("blog-breadcrumb", BlogBreadcrumb);
Vue.component("blog-popular", BlogPopular);
Vue.component("blog-headline", BlogHeadline);

// Post
Vue.component("post-breadcrumb", PostBreadcrumb);
// Vue.component("post-article", PostArticle);
Vue.component("post-comments", PostComments);
Vue.component("post-latest", PostLatest);
Vue.component("post-popular", PostPopular);

// About
Vue.component("about-breadcrumb", AboutBreadcrumb);

// Cart
Vue.component("cart-breadcrumb", CartBreadcrumb);
Vue.component("cart-item", CartItem);
Vue.component("cart-address", CartAddress);
Vue.component("cart-courier", CartCourier);
Vue.component("cart-payment", CartPayment);
Vue.component("cart-coupon", CartCoupon);
Vue.component("cart-note", CartNote);

// Review
Vue.component("review-breadcrumb", ReviewBreadcrumb);
Vue.component("review-biaya", ReviewBiaya);
Vue.component("to-checkout", ToCheckout);

// Checkout
Vue.component("checkout-breadcrumb", CheckoutBreadcrumb);
Vue.component("checkout-content", CheckoutContent);
