<template>
  <div>
    <h4 class="mb-4">Your Items</h4>
    <div class="row mb-4">
      <div class="col-2">
        <img :src="'./images/product/product.jpg'" alt class="cart-pict rounded" />
      </div>
      <div class="col-4">
        <h5 class="m-0">Mini Skirt</h5>
        <p class="m-0 text-muted">IDR 120.000</p>
      </div>
      <div class="col-4">
        <button type="button" class="btn btn-sm btn-light border pr-2">
          <fa-icon :icon="['fa', 'minus']" size="1x" style="color: lightgray;" />
        </button>
        <span class="mx-2">20</span>
        <button type="button" class="btn btn-sm btn-warning pr-2">
          <fa-icon :icon="['fa', 'plus']" size="1x" class="text-light" />
        </button>
      </div>
      <div class="col-2">
        <button type="button" class="btn btn-sm btn-danger pr-2">
          <fa-icon :icon="['fa', 'trash']" size="1x" class="text-light" />
        </button>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-2">
        <img :src="'./images/product/product.jpg'" alt class="cart-pict rounded" />
      </div>
      <div class="col-4">
        <h5 class="m-0">Black Panth</h5>
        <p class="m-0 text-muted">IDR 209.000</p>
      </div>
      <div class="col-4">
        <button type="button" class="btn btn-sm btn-light border pr-2">
          <fa-icon :icon="['fa', 'minus']" size="1x" style="color: lightgray;" />
        </button>
        <span class="mx-2">20</span>
        <button type="button" class="btn btn-sm btn-warning pr-2">
          <fa-icon :icon="['fa', 'plus']" size="1x" class="text-light" />
        </button>
      </div>
      <div class="col-2">
        <button type="button" class="btn btn-sm btn-danger pr-2">
          <fa-icon :icon="['fa', 'trash']" size="1x" class="text-light" />
        </button>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-2">
        <img :src="'./images/product/product.jpg'" alt class="cart-pict rounded" />
      </div>
      <div class="col-4">
        <h5 class="m-0">White Slim</h5>
        <p class="m-0 text-muted">IDR 310.000</p>
      </div>
      <div class="col-4">
        <button type="button" class="btn btn-sm btn-light border pr-2">
          <fa-icon :icon="['fa', 'minus']" size="1x" style="color: lightgray;" />
        </button>
        <span class="mx-2">20</span>
        <button type="button" class="btn btn-sm btn-warning pr-2">
          <fa-icon :icon="['fa', 'plus']" size="1x" class="text-light" />
        </button>
      </div>
      <div class="col-2">
        <button type="button" class="btn btn-sm btn-danger pr-2">
          <fa-icon :icon="['fa', 'trash']" size="1x" class="text-light" />
        </button>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-2">
        <img :src="'./images/product/product.jpg'" alt class="cart-pict rounded" />
      </div>
      <div class="col-4">
        <h5 class="m-0">Ultra White</h5>
        <p class="m-0 text-muted">IDR 330.000</p>
      </div>
      <div class="col-4">
        <button type="button" class="btn btn-sm btn-light border pr-2">
          <fa-icon :icon="['fa', 'minus']" size="1x" style="color: lightgray;" />
        </button>
        <span class="mx-2">20</span>
        <button type="button" class="btn btn-sm btn-warning pr-2">
          <fa-icon :icon="['fa', 'plus']" size="1x" class="text-light" />
        </button>
      </div>
      <div class="col-2">
        <button type="button" class="btn btn-sm btn-danger pr-2">
          <fa-icon :icon="['fa', 'trash']" size="1x" class="text-light" />
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  components: {},
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
