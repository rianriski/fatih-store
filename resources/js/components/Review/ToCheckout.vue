<template>
    <div>
        <h5 class="mt-3">Payment Method (Transfer)</h5>
        <hr />
        <img
            :src="'./images/footer/bca.png'"
            alt
            class="img-fluid icon-footer mr-4 d-inline"
        />
        <h6 class="d-inline">Bank Central Asia</h6>
        <h5 style="margin-top: 60px;">Shipping To</h5>
        <hr />
        <h6>Mr. Rian Riski Pratama</h6>
        <p class="mt-3">Jalan Merdeka No 78, Candimulyo</p>
        <p style="margin-top: -10px;">Jombang, Jawa Timur (61413)</p>
        <p style="margin-top: -10px;">0812 4677 3453</p>
        <hr class="mt-5" />
        <div class="row mt-4">
            <div class="container">
                <router-link
                    :to="{ name: 'checkout' }"
                    class="btn btn-warning text-white"
                    style="width: 100%; font-weight: 600;"
                    >Checkout</router-link
                >
            </div>
        </div>
    </div>
</template>

<script>
export default {
    components: {}
};
</script>

<style scoped>
.icon-footer {
    height: 30px;
}
</style>
