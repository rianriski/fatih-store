<template>
    <!-- awal navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-warning p-3">
        <div class="container">
            <router-link :to="{ name: 'home' }">
                <img
                    :src="'/images/logo_web.png'"
                    alt
                    class="img-fluid mr-5"
                    style="height: 30px;"
                />
            </router-link>
            <!-- button for responsive -->
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- end button responsive -->

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle text-dark"
                            href="#"
                            id="navbarDropdown"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            >Category</a
                        >
                        <div
                            class="dropdown-menu pre-scrollable"
                            aria-labelledby="navbarDropdown"
                        >
                            <div 
                                class="dropdown-item" 
                                href="#"
                                v-for="category in categories"
                                :key="category.id"
                                >
                                <button @click="loadProductByCategory(category.id)" class="btn btn-sm bg-transparent">{{category.category}}</button>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <router-link
                            :to="{ name: 'products' }"
                            class="nav-link text-dark"
                            >Products</router-link
                        >
                    </li>
                    <li class="nav-item">
                        <router-link
                            :to="{ name: 'blog' }"
                            class="nav-link text-dark"
                            >Blog</router-link
                        >
                    </li>
                    <li class="nav-item">
                        <router-link
                            :to="{ name: 'about' }"
                            class="nav-link text-dark"
                            >About Us</router-link
                        >
                    </li>
                </ul>
                <div class="dropdown mr-2 d-inline">
                    <router-link
                        :to="{ name: 'cart' }"
                        class="nav-link text-dark"
                    >
                        <fa-icon
                            :icon="['fa', 'shopping-cart']"
                            size="1x"
                            class="text-dark"
                            style="margin-right:-10px;"
                        />
                    </router-link>
                </div>
                <div class="mr-2 d-inline">
                    <a
                        class="btn"
                        type="button"
                        href="login"
                        id="dropdownMenuButton"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <fa-icon
                            :icon="['fa', 'user']"
                            size="1x"
                            class="text-dark"
                        />
                    </a>
                </div>
                <form class="form-inline my-2 my-lg-0">
                    <input
                        class="form-control"
                        type="search"
                        placeholder="Search ..."
                        aria-label="Search"
                        v-model="search"
                    />
                    <span class="input-group-prepend">
                        <button
                            class="btn btn-light my-2 my-sm-0 ml-1"
                            @click="loadProductBySearch(search)"
                        >
                            <fa-icon
                                :icon="['fa', 'search']"
                                size="1x"
                                class="text-muted"
                            />
                        </button>
                    </span>
                </form>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
        categories: [],
        search: ""
        };
    },
    mounted() {
        axios
            .get("http://127.0.0.1:8000/API/categories")
            .then(res => (this.categories = res.data.data))
            .catch((err) => console.log(err));
    },
    methods: {
        async loadProductByCategory($category) {
            this.$router.push({
                name: 'products',
                params: {category: $category}
            })
        },
        async loadProductBySearch($search) {
            console.log($search)
            this.$router.push({
                name: 'products',
                params: {search: $search}
            })
        },
    }    
};
</script>
