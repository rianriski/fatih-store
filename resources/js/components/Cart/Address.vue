<template>
  <div>
    <h4 class="mb-4" style="margin-top: 100px;">Your Address</h4>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <a
          class="nav-link text-dark active"
          id="home-tab"
          data-toggle="tab"
          href="#registeredAddress"
          role="tab"
          aria-controls="home"
          aria-selected="true"
        >Registered Address</a>
      </li>
      <li class="nav-item" role="presentation">
        <a
          class="nav-link text-dark"
          id="profile-tab"
          data-toggle="tab"
          href="#inputAddress"
          role="tab"
          aria-controls="profile"
          aria-selected="false"
        >Input Address</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div
        class="tab-pane fade show active"
        id="registeredAddress"
        role="tabpanel"
        aria-labelledby="home-tab"
      >
        <a href class="text-dark" style="text-decoration: none;">
          <div class="card w-100 mt-3">
            <div class="card-body">
              <h5 class="card-title">Kantor</h5>
              <hr />
              <h6 class="card-subtitle mb-2 text-muted">Rian Riski Pratama</h6>
              <p class="card-text">Jalan Merdeka 78, Jombang, Jawa Timur</p>
            </div>
          </div>
        </a>
        <a href class="text-dark" style="text-decoration: none;">
          <div class="card w-100 mt-3">
            <div class="card-body">
              <h5 class="card-title">Kantor</h5>
              <hr />
              <h6 class="card-subtitle mb-2 text-muted">Rian Riski Pratama</h6>
              <p class="card-text">Jalan Merdeka 78, Jombang, Jawa Timur</p>
            </div>
          </div>
        </a>
        <a href class="text-dark" style="text-decoration: none;">
          <div class="card w-100 mt-3">
            <div class="card-body">
              <h5 class="card-title">Kantor</h5>
              <hr />
              <h6 class="card-subtitle mb-2 text-muted">Rian Riski Pratama</h6>
              <p class="card-text">Jalan Merdeka 78, Jombang, Jawa Timur</p>
            </div>
          </div>
        </a>
      </div>
      <div class="tab-pane fade" id="inputAddress" role="tabpanel" aria-labelledby="profile-tab">
        <form action>
          <div class="form-group mt-3">
            <label for="receiver">Receiver</label>
            <input
              type="text"
              name="receiver"
              class="form-control"
              id="receiver"
              placeholder="Full Name"
            />
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <input
              type="text"
              class="form-control"
              id="address"
              name="address"
              placeholder="Alamat Lengkap"
            />
          </div>
          <div class="form-group">
            <label for="city">City</label>
            <select class="custom-select">
              <option selected>Select City</option>
              <option value="1">Bandung</option>
              <option value="2">Jakarta</option>
              <option value="3">Surabaya</option>
            </select>
          </div>
          <div class="form-group">
            <label for="phone">Phone</label>
            <input
              type="number"
              class="form-control"
              id="phone"
              name="phone"
              placeholder="0812 1234 1234"
            />
          </div>
          <div class="form-group">
            <label for="phone">Postal Code</label>
            <input
              type="number"
              class="form-control"
              id="postal_code"
              name="postal_code"
              placeholder="0812 1234 1234"
            />
          </div>
        </form>
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
</style>
