<template>
  <div>
    <h5 class="mt-3">Courier</h5>
    <hr />
    <div class="form-group">
      <div class="custom-control custom-radio mt-4">
        <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" />
        <label class="custom-control-label" for="customRadio1">
          <img :src="'./images/footer/jne.png'" alt class="img-fluid icon-footer mr-3" />
          JNE Express
        </label>
      </div>
      <div class="custom-control custom-radio mt-3">
        <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" />
        <label class="custom-control-label" for="customRadio2">
          <img :src="'./images/footer/pos.png'" alt class="img-fluid icon-footer mr-4" />
          &nbsp;Pos Indonesia
        </label>
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
.icon-footer {
  height: 30px;
}
</style>
