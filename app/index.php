<?php
include("config.php");
$isLoggedIn = isset($_SESSION['PHPSESSID']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SORANGE</title>
  <meta name="author" content="">
  <meta name="description" content="">

  <!-- Tailwind -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

    .font-family-karla {
      font-family: karla;
    }
  </style>

  <!-- AlpineJS -->
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <!-- Font Awesome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</head>

<body class="bg-white font-family-karla">

  <!-- Top Bar Nav -->
  <nav class="w-full py-4 bg-blue-800 shadow">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between">

    <nav>
    <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
        <?php if (!$isLoggedIn): ?>
            <!-- Jika belum login, tampilkan menu Daftar dan Masuk -->
            <li><a class="hover:text-gray-200 hover:underline px-4" href="">Mau Post Berita Kamu? Daftar Sekarang Gratis!</a></li>
            <li><a class="hover:text-gray-200 hover:underline px-4" href="login.php">Masuk</a></li>
            <li><a class="hover:text-gray-200 hover:underline px-4" href="registrasi.php">Registrasi</a></li>
        <?php else: ?>
            <!-- Jika sudah login, sembunyikan Daftar dan Masuk, tampilkan Logout -->
            <li><a class="hover:text-gray-200 hover:underline px-4" href="logout.php">Logout</a></li>
        <?php endif; ?>
    </ul>
</nav>

      <div class="flex items-center text-lg no-underline text-white pr-6">
        <a class="" href="#">
          <i class="fab fa-facebook"></i>
        </a>
        <a class="pl-6" href="#">
          <i class="fab fa-instagram"></i>
        </a>
        <a class="pl-6" href="#">
          <i class="fab fa-twitter"></i>
        </a>
        <a class="pl-6" href="#">
          <i class="fab fa-linkedin"></i>
        </a>
      </div>
    </div>

  </nav>

  <!-- Text Header -->
  <header class="w-full container mx-auto">
    <div class="flex flex-col items-center py-12">
      <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
        SELAMAT DATANG SORANGE
      </a>
      <p class="text-lg text-gray-600">
        Dimana Kamu bisa Melihat Berita Update Terkini!
      <p class="text-lg text-gray-600">
        Kamu bisa Post Berita Kamu di Website Kami, Segera Bergabung!
      </p>
      </p>
    </div>
  </header>

  <!-- Topic Nav -->
  <nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
    <div class="block sm:hidden">
      <a
        href="#"
        class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
        @click="open = !open">
        Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
      </a>
    </div>
    <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
      <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
        <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Technology</a>
        <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Automotive</a>
        <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Finance</a>
        <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Politics</a>
        <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Culture</a>
        <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Sports</a>
      </div>
    </div>
  </nav>


  <div class="container mx-auto flex flex-wrap py-6">

    <!-- Post Section -->
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">

      <article class="flex flex-col shadow my-4">
        <?php
        $query = mysqli_query($db, "SELECT * FROM kategori_berita");
        foreach ($query as $row) :
        ?>
          <!-- Article Image -->
          <a href="#" class="hover:opacity-75">
            <img src="<?php echo $row['gambar']; ?>" height="50" width="950">
          </a>
          <div class="bg-white flex flex-col justify-start p-6">
            <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4"><?php echo $row['kategori']; ?></a>
            <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4"><?php echo $row['judul_berita']; ?></a>
            <p href="#" class="text-sm pb-8">
              By <a href="#" class="font-semibold hover:text-gray-800">Admin</a> 2024
            </p>
            <h1 class="text-2xl font-bold pb-3"><?php echo $row['judul_berita']; ?></h1>
            <p class="pb-3"><?php echo $row['isi_berita']; ?></p>
          </div>
        <?php endforeach; ?>
      </article>

    </section>

    <!-- Sidebar Section -->
    <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

      <div class="w-full bg-white shadow flex flex-col my-4 p-6">
        <p class="text-xl font-semibold pb-5">Tentang Kami</p>
        <p class="pb-2">Selamat datang di Perusahaan Sorange, portal berita terdepan yang menyediakan informasi terbaru dan terpercaya. Kami berkomitmen untuk memberikan berita terkini dengan akurasi tinggi dan kecepatan penyampaian yang optimal.
        <p>
          Di Perusahaan Sorange, kami percaya bahwa informasi yang tepat waktu dan akurat adalah kunci untuk memahami dunia di sekitar kita. Kami menghadirkan berbagai topik berita, mulai dari berita lokal hingga internasional, dengan pendekatan jurnalistik yang profesional dan objektif.
        </p>
        <p>
          Selain itu, kami juga membuka kesempatan bagi Anda untuk menjadi bagian dari komunitas kami dengan memposting berita terbaru. <br> Kami menyambut setiap kontribusi dari pembaca kami yang ingin berbagi informasi penting dan relevan dengan masyarakat.
        </p>
        <p>
          Bergabunglah dengan kami di Perusahaan Sorange, dan jadilah bagian dari revolusi informasi yang memberikan dampak positif bagi masyarakat. <br> Kami berkomitmen untuk terus berkembang dan beradaptasi dengan kebutuhan berita terkini untuk memenuhi harapan Anda.
        </p>
        Terima kasih telah mengunjungi kami, dan selamat membaca!</p>
        <a href="registrasi.php" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
          Bergabung Bersama Kami!
        </a>
      </div>
      <div class="w-full bg-white shadow flex flex-col my-4 p-6">
        <p class="text-xl font-semibold pb-5">Instagram</p>
        <div class="grid grid-cols-3 gap-3">
          <div class="s-testimonials__slide swiper-slide">
            <div class="s-testimonials__author">
              <img src="hege.jpg" height="100" width="1000" alt="Author image" class="s-testimonials__avatar">
              <cite class="s-testimonials__cite">
                <span>Author Website:</span>
                <strong><a href="" target="_blank" rel="noopener noreferrer">Haris Riyoni</a></strong>
              </cite>
            </div>
          </div>
        </div>
        <a href="https://www.linkedin.com/in/harisriyoni/" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
          <i class="fab fa-linkedin mr-2"></i> Connect With Me
        </a>
      </div>
    </aside>

  </div>

  <footer class="w-full border-t bg-white pb-12">
    <div class="w-full container mx-auto flex flex-col items-center">
      <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
        <a href="#" class="uppercase px-3">About Us</a>
        <a href="#" class="uppercase px-3">Privacy Policy</a>
        <a href="#" class="uppercase px-3">Terms & Conditions</a>
        <a href="#" class="uppercase px-3">Contact Us</a>
      </div>
      <div class="uppercase pb-6">&copy; https://sorange-dff1a8f11055.herokuapp.com</div>
    </div>
  </footer>

  <script>
    function getCarouselData() {
      return {
        currentIndex: 0,
        images: [
          'https://source.unsplash.com/collection/1346951/800x800?sig=1',
          'https://source.unsplash.com/collection/1346951/800x800?sig=2',
          'https://source.unsplash.com/collection/1346951/800x800?sig=3',
          'https://source.unsplash.com/collection/1346951/800x800?sig=4',
          'https://source.unsplash.com/collection/1346951/800x800?sig=5',
          'https://source.unsplash.com/collection/1346951/800x800?sig=6',
          'https://source.unsplash.com/collection/1346951/800x800?sig=7',
          'https://source.unsplash.com/collection/1346951/800x800?sig=8',
          'https://source.unsplash.com/collection/1346951/800x800?sig=9',
        ],
        increment() {
          this.currentIndex = this.currentIndex === this.images.length - 6 ? 0 : this.currentIndex + 1;
        },
        decrement() {
          this.currentIndex = this.currentIndex === this.images.length - 6 ? 0 : this.currentIndex - 1;
        },
      }
    }
  </script>

</body>

</html>