<?php
session_start();
include("config.php");

// Cek apakah user sudah login
if (!isset($_SESSION['admin_username'])) {
    header("location:login.php");
    exit();
}

// Ambil pesan dari URL jika ada
$message = isset($_GET['message']) ? urldecode($_GET['message']) : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publish Berita</title>
    <meta name="author" content="">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }

        .bg-sidebar {
            background: #3d68ff;
        }

        .cta-btn {
            color: #3d68ff;
        }

        .upgrade-btn {
            background: #1947ee;
        }

        .upgrade-btn:hover {
            background: #0038fd;
        }

        .active-nav-link {
            background: #1947ee;
        }

        .nav-item:hover {
            background: #1947ee;
        }

        .account-link:hover {
            background: #3d68ff;
        }
    </style>
</head>

<body class="bg-gray-100 font-family-karla flex">
    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="dashboard.php" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
            <a href="index.php" class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-home mr-3"></i> Lihat Berita Kamu Di Home Public
            </a>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="dashboard.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="form.php" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                <i class="fas fa-align-left mr-3"></i>
                Form
            </a>
            <a href="calendar.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-calendar mr-3"></i>
                Calendar
            </a>
        </nav>
    </aside>

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                <a href="index.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="form.php" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                    <i class="fas fa-align-left mr-3"></i>
                    Form
                </a>
                <a href="calendar.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-calendar mr-3"></i>
                    Calendar
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-cogs mr-3"></i>
                    Support
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-user mr-3"></i>
                    My Account
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Sign Out
                </a>
            </nav>
            <a href="index.php" class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> Home Public Sorange
            </a>
        </header>

        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="w-full text-3xl text-black pb-6">Buat Berita</h1>

                <div class="flex flex-wrap">
                    <div class="w-full flex justify-center my-6">
                        <div class="w-full max-w-lg">
                            <p class="text-xl pb-6 flex items-center justify-center">
                                <i class="fas fa-list mr-3"></i> Isikan Semua Field dibawah ini:
                            </p>
                            <div class="leading-loose">
                            <?php
                            if (!empty($message)) {
                                echo "<div style='margin-bottom: 15px;'>$message</div>";
                            }
                            ?>
                            <form action="create.php" method="POST" enctype="multipart/form-data" class="p-10 bg-white rounded shadow-xl">
                                <div class="mb-2">
                                    <label class="block text-sm text-gray-600" for="kategori">Kategori</label>
                                    <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="kategori" name="kategori" required>
                                        <option value="">Pilih Kategori</option>
                                        <option value="politik">Politik</option>
                                        <option value="olahraga">Olahraga</option>
                                        <option value="teknologi">Teknologi</option>
                                        <option value="hiburan">Hiburan</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label class="block text-sm text-gray-600" for="judul_berita">Judul Berita</label>
                                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="judul_berita" name="judul_berita" type="text" required placeholder="Masukkan judul berita" aria-label="Judul Berita">
                                </div>
                                <div class="mb-2">
                                    <label class="block text-sm text-gray-600" for="isi_berita">Isi Berita</label>
                                    <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="isi_berita" name="isi_berita" rows="6" required placeholder="Tulis isi berita di sini..." aria-label="Isi Berita"></textarea>
                                </div>
                                <div class="mb-2">
                                    <label class="block text-sm text-gray-600" for="gambar">Gambar</label>
                                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="gambar" name="gambar" type="file" accept="image/*" required aria-label="Gambar">
                                </div>
                                <div class="mt-6 flex justify-center">
                                    <button name="submit" class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Publish Berita</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>


                </div>
            </main>

            <footer class="w-full bg-white text-right p-4">
                Built by <a target="_blank" href="https://davidgrzyb.com" class="underline">David Grzyb</a>.
            </footer>
        </div>

    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>

</html>