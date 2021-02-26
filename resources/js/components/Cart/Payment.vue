<template>
  <div>
    <h5 style="margin-top: 60px;">Payment Method</h5>
    <hr />
    <div class="form-group">
      <div class="custom-control custom-radio mt-4">
        <input type="radio" id="customRadio3" name="customRadio2" class="custom-control-input" />
        <label class="custom-control-label" for="customRadio3">
          <img :src="'./images/footer/bca.png'" alt class="img-fluid icon-footer mr-4" />
          Bank Central Asia
        </label>
      </div>
      <div class="custom-control custom-radio mt-3">
        <input type="radio" id="customRadio4" name="customRadio2" class="custom-control-input" />
        <label class="custom-control-label" for="customRadio4">
          <img :src="'./images/footer/mandiri.png'" alt class="img-fluid icon-footer mr-2" />
          Bank Mandiri
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
