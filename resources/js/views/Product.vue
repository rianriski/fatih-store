<template>
  <div>
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
                                <button @click="loadFromNavbarCategory(category.id)" class="btn btn-sm bg-transparent">{{category.category}}</button>
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
                            @click="loadFromNavbarSearch(search)"
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

    <product-breadcrumb></product-breadcrumb>
    <product-carousel></product-carousel>

    <!-- Awal Konten -->
    <div class="container mt-5">
      <div class="row">
        <div class="col col-lg-3 col-md-4 col-sm-4">
          <h5 style="margin-top: 14px;">Filter</h5>
          <hr />
          <p>
            <a
              class="btn btn-white btn-md btn-block text-left"
              data-toggle="collapse"
              href="#price"
              role="button"
              aria-expanded="false"
              aria-controls="collapseExample"
            >Price</a>
          </p>
          <div class="collapse" id="price">
            <div class="card card-body">
              <div class="row">
                <form>
                  <div class="col-auto">
                    <label class="sr-only" for="inlineFormInputGroupUsername2">Min price</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Rp</div>
                      </div>
                      <input
                        type="number"
                        class="form-control"
                        id="inlineFormInputGroupUsername2"
                        placeholder="Minimum price ..."
                        required
                        v-model="minPrice"
                      />
                    </div>
                  </div>
                  <div class="col-auto mt-2">
                    <label class="sr-only" for="inlineFormInputGroupUsername2">Max price</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Rp</div>
                      </div>
                      <input
                        type="number"
                        class="form-control"
                        id="inlineFormInputGroupUsername2"
                        placeholder="Maximum price ..."
                        required
                        v-model="maxPrice"
                      />
                    </div>
                  </div>
                  <hr />
                  <div class="col-auto">
                    <button @click="loadPrice(minPrice, maxPrice)" class="btn btn-warning mt-3 btn-block">Apply</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <hr />
          <p>
            <a
              class="btn btn-white btn-md btn-block text-left"
              data-toggle="collapse"
              href="#condition"
              role="button"
              aria-expanded="false"
              aria-controls="collapseExample"
            >Condition</a>
          </p>
          <div class="collapse" id="condition">
            <div class="card card-body">
              <button class="text-dark btn btn-sm bg-transparent text-left" @click="loadCondition('new')">New</button>
              <hr />
              <button class="text-dark btn btn-sm bg-transparent text-left" @click="loadCondition('second')">Second</button>
            </div>
          </div>
          <hr />
          <p>
            <a
              class="btn btn-white btn-md btn-block text-left"
              data-toggle="collapse"
              href="#rating"
              role="button"
              aria-expanded="false"
              aria-controls="collapseExample"
            >Rating</a>
          </p>
          <div class="collapse" id="rating">
            <div class="card card-body">
              <a href class="text-dark">Rating 5 - Excellent</a>
              <hr />
              <a href class="text-dark">Rating 4 - Good</a>
            </div>
          </div>
          <hr />
        </div>

        <!-- PRODUCT CONTENT -->
        <div class="col col-lg-9 col-md-8 col-sm-8">
          <div class="text-right">
            <p class="d-inline text-muted btn" style="cursor: auto;">Sort by</p>
            <div class="dropdown d-inline">
              <a
                class="btn btn-warning text-light dropdown-toggle"
                href="#"
                role="button"
                id="dropdownMenuLink"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >{{sort}}</a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <button class="dropdown-item bg-transparent text-dark" @click="loadCheapest">Cheapest</button>
                <button class="dropdown-item bg-transparent text-dark" @click="loadExpensive">Most Expensive</button>
                <button class="dropdown-item bg-transparent text-dark" @click="loadBestSeller">Best Seller</button>
              </div>
            </div>
          </div>
          <hr />

          <!-- PRODUCT LIST -->
          <div class="row container mt-4" v-if="products.length>0">
            <div class="card mx-auto mb-4" style="width: 15.5rem;" v-on:productByCategory="productCategory(category.id)" v-for="itemProduct in products" :key="itemProduct.id">
              <img
                  :src= "'/storage/' + itemProduct.photo.is_default"
                  alt
                  class="card-img-top card-photo"
              />
              <div class="card-body">
                <h5 class="card-title text-truncate">{{ itemProduct.name }}</h5>
                <p
                  class="card-text text-truncate"
                >{{ itemProduct.description }}</p>
                <hr />
                <div class="row mt-3">
                  <div class="col-lg-8 col-md-8 col-sm-12">
                    <router-link :to="'/detail/'+itemProduct.id+'/'+itemProduct.category_id" class="btn btn-outline-warning btn-block">Details</router-link>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <a href type="button" class="btn btn-warning text-white btn-block">
                      <fa-icon :icon="['fa', 'shopping-cart']" size="1x" class="text-dark" />
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Pagination Vue -->
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-start ml-2">
              <li class="page-item">
                <button class="page-link" @click="firstPage">
                  <fa-icon
                    :icon="['fa', 'angle-double-left']"
                    size="1x"
                    class="text-blue"
                    style=""
                  />
                </button>
              </li>
              <li class="page-item">
                <button class="page-link" @click="prevPage">Previous</button>
              </li>
              <li class="page-item disabled"><p class="page-link" >1</p></li>
              <li class="page-item">
                <button class="page-link" @click="nextPage">Next</button>
              </li>
              <li class="page-item">
                <button class="page-link" @click="lastPage">
                  <fa-icon
                    :icon="['fa', 'angle-double-right']"
                    size="1x"
                    class="text-blue"
                    style=""
                  />
                </button>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <!-- Akhir Konten -->

    <!-- Awal Footer -->
    <footer-vue></footer-vue>
    <!-- Akhir Footer -->
  </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
        products: [],
        minPrice: "",
        maxPrice: "",
        pagination: [],
        sort: "-- Select --",
        categories: [],
        search: ""
        };
    },
    mounted() {
      if (this.$route.params.category) {
        axios
          .get("http://127.0.0.1:8000/API/categories")
          .then(res => (this.categories = res.data.data))
          .catch((err) => console.log(err));

        // Load Product By Category
        this.loadFromParamCategory();
      } else if (this.$route.params.search) {
        axios
          .get("http://127.0.0.1:8000/API/categories")
          .then(res => (this.categories = res.data.data))
          .catch((err) => console.log(err));

        // Load Product By Search
        this.loadFromParamSearch();
      } else {
        axios
        .all([
          axios.get("http://127.0.0.1:8000/API/categories"),
          axios.get("http://127.0.0.1:8000/API/products")
          ])
        .then(axios.spread((first_response, second_response) => {
            this.categories = first_response.data.data
            this.products = second_response.data.data.data
            this.pagination = second_response.data.data
          }))
        .catch((err) => console.log(err));
      }
    },
    methods: {
      async loadCondition($condition) {
        console.log($condition)
        await axios
          .get("http://127.0.0.1:8000/API/products/condition", {
            params: {
              condition: $condition
            }
          })
          .then(res => {
            this.products = res.data.data.data
            this.pagination = res.data.data
          })
          .catch((err) => console.log(err));
      },
      async loadPrice($min, $max) {
        await axios
          .get("http://127.0.0.1:8000/API/products/price", {
            params: {
              min: $min,
              max: $max
            }
          })
          .then(res => {
            this.products = res.data.data.data
            this.pagination = res.data.data
          })
          .catch((err) => console.log(err));
      },
      async loadCheapest() {
        await axios
          .get("http://127.0.0.1:8000/API/products/cheapest")
          .then(res => {
            this.products = res.data.data.data
            this.pagination = res.data.data
            this.sort = "Cheapest"
          })
          .catch((err) => console.log(err));
      },
      async loadExpensive() {
        await axios
          .get("http://127.0.0.1:8000/API/products/expensive")
          .then(res => {
            this.products = res.data.data.data
            this.pagination = res.data.data
            this.sort = "Most Expensive"
          })
          .catch((err) => console.log(err));
      },
      async loadBestSeller() {
        await axios
          .get("http://127.0.0.1:8000/API/products/best")
          .then(res => {
            this.products = res.data.data.data
            this.pagination = res.data.data
            this.sort = "Best Seller"
          })
          .catch((err) => console.log(err));
      },
      async prevPage() {
        await axios
          .get(this.pagination.prev_page_url)
          .then(res => {
            this.products = res.data.data.data
            this.pagination = res.data.data
          })
          .catch((err) => console.log(err));
      },
      async nextPage() {
        await axios
          .get(this.pagination.next_page_url)
          .then(res => {
            this.products = res.data.data.data
            this.pagination = res.data.data
          })
          .catch((err) => console.log(err));
      },
      async firstPage() {
        await axios
          .get(this.pagination.first_page_url)
          .then(res => {
            this.products = res.data.data.data
            this.pagination = res.data.data
          })
          .catch((err) => console.log(err));
      },
      async lastPage() {
        await axios
          .get(this.pagination.last_page_url)
          .then(res => {
            this.products = res.data.data.data
            this.pagination = res.data.data
          })
          .catch((err) => console.log(err));
      },
      async loadFromNavbarCategory($categoryId) {
        await axios
          .get("http://127.0.0.1:8000/API/products/category", {
            params: {
              category_id: $categoryId
            }
          })
          .then(res => {
              this.products = res.data.data.data
              this.pagination = res.data.data
            })
          .catch((err) => console.log(err));
      },
      async loadFromNavbarSearch($search) {
        await axios
          .get("http://127.0.0.1:8000/API/products/search", {
            params: {
              search: $search
            }
          })
          .then(res => {
              this.products = res.data.data.data
              this.pagination = res.data.data
            })
          .catch((err) => console.log(err));
      },
      async loadFromParamCategory() {
        await axios
          .get("http://127.0.0.1:8000/API/products/category", {
            params: {
              category_id: this.$route.params.category
            }
          })
          .then(res => {
              this.products = res.data.data.data
              this.pagination = res.data.data
            })
          .catch((err) => console.log(err));
      },
      async loadFromParamSearch() {
        await axios
          .get("http://127.0.0.1:8000/API/products/search", {
            params: {
              search: this.$route.params.search
            }
          })
          .then(res => {
              this.products = res.data.data.data
              this.pagination = res.data.data
            })
          .catch((err) => console.log(err));
      },
    }
};
</script>

<style></style>
