<template>
  <div>
    <navbar-vue></navbar-vue>
    <cart-breadcrumb></cart-breadcrumb>
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-6 mb-4">
          <!-- AWAL CART ITEM -->
          <div v-if="shoppingCart.length>0">
            <h4 class="mb-4">Your Items</h4>
            <div class="row mb-4" v-for="product in shoppingCart" :key="product.index">
              <div class="col-2">
                <img :src="'/storage/' + product.photo" alt class="cart-pict rounded" />
              </div>
              <div class="col-4">
                <h5 class="m-0">{{product.name}}</h5>
                <p class="m-0 text-muted">{{product.price | currency }}</p>
              </div>
              <div class="col-4">
                <button type="button" @click="reduceQuantity(product.id)" class="btn btn-sm btn-light border pr-2">
                  <fa-icon :icon="['fa', 'minus']" size="1x" style="color: lightgray;" />
                </button>
                <span class="mx-2">{{product.quantity}}</span>
                <button type="button" @click="addQuantity(product.id)" class="btn btn-sm btn-warning pr-2">
                  <fa-icon :icon="['fa', 'plus']" size="1x" class="text-light" />
              </button>
              </div>
              <div class="col-2">
                <button type="button" @click="removeItem(shoppingCart.data)" class="btn btn-sm btn-danger pr-2">
                  <fa-icon :icon="['fa', 'trash']" size="1x" class="text-light" />
                </button>
              </div>
            </div>
          </div>
          <!-- AKHIR CART ITEM -->
          <cart-address></cart-address>
        </div>
        <div class="col-lg-5">
          <cart-courier></cart-courier>
          <cart-payment></cart-payment>
          <cart-coupon></cart-coupon>
          <cart-note></cart-note>
          <div class="row mt-4">
            <div class="container">
              <router-link
                :to="{ name: 'review' }"
                class="btn btn-warning text-white"
                style="width: 100%; font-weight: 600;"
                >Continue to Review My Order
              </router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer-vue></footer-vue>
  </div>
</template>

<script>
export default {
  data() {
    return {
      shoppingCart: []
    }
  },
  methods: {
    removeItem(data) {
    // delete item sesuai index
    this.shoppingCart.splice(data, 1);

    // perbarui shopping cart
    const parsed = JSON.stringify(this.shoppingCart);
    localStorage.setItem("shoppingCart", parsed);
    },
    addQuantity($id) {
      var productStored = JSON.parse(localStorage.getItem("shoppingCart"));
      for (var i = 0; i < productStored.length; i++) {
        if($id === productStored[i].id){  //cari id sesuai param
          productStored[i].quantity += 1;
          break;  //stop loop ketika data ditemukan
        }
      }
      localStorage.setItem("shoppingCart", JSON.stringify(productStored)); 

      // load ulang shoppingCart
      if (localStorage.getItem("shoppingCart")) {
        try {
          this.shoppingCart = JSON.parse(localStorage.getItem("shoppingCart"));
        } catch (e) {
          localStorage.removeItem("shoppingCart");
        }
      }
    },
    reduceQuantity($id) {
      var productStored = JSON.parse(localStorage.getItem("shoppingCart"));
      for (var i = 0; i < productStored.length; i++) {
        if($id === productStored[i].id){  //cari id sesuai param
          if ( productStored[i].quantity == 1) {

          } else {
            productStored[i].quantity -= 1;
          }
          break;  //stop loop ketika data ditemukan
        }
      }
      localStorage.setItem("shoppingCart", JSON.stringify(productStored)); 

      // load ulang shoppingCart
      if (localStorage.getItem("shoppingCart")) {
        try {
          this.shoppingCart = JSON.parse(localStorage.getItem("shoppingCart"));
        } catch (e) {
          localStorage.removeItem("shoppingCart");
        }
      }
    },
  },
  mounted() {
    if (localStorage.getItem("shoppingCart")) {
      try {
        this.shoppingCart = JSON.parse(localStorage.getItem("shoppingCart"));
      } catch (e) {
        localStorage.removeItem("shoppingCart");
      }
    }
  }
};
</script>

<style scoped>
.bread {
  margin-top: 90px;
  margin-left: -10px;
}

.cart-pict {
  width: 60px;
  height: 60px;
  object-fit: cover;
  object-position: center top;
}
</style>
