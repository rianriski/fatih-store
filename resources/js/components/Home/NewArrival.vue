<template>
    <!-- New Arrival -->
    <div class="container">
        <div class="text-center mt-4">
            <br />
            <h1 class="text-warning bebas">New Arrival</h1>
            <img :src="'/images/underline.jpg'" alt class="underline" />
        </div>
        <div class="row mt-3 text-center">
            <div class="card-deck w-100" v-if="products.length>0">
                <div class="card" v-for="itemProducts in products" :key="itemProducts.id">
                    <img
                        :src= "'/storage/' + itemProducts.photo.is_default"
                        alt
                        class="card-img-top img-fluid"
                    />
                    <div class="card-body">
                        <h5 class="card-title lora">{{itemProducts.name}}</h5>
                        <p class="card-text text-truncate roboto">
                            {{ itemProducts.description }}
                        </p>
                    </div>
                    <div class="card-footer bg-white">
                        <div class="row">
                            <div class="col-lg-5 col-md-12 col-sm-12">
                                <router-link
                                    :to="'/detail/'+itemProducts.id+'/'+itemProducts.category_id "
                                    class="btn btn-outline-warning mr-auto btn-block mt-1 mb-1"
                                >
                                    Details
                                </router-link>
                            </div>
                            <div class="col-lg-7 col-md-12 col-sm-12">
                                <router-link
                                    :to="{ name: 'cart' }"
                                    class="btn btn-warning text-light ml-auto btn-block mt-1 mb-1"
                                >
                                    Add to cart&nbsp;&nbsp;&nbsp;
                                    <fa-icon
                                        :icon="['fa', 'shopping-cart']"
                                        size="1x"
                                        class="text-light"
                                        style="margin-right:-10px;"
                                    />
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir New Arrival -->
</template>

<script>
import axios from "axios";

export default {
    mounted() {
        console.log("Component mounted.");
    },
    data() {
        return {
        products: [],
        };
    },
    mounted() {
    axios
        .get("http://127.0.0.1:8000/API/products")
        .then(res => (this.products = res.data.data.data))
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
