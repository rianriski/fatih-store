<template>
    <div>
        <h5 class="mb-3">Comments</h5>
        <div class="row review mt-4">
            <div class="col-2 col-sm-2 col-md-1">
                <img
                    :src="'./images/product/product.jpg'"
                    alt=""
                    class="rounded-circle rev-pict mt-2"
                />
            </div>
            <div class="col">
                <h5 class="mt-2">Sandhika Galih</h5>
                <p>
                    Pakaiannya bagus. Kainnya lembut sekali di kulit Lorem
                    ipsum, dolor sit amet consectetur adipisicing elit. Amet,
                    iste perspiciatis ipsa corporis delectus ipsum?
                </p>
            </div>
        </div>
        <div class="row review mt-3">
            <div class="col-2 col-sm-2 col-md-1">
                <img
                    :src="'./images/product/product.jpg'"
                    alt=""
                    class="rounded-circle rev-pict mt-2"
                />
            </div>
            <div class="col">
                <h5 class="mt-2">Sandhika Galih</h5>
                <p>
                    Pakaiannya bagus. Kainnya lembut sekali di kulit Lorem ipsum
                    dolor sit amet consectetur adipisicing elit. Eaque debitis
                    blanditiis incidunt velit ducimus amet?
                </p>
            </div>
        </div>
        <div class="row review mt-3">
            <div class="col-2 col-sm-2 col-md-1">
                <img
                    :src="'./images/product/product.jpg'"
                    alt=""
                    class="rounded-circle rev-pict mt-2"
                />
            </div>
            <div class="col">
                <h5 class="mt-2">Sandhika Galih</h5>
                <p>
                    Pakaiannya bagus. Kainnya lembut sekali di kulit Lorem ipsum
                    dolor sit amet consectetur adipisicing elit. Similique velit
                    aperiam nulla voluptas ullam excepturi.
                </p>
            </div>
        </div>
        <div class="row review mt-3">
            <div class="col-2 col-sm-2 col-md-1">
                <img
                    :src="'./images/product/product.jpg'"
                    alt=""
                    class="rounded-circle rev-pict mt-2"
                />
            </div>
            <div class="col">
                <h5 class="mt-2">Sandhika Galih</h5>
                <p>
                    Pakaiannya bagus. Kainnya lembut sekali di kulit Lorem ipsum
                    dolor sit, amet consectetur adipisicing elit. Modi iusto
                    ipsa atque repellat. Facilis, aut.
                </p>
            </div>
        </div>
        <div class="row review mt-3">
            <div class="col-2 col-sm-2 col-md-1">
                <img
                    :src="'./images/product/product.jpg'"
                    alt=""
                    class="rounded-circle rev-pict mt-2"
                />
            </div>
            <div class="col">
                <h5 class="mt-2">Sandhika Galih</h5>
                <p>
                    Pakaiannya bagus. Kainnya lembut sekali di kulit Lorem ipsum
                    dolor sit, amet consectetur adipisicing elit. Blanditiis,
                    unde iusto! Perspiciatis laboriosam sapiente commodi!
                </p>
            </div>
        </div>
        <h5 class="mt-4 mb-3">Post Comment</h5>
        <form action="">
            <div class="form-group">
                <!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
                <textarea
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="3"
                ></textarea>
            </div>
            <button type="submit" class="btn btn-info">Send</button>
        </form>
    </div>
</template>

<script>
export default {};
</script>

<style scoped>
.rev-pict {
    width: 60px;
    height: 60px;
    object-fit: cover;
    object-position: center;
}
</style>
