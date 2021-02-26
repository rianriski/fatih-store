<template>
    <!-- footer -->
    <div class="mt-5 bg-warning p-3">
        <div class="container mt-5">
            <div class="row">
                <div class="col col-lg-4 col-md-4 col-sm-12">
                    <img
                        :src="'/images/logo_web.png'"
                        alt
                        class="img-fluid mr-5"
                        style="height: 40px;"
                    />
                    <p class="mt-4">
                        <fa-icon
                            :icon="['fa', 'location-arrow']"
                            size="1x"
                            class="text-dark mr-2 ml-1 mt-1"
                        />Merdeka Street 78, Candimulyo
                    </p>
                    <p class="address">
                        <i class="mr-4"></i>&nbsp;Jombang, Jawa Timur
                    </p>
                    <p class="address">
                        <fa-icon
                            :icon="['fa', 'phone']"
                            size="1x"
                            class="text-dark mr-2 ml-1 mt-2"
                        />0812 4677 3453
                    </p>
                    <p class="address">
                        <fa-icon
                            :icon="['fa', 'envelope']"
                            size="1x"
                            class="text-dark mr-2 ml-1 mt-2"
                        />riskirian@gmail.com
                    </p>
                </div>
                <div class="col col-lg-4 col-md-4 col-sm-12">
                    <h5 class="text-dark font-weight-bold">Payment</h5>
                    <hr />
                    <img
                        :src="'/images/footer/bca.png'"
                        alt
                        class="img-fluid icon-footer bg-light p-1 rounded mr-1"
                    />
                    <img
                        :src="'/images/footer/mandiri.png'"
                        alt
                        class="img-fluid icon-footer bg-light rounded p-1"
                    />

                    <h5 class="text-dark mt-3 font-weight-bold">Courier</h5>
                    <hr />
                    <img
                        :src="'/images/footer/jne.png'"
                        alt
                        class="img-fluid icon-footer bg-light p-1 rounded mr-1 mb-3"
                    />
                    <img
                        :src="'/images/footer/pos.png'"
                        alt
                        class="img-fluid icon-footer bg-light rounded mb-3 p-1"
                    />
                </div>
                <div class="col col-lg-4 col-md-4 col-sm-12">
                    <h5 class="text-dark font-weight-bold">Usefull Links</h5>
                    <hr />
                    <a href class="address d-block text-dark mt-1"
                        >Terms & Conditions</a
                    >
                    <a href class="d-block text-dark mt-1">Privacy Policy</a>
                    <a href class="address d-block mt-1 text-dark"
                        >Customer Service</a
                    >
                    <!-- <hr> -->
                    <div
                        class="social text-center rounded bg-light d-inline-block mt-4"
                    >
                        <a href="#" class>
                            <img
                                :src="'/images/social/facebook.png'"
                                alt
                                class="img-fluid icon-footer bg-light rounded mb-3 p-1"
                            />
                        </a>
                    </div>
                    <div
                        class="social text-center rounded bg-light d-inline-block"
                    >
                        <a href="#" class>
                            <img
                                :src="'/images/social/twitter.png'"
                                alt
                                class="img-fluid icon-footer bg-light rounded mb-3 p-1"
                            />
                        </a>
                    </div>
                    <div
                        class="social text-center rounded bg-light d-inline-block"
                    >
                        <a href="#" class>
                            <img
                                :src="'/images/social/instagram.png'"
                                alt
                                class="img-fluid icon-footer bg-light rounded mb-3 p-1"
                            />
                        </a>
                    </div>
                </div>
            </div>
            <br />
            <hr />
        </div>
        <div class="container">
            <footer class="text-center p-1">
                All Rights Reserved By
                <span>Hefa Store</span> Copyright 2020
            </footer>
        </div>
    </div>
    <!-- akhir footer -->
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
    }
};
</script>

<style scoped>
.address {
    margin-top: -13px;
}

.icon-footer {
    height: 30px;
}

.social {
    height: 30px;
    width: 30px;
}
</style>
