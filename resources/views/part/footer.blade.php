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
  </script>