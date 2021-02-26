<template>
  <div>
    <navbar-vue></navbar-vue>
    <detail-breadcrumb></detail-breadcrumb>
    <section class="mt-4">
      <div class="container">
        <div class="row">

          <!-- FOTO PRODUCT -->
          <div class="col-lg-5">
            <figure class="figure">
              <img id="default"
                :src="gambar_default"
                class="figure-img img-fluid rounded photo-product"
                alt="..."
              />
              <figcaption class="figure-caption fig-container d-flex justify-content-between rounded">
                <div
                  v-for="data in gambar"
                  :key="data"
                  @click="changeImage(data)"
                  :class="data == gambar_default ? 'active' : ''"
                  >
                  <img :src="preUrl+data" alt class="figcap rounded" />
                </div>
              </figcaption>
            </figure>
          </div>

          <!-- INFO PRODUK -->
          <div class="col-lg-6">
            <div>
              <h3 class="roboto">{{productDetail.name}}</h3>
              <p class="text-muted" v-if="productDetail.sold">
                Rating 4.9/ 5 (105) &nbsp;&nbsp;|&nbsp;&nbsp;
                <strong>{{productDetail.sold}}</strong>&nbsp;&nbsp;Pcs Sold
              </p>
              <p class="text-muted" v-if="!productDetail.sold">
                Rating 4.9/ 5 (105) &nbsp;&nbsp;|&nbsp;&nbsp;
                <strong>-</strong>&nbsp;&nbsp;Pcs Sold
              </p>
              <hr />
              <h3 class="roboto">{{productDetail.price | currency}}</h3>
              <h6 class="text-muted mt-3 mb-3">Quantity</h6>
              <button type="button" @click="reduceQuantity()" class="btn btn-sm btn-light border">
                <fa-icon
                  :icon="['fa', 'minus']"
                  size="1x"
                  style="color: lightgray;"
                />
              </button>
              <span class="mx-2">{{quantity}}</span>
              <button type="button" @click="addQuantity()" class="btn btn-sm btn-warning">
                <fa-icon :icon="['fa', 'plus']" size="1x" style="color: white;" />
              </button>
              <table class="table mt-4 table-sm">
                <tr>
                  <td>Stock</td>
                  <td>Weight</td>
                  <td>Condition</td>
                  <td>Expired</td>
                </tr>
                <tr>
                  <th>{{productDetail.stock}} Pcs</th>
                  <th>{{productDetail.weight}} Gr</th>
                  <th>{{productDetail.condition}}</th>
                  <th v-if="productDetail.expired">{{productDetail.expired}}</th>
                  <th v-else>-</th>
                </tr>
              </table>

              <hr />
              <div class="row">
                <div class="col col-lg-6 col-md-6 col-sm-12">
                  <h6 class="text-muted mt-3 mb-3">Shipping to</h6>
                  <div class="form-group">
                    <select class="form-control" id="exampleFormControlSelect1">
                      <option>Jombang</option>
                      <option>Surabaya</option>
                      <option>Madiun</option>
                      <option>Jakarta</option>
                      <option>Bandung</option>
                    </select>
                  </div>
                </div>
                <div class="col col-lg-6 col-md-6 col-sm-12">
                  <h6 class="text-muted mt-3 mb-3">Estimated Shipping Cost</h6>
                  <p class="mt-4 text-secondary">Rp. 28.000</p>
                </div>
              </div>
              <hr />
              <div class="row mt-4 mb-5">
                <div class="col col-lg-6 col-md-6 col-sm-12">
                  <a
                    href
                    type="button"
                    class="btn btn-light border text-black-50 btn-block"
                  >
                    <i class="fa fa-heart text-black-50 mt-2 mr-3"></i>Add To
                    Wishlist
                  </a>
                </div>
                <div class="col col-lg-6 col-md-6 col-sm-12">
                  <button 
                    class="btn btn-warning text-white btn-block" 
                    @click="saveShoppingCart(productDetail.id, productDetail.name, productDetail.price, productDetail.photo.is_default)">
                    <i class="fa fa-shopping-cart text-light mt-2 mr-3"></i>Add
                    To Cart
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- DESKRIPSI PRODUK -->
    <section class="product-desc pt-5 pl-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a
                  class="nav-link active text-body"
                  id="description-tab"
                  data-toggle="tab"
                  href="#description"
                  role="tab"
                  aria-controls="description"
                  aria-selected="true"
                >Product Description</a>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link text-body"
                  id="review-tab"
                  data-toggle="tab"
                  href="#review"
                  role="tab"
                  aria-controls="review"
                  aria-selected="false"
                >
                  Reviews (
                  <span>20</span>)
                </a>
              </li>
            </ul>
            <div class="tab-content p-3" id="myTabContent">
              <div
                class="tab-pane fade show active"
                id="description"
                role="tabpanel"
                aria-labelledby="description-tab"
              >
                <div v-html="productDetail.description"></div>
              </div>
              <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                <div class="row review">
                  <div class="col-2 col-sm-2 col-md-1">
                    <img :src="'/images/product/product.jpg'" alt class="rounded-circle rev-pict" />
                  </div>
                  <div class="col">
                    <h5 class="mt-2">Sandhika Galih</h5>
                    <p>Pakaiannya bagus. Kainnya lembut sekali di kulit</p>
                  </div>
                </div>
                <div class="row review">
                  <div class="col-2 col-sm-2 col-md-1">
                    <img :src="'/images/product/product.jpg'" alt class="rounded-circle rev-pict" />
                  </div>
                  <div class="col">
                    <h5>Angga Rizky</h5>
                    <p>Keren nih. Style modern sekali. Saya suka</p>
                  </div>
                </div>
                <div class="row review">
                  <div class="col-2 col-sm-2 col-md-1">
                    <img :src="'/images/product/product.jpg'" alt class="rounded-circle rev-pict" />
                  </div>
                  <div class="col">
                    <h5>Rian Riski Pratama</h5>
                    <p>Mantap nih. Produk bagus dengan harga terjangkau</p>
                  </div>
                </div>
                <div class="mt-3">
                  <a href class="text-warning">See All Reviews</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Related Products -->
    <div class="container related" >
      <div class="text-center mt-4">
        <br />
        <h1 class="text-warning bebas" v-if="related.length>0">Related Products</h1>
        <img :src="'/images/underline.jpg'" alt class="underline" v-if="related.length>0"/>
      </div>
      <div class="row mt-3 text-center" v-if="related.length>0">
        <div class="card-deck w-100" >
          <div class="card" v-for="product in related" :key="product.id">
            <img :src="'/storage/' + product.photo.is_default" alt class="card-img-top img-fluid" />
            <div class="card-body">
              <h5 class="card-title lora">{{product.name}}</h5>
              <p class="card-text text-truncate roboto" v-html="product.description">
                
              </p>
            </div>
            <div class="card-footer bg-white">
              <div class="row">
                <div class="col-lg-5 col-md-12 col-sm-12">
                  <button
                    type="button"
                    class="btn btn-outline-warning mr-auto btn-block mt-1 mb-1"
                    @click="loadFromRelated(product.id, product.category_id)"
                  >Details</button>
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12">
                  <button
                    type="button"
                    class="btn btn-warning text-light ml-auto btn-block mt-1 mb-1"
                  >
                    Add to cart&nbsp;&nbsp;&nbsp;
                    <fa-icon
                      :icon="['fa', 'shopping-cart']"
                      size="1x"
                      class="text-light"
                      style="margin-right:-10px;"
                    />
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Akhir Related Products -->

    <footer-vue></footer-vue>
  </div>
</template>

<script>
import axios from "axios";
import carousel from "vue-owl-carousel";

export default {
  components: {carousel},
  data() {
        return {
        productDetail: [],
        shoppingCart: [],
        gambar_default: "",
        gambar: [],
        preUrl: "",
        related: [],
        shoppingCart: [],
        quantity: 1
        };
  },
  methods: {
    changeImage(data) {
      this.preUrl = '/storage/'
      this.gambar_default = this.preUrl+data;
    },
    setDataProduct(data) {
      this.productDetail = data;
      this.preUrl = '/storage/'
      this.gambar_default = this.preUrl+data.photo.is_default;
      // data gambar aslinya object, ubah ke array dulu, ambil valuenya aja
      this.gambar = Object.values(data.photo);
    },
    async loadFromRelated($id, $category_id) {
      await axios
        .all([
        axios.get("http://127.0.0.1:8000/API/detail/", {
          params: {
            id: $id
          }
        }),
        axios.get("http://127.0.0.1:8000/API/products/similar", {
          params: {
            category_id: $category_id,
            id: $id,
          }
        })
      ])
      .then(axios.spread((first_response, second_response) => {
          this.setDataProduct(first_response.data.data)
          this.related = second_response.data.data.data
        }))
      .catch((err) => console.log(err));
    },
    addQuantity() {
      this.quantity += 1;
    },
    reduceQuantity() {
      if(this.quantity==1) {

      } else if (this.quantity > 1) {
        this.quantity -= 1;
      }
    },
    saveShoppingCart(idProduct, nameProduct, priceProduct, photoProduct) {
      var ProductStored = {
        id: idProduct,
        name: nameProduct,
        price: priceProduct,
        photo: photoProduct,
        quantity: this.quantity
      };

      // masukkan data ke array shopping
      this.shoppingCart.push(ProductStored);
      // ubah array ke json
      const parsed = JSON.stringify(this.shoppingCart);
      // simpan ke local storage
      localStorage.setItem("shoppingCart", parsed);
    }
  },
  mounted() {

    // cek apakah ada cart di localstorage
    if(localStorage.getItem('shoppingCart')) {
      try {
        this.shoppingCart = JSON.parse(localStorage.getItem('shoppingCart'));
      } catch (e) {
        localStorage.removeItem('shoppingCart')
      }
    }

    axios
      .all([
        axios.get("http://127.0.0.1:8000/API/detail/", {
          params: {
            id: this.$route.params.id
          }
        }),
        axios.get("http://127.0.0.1:8000/API/products/similar", {
          params: {
            category_id: this.$route.params.category_id,
            id: this.$route.params.id,
          }
        })
      ])
      .then(axios.spread((first_response, second_response) => {
          this.setDataProduct(first_response.data.data)
          this.related = second_response.data.data.data
        }))
      .catch((err) => console.log(err));
  },
  computed: {
    
  }
};
</script>

<style scoped>
.photo-product {
  width: 444px;
  height: 476px;
  object-fit: cover;
  object-position: top;
}

.fig-container {
  width: 370px;
  background-color: #ffedb8;
  padding: 10px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.13);
  margin: auto;
  transform: translateY(-50px);
}

.fig-container a:hover {
  text-decoration: none;
}

.figcap {
  width: 80px;
  height: 80px;
  object-fit: cover;
  cursor: pointer;
}

.product-desc {
  background-color: #ffedb8;
  height: 350px;
}

.product-desc .tab-content {
  background-color: white;
  border: 1px solid #ffedb8;
  border-top: 0;
  border-radius: 0 0 5px 5px;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
  height: 330px;
  overflow: auto;
}

.product-desc .tab-content p {
  font-weight: 200;
  color: grey;
  font-family: "Roboto", sans-serif;
  line-height: 28px;
  font-size: 16px;
}

.rev-pict {
  width: 60px;
  height: 60px;
  object-fit: cover;
  object-position: center;
}

.review h5 {
  font-size: 16px !important;
  margin-left: 10px;
  margin-bottom: 0;
  margin-top: 10px;
}

.review p {
  font-size: 14px !important;
  margin-left: 10px;
}

.all-rev {
  margin-top: 20px;
}

.underline {
  height: 3px;
  width: 200px;
  margin-top: -15px;
}

.related {
  margin-top: 100px;
  margin-bottom: 70px;
}
</style>
