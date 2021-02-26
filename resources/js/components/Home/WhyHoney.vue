<template>
    <div class="container">
        <div class="text-center mt-4">
            <br />
            <h1 class="text-warning bebas">Why Honey ?</h1>
            <img :src="'/images/underline.jpg'" alt class="underline" />
        </div>
        <div class="row mt-5">
            <div class="col col-lg-4 col-md-6 col-sm-12">
                <img
                    :src="'/images/why_honey.jpg'"
                    alt
                    class="img-fluid img-thumbnail rounded"
                />
                <img
                    :src="'/images/underline.jpg'"
                    alt
                    class="underline mt-2"
                />
            </div>
            <div class="col col-lg-8 col-md-6 col-sm-12">
                <h4 class="lora text-warning">
                    Strengthening the Immune System
                </h4>
                <p class="roboto">
                    The Faculty of Medicine, at Cardiff University, England, has
                    conducted research on the benefits of honey. Through this
                    research it is known that honey is able to stimulate the
                    body to produce immune cells
                </p>
                <h4 class="lora text-warning">
                    High Antioxidant Content that Can Prevent Cancer
                </h4>
                <p class="roboto">
                    One of the ingredients that honey has the most is
                    antioxidants. It is widely understood that antioxidants play
                    a role in fighting free radicals in the body which are the
                    main cause of the emergence of many bad cells, including
                    cancer cells
                </p>
                <h4 class="lora text-warning">Keep Skin Look Healthier</h4>
                <p class="roboto">
                    Honey also has a myriad of benefits to maintain beauty. One
                    of them is to help the skin become more moist and able to
                    remove dead skin cells. Blackheads, black spots, and acne
                    scars can also be removed by using it
                </p>
                <router-link
                    :to="{ name: 'post' }"
                    class="btn btn-warning text-light mt-3"
                >
                    Learn More&nbsp;&nbsp;&nbsp;
                    <fa-icon
                        :icon="['fa', 'arrow-circle-right']"
                        size="1x"
                        class="text-light"
                    />
                </router-link>
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
