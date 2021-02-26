// views
import AboutPage from "./views/About.vue";
import BlogPage from "./views/Blog.vue";
import CartPage from "./views/Cart.vue";
import CheckoutPage from "./views/Checkout.vue";
import DetailPage from "./views/Detail.vue";
import HomePage from "./views/Home.vue";
import Products from "./views/Product.vue";
import ReviewPage from "./views/Review.vue";
import PostPage from "./views/Post.vue";

export default {
    // mode: "history",

    routes: [
        {
            path: "/",
            name: "home",
            component: HomePage
        },
        {
            path: "/about",
            name: "about",
            component: AboutPage
        },
        {
            path: "/blog",
            name: "blog",
            component: BlogPage
        },
        {
            path: "/cart",
            name: "cart",
            component: CartPage
        },
        {
            path: "/checkout",
            name: "checkout",
            component: CheckoutPage
        },
        {
            path: "/detail/:id/:category_id",
            props: true,
            name: "detail",
            component: DetailPage
        },
        {
            path: "/products",
            props: true,
            name: "products",
            component: Products
        },
        {
            path: "/review",
            name: "review",
            component: ReviewPage
        },
        {
            path: "/post/:id",
            props: true,
            name: "post",
            component: PostPage
        }
    ]
};
