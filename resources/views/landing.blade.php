<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard Profil Perusahaan</title>
<style>
  body {
    font-family: Arial, sans-serif;
    justify-content: center;
    align-items: center;
    margin: 0;
    padding: 0;
    background: radial-gradient(circle, #2060a3, #2f8ab1);
  }

  .navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 50px;
    background-color: #261d66;
    color: #3f9bd9;
    font-size: 20px;
  }

  .navbar-left, .navbar-center, .navbar-right {
    display: flex;
    align-items: center;
  }

  .login-button {
    padding: 10px 20px;
    margin: 0 10px;
    cursor: pointer;
    border: none;
    border-radius: 50px;
    font-weight: 900;
    font-size: 20px;
    color: #261d66;
    transition: background-color 0.3s ease;
    background: linear-gradient(45deg, #66ded6, #54d1e9, #40c6f6, #3dc3fd);
  }

  .content {
    padding: 50px;
  }

  .content h1 {
    color: #333;
  }

/* Hapus atau atur ulang latar belakang untuk tombol */
  .beranda, .wa {
      background: none; /* Hapus latar belakang */
      border: none; /* Hapus garis batas */
      padding: 10px 20px; /* Tetapkan padding jika diperlukan */
      margin: 0 5px; /* Sesuaikan margin jika diperlukan */
      cursor: pointer;
      color: #c3f3f0;
      transition: color 0.3s ease; /* Tambahkan efek transisi jika diperlukan */
  }

  /* Tambahkan efek hover jika diperlukan */
  .beranda:hover, .wa:hover {
      color: #3f9bd9; /* Ubah warna teks saat hover */
      font-size: 30px;
  }

  .beranda, .wa{
    font-size: 20px;
  }

/* Tambahkan gaya untuk logo */
  .logo {
    width: 60px;
    height: auto;
  }

  .company-profile {
    display: flex;
    height: 70vh;
    align-items: flex-start;
    align-items: center;     /* Pusatkan konten horizontal */
  }

  .company-logo {
    width: 300px;
    height: auto;
    margin-right: 50px;
    align-self: center;
  }

  .company-info {
    flex: 1;
  }

  .company-details {
  display: flex;
  flex-direction: column;
}

  .company-profile p {
    color: #c3f3f0;
    font-size: 18px;
    line-height: 1.6;
    margin-bottom: 20px;
    font-weight: 600;
    
  }

  .company-profile h2 {
    color: #3f9bd9;
    font-size: 28px;
    margin-bottom: 20px;
  }

</style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
  <div class="navbar-left">
    <img src="{{ asset('img/madiun.png') }}" class="logo" >
  </div>
  <div class="navbar-center">
    <!-- Menengahkan tombol "Beranda" dan "WhatsApp" -->
    <button class="beranda" onclick="showLandingPage()">B e r a n d a</button>
    <button class="wa" onclick="directToWhatsApp()">W h a t s a p p</button>
  </div>
  <div class="navbar-right">
    <button class="login-button" onclick="goToLoginPage()">L O G I N</button>
  </div>
</nav>

<!-- Content -->
<div class="content">
  <div class="company-profile">
    <img src="{{ asset('img/madiun.png') }}" class="company-logo">
    <div class="company-info">
      <div class="company-details">
        <h2 style="color: #261d66; font-weight:900;">DPPKB PPPA KABUPATEN MADIUN</h2>
        <p id="typingEffect" style="font-size: 20px">
        </p>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="navbar">
  <div class="navbar-left">
    <p style="margin: 0; color:#c3f3f0">Kontak: 0351-464381</p>
  </div>
  <div class="navbar-center">
    <p style="margin: 0; color:#c3f3f0">Alamat: Jl. Raya Solo No.78, Jiwan, Madiun, Jawa Timur 63161</p>
  </div>
  <div class="navbar-right">
    <p style="margin: 0; color:#c3f3f0">Email: <a href="mailto:bkkbn_kabmadiun@yahoo.com">bkkbn_kabmadiun@yahoo.com</a></p>
  </div>
</footer>


<script>
  const text = `Kabupaten Madiun terdiri atas 15 kecamatan, yang terbagi dalam 206 terdiri dari 198 desa dan 8 kelurahan. Dalam percakapan sehari-hari penduduk kabupaten Madiun menggunakan Bahasa Jawa dengan Dialek Madiun. 
  Visi Bupati dan Wakil Bupati Kabupaten Madiun, adalah “Kabupaten Madiun Aman, Madiun, Sejahtera, dan Berakhlaq”. Dari Visi dan Misi yang telah disebutkan, Dinas Pengendalian Penduduk dan Keluarga Berencana, Pemberdayaan Perempuan dan Perlindungan Anak (DPPKB PPPA) mempunyai suatu peran yang cukup penting untuk dapat tercapainya visi, misi tersebut. DPPKB PPPA memiliki tugas untuk membantu Bupati dalam melaksanakan urusan pemerintahan yang menjadi kewajiban daerah di bidang kependudukan dan keluarga berencana dan urusan di bidang pemberdayaan perempuan dan perlindungan anak dan mempunyai tanggung jawab dalam mewujudkan visi dan misi Bupati khususnya misi ke empat, yaitu meningkatkan kesejahteraan yang berkeadilan dengan tujuannya untuk meningkatkan kualitas pembangunan manusia. Dengan sasaran yang ditetapkan adalah Penduduk tumbuh seimbang dan berkualitas.`;

let index = 0;

function typeEffect() {
  if (index < text.length) {
    document.getElementById("typingEffect").textContent += text.charAt(index);
    index++;
    setTimeout(typeEffect, 10); // Ubah angka 50 untuk kecepatan ketikan
  }
}

window.onload = function() {
  typeEffect();
};

  function directToWhatsApp() {
    window.location.href = 'https://wa.me/NOMOR_TELEPON';
  }

  function goToLoginPage() {
    window.location.href = '/login';
  }
  function showLandingPage() {
    document.getElementById('landingPage').style.display = 'block';
}

</script>

</body>
</html>
