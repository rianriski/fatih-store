<template>
  <div>
    <section class="checkout mt-4">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-6">
            <div class="text-center" style="margin-left: 60px;">
              <img :src="'./images/success-checkout.png'" alt class="mt-4 mb- text-center" />
            </div>
            <div class="container title">
              <div class="row">
                <div class="col text-center">
                  <h3 class="text-warning">Checkout Success</h3>
                  <p>You can check history of your order in your account manager</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="card">
              <div class="card-body">
                <div class="text-center">
                  <h5
                    class="bg-warning text-white p-2 pt-3 pb-3 rounded"
                  >Please make a payment to complete your order</h5>
                  <hr />
                  <h3 class="text-warning">Rp.22.520.500</h3>
                  <p class="text-secondary mt-3">Transfer to</p>
                  <img :src="'./images/footer/bca.png'" alt class="img-fluid" style="height: 50px;" />
                  <h5 class="mt-2 text-secondary">14 6206 7474</h5>
                  <h6 class="text-secondary">a/n Rian Riski Pratama</h6>
                </div>
              </div>
            </div>
            <hr />
            <div class>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <a
                    href
                    type="button"
                    class="btn btn-outline-warning"
                    style="width: 100%; font-weight: 600;"
                    data-toggle="modal"
                    data-target="#checkoutModal"
                  >Order Status</a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <a
                    href
                    type="button"
                    class="btn btn-warning text-white"
                    style="width: 100%; font-weight: 600;"
                    data-toggle="modal"
                    data-target="#checkoutModal"
                  >Confirm Payment</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  components: {},
};
</script>

<style scoped>
.checkout {
  margin-bottom: 100px;
}

.checkout h5 {
  font-size: 18px;
}

.checkout p {
  font-size: 14px;
  font-weight: 200;
}

.checkout-detail {
  background-color: #ffedb8;
  border: none;
}

.title {
  margin-top: 50px;
  margin-bottom: 50px;
}

.title h3 {
  font-family: "Lora";
  color: #a1cc37;
  font-weight: bold;
}

.title p {
  font-weight: 200;
  color: #44494c;
}
</style>
