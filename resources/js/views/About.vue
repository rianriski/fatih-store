<template>
  <div>
    <navbar-vue></navbar-vue>
    <about-breadcrumb></about-breadcrumb>

    <div class="container">
      <h2 class="text-center lora"><span class="text-success roboto font-weight-bold">Fatih Store</span> adalah toko online Indonesia yang memiliki misi meningkatkan taraf hidup masyarakat melalui program reseller dan dropshipper.</h2>
      <div class="card-group mt-4 bg-transparent">
        <div class="card">
          <div class="text-center mt-5 icon">
            <img src="/images/icons/bookmark-heart.svg" width="75" height="75" title="Product">
          </div>
          <div class="card-body">
            <h2 class="card-title text-success text-center roboto">1.000+</h2>
            <h5 class="card-title text-center text-secondary">Good Product</h5>
          </div>
        </div>
        <div class="card">
          <div class="text-center mt-5 icon">
            <img src="/images/icons/person-badge.svg" width="75" height="75" title="Reseller">
          </div>
          <div class="card-body">
            <h2 class="card-title text-success text-center roboto">50+</h2>
            <h5 class="card-title text-center text-secondary">Reseller</h5>
          </div>
        </div>
        <div class="card">
          <div class="text-center mt-5 icon">
            <img src="/images/icons/people.svg" width="75" height="75" title="Dropshipper">
          </div>
          <div class="card-body">
            <h2 class="card-title text-success text-center roboto">350+</h2>
            <h5 class="card-title text-center text-secondary">Dropshipper</h5>
          </div>
        </div>
        <div class="card">
          <div class="text-center mt-5 icon">
            <img src="/images/icons/clipboard-check.svg" width="75" height="75" title="Transaction">
          </div>
          <div class="card-body">
            <h2 class="card-title text-success text-center roboto">1M+</h2>
            <h5 class="card-title text-center text-secondary">Success Transactions</h5>
          </div>
        </div>
      </div>

      <h2 class="text-success mt-5 lora">Mengapa Kami</h2>
      <img :src="'/images/underline.jpg'" alt class="underline" />
      <h5 class="mt-2">1. Berpengalaman lebih dari 5 tahun dalam transaksi online</h5>
      <h5>2. Produk yang kamu sediakan sangat berkualitas</h5>
      <h5>3. Customer service siap membantu dalam 24 jam</h5>
      <h5>4. Sistem mudah dipelajari bagi pemula</h5>
      <h5>5. Kompain/ retur produk semudah membalikkan telapak tangan</h5>

      <h2 class="text-success mt-5 lora text-right">Apa Kata Mereka</h2>
      <div class="text-right">
        <img :src="'/images/underline.jpg'" alt class="underline" />
      </div>
      <div class="card-group mt-2">
        <div class="card">
          <img src="/images/admin.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Rian Riski Pratama</h5>
            <p class="card-text">Saya beberapa kali ambil barang dari sini. Kualitasnya sangat baik. Pelanggan saya selalu suka dengan produk saya. Terima kasih Fatih Store.</p>
          </div>
        </div>
        <div class="card">
          <img src="/images/admin.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Damian Banuareta</h5>
            <p class="card-text">Pernah sekali salah pesan produk. Aku coba kontak CS. Cepet banget responnya. Sumpah ga nyesel jadi keluarga besar Fatih Store</p>
          </div>
        </div>
        <div class="card">
          <img src="/images/admin.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Veronica Hasibuan</h5>
            <p class="card-text">Aku coba jual barang Fatih Store di marketplace dan laku banget. Banyak yang nyari. Harganya juga bersaing banget. Seneng aku jadinya. Makasih ya.</p>
          </div>
        </div>
        <div class="card">
          <img src="/images/admin.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Veronica Hasibuan</h5>
            <p class="card-text">Aku coba jual barang Fatih Store di marketplace dan laku banget. Banyak yang nyari. Harganya juga bersaing banget. Seneng aku jadinya. Makasih ya.</p>
          </div>
        </div>
        <div class="card">
          <img src="/images/admin.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Veronica Hasibuan</h5>
            <p class="card-text">Aku coba jual barang Fatih Store di marketplace dan laku banget. Banyak yang nyari. Harganya juga bersaing banget. Seneng aku jadinya. Makasih ya.</p>
          </div>
        </div>
      </div>

      <!-- FAQ -->
      <h2 class="text-success mt-5 lora">Frequently Asked Questions</h2>
      <img :src="'/images/underline.jpg'" alt class="underline" />
        <dl v-for="(item, index) in list" :key="'item'+index">
          <fa-icon
              :icon="['fa', 'arrow-down']"
              size="1x"
              class="text-secondary mt-4 iconFAQ"
          />
          <dt v-on:click="item.open = !item.open" class="list">{{item.title}}</dt>
          <dd class="text-secondary content" v-if="item.open">{{item.content}}</dd>
        </dl>

    </div>

    <footer-vue></footer-vue>
  </div>
</template>

<script>

export default {
  data() {
    return {
      list: [
        {
          title: "Apa perbedaan reseller dan dropshipper",
          open:false,
          content: "Reseller stok produk sedangkan dropshipper tidak dan reseller mendapatkan potongan harga yang lebih besar daripada dropshipper."
        },
        {
          title: "Berapa budget yang dibutuhkan untuk menjadi reseller",
          open:false,
          content: "Untuk reseller kami menyiapkan paket usaha senilai Rp. 2.000.000 sampai dengan Rp. 5.000.000. Silahkan memilih sesuai dengan kemampuan Anda."
        },
        {
          title: "Apakah Fatih Store mengurus packing dan pengiriman untuk produk yang dipesan dropshipper",
          open:false,
          content: "Iya. Packing dan pengiriman produk yang dipesan akan diurus oleh tim dari Fatih Store."
        },
        {
          title: "Bagaimana cara retur barang yang rusak/ cacat",
          open:false,
          content: "Silahkan login. Kemudian pilih menu retur. Isi data-data yang diperlukan. Admin akan segera menghubungi Anda."
        },
      ]
    }
  }
};
</script>

<style scoped>
.bebas {
  font-family: "Bebas Neue", cursive;
}

.lora {
  font-family: "Lora", serif;
}

.roboto {
  font-family: "Roboto", sans-serif;
}

.underline {
    height: 3px;
    width: 200px;
    margin-top: -15px;
}

.list:hover {
  color: white;
  background-color: #5cb85c;
}

.list {
  position: relative;
  color: #555;
  border-top: 1px solid #dedede;
  border-right: 1px solid #dedede;
  border-left: 1px solid #dedede;
  cursor: pointer;
  border-radius: 4px;
  padding: 10px;
}

.content {
  color: #555;
  border-bottom: 1px solid #dedede;
  border-right: 1px solid #dedede;
  border-left: 1px solid #dedede;
  cursor: pointer;
  border-radius: 4px;
  padding: 10px;
}

.iconFAQ {
  position: absolute;
  right: 130px;
  transition: transform .5s ease-in-out;
}

.iconFAQ.open {
  transform: rotateZ(90deg);
}
</style>
