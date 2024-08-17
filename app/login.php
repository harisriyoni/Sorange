<?php
session_start();
if (isset($_SESSION['admin_username'])) {
    header("location:index.php");
    exit();
}
include("config.php");

$username = "";
$password = "";
$err = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == ''or$password == '') {
        $err .= "Silakan masukkan username dan password<br>";
    }

    if (empty($err)) {
        $sql1 = "SELECT * FROM admin WHERE username = '$username'";
        $q1 = mysqli_query($db, $sql1);
        $r1 = mysqli_fetch_array($q1);

        if (!$r1 || $r1['password'] != md5($password)) {
            $err .= "Anda Belum Daftar atau Password salah<br>";
        }
    }

    if (empty($err)) {
        $_SESSION['admin_username'] = $username;
        header("location:index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php
                if (!empty($err)) { ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: '<?php echo addslashes($err); ?>'
                });
            <?php } ?>
        });
    </script>
</head>

<body>
    <section class="bg-gray-50 dark:bg-gray-900">
        <divid="app" class="flexflex-colitems-centerjustify-centerpx-6 py-8 mx-automd:h-screenlg:py-0">
            <divclass="w-fullbg-whiterounded-lgshadowdark:bordermd:mt-0 sm:max-w-mdxl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <divclass="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1class="text-xlfont-boldleading-tighttracking-tighttext-gray-900 md:text-2xldark:text-white">
                        MasukDashboard
                    </h1>
                    <formclass="space-y-4 md:space-y-6" action="" method="POST">
                        <div>
                            <labelfor="username" class="blockmb-2 text-smfont-mediumtext-gray-900 dark:text-white">Username</label>
                            <inputtype="text" value="<?php echo htmlspecialchars($username); ?>" name="username" id="username" class="bg-gray-50 borderborder-gray-300 text-gray-900 rounded-lgfocus:ring-primary-600 focus:border-primary-600 blockw-fullp-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-whitedark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="username" required>
                        </div>
                        <div>
                            <labelfor="password" class="blockmb-2 text-smfont-mediumtext-gray-900 dark:text-white">Password</label>
                            <inputtype="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 borderborder-gray-300 text-gray-900 rounded-lgfocus:ring-primary-600 focus:border-primary-600 blockw-fullp-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-whitedark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </div>
                        <buttontype="submit" name="login" value="LOGIN" class="w-fulltext-whitebg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-nonefocus:ring-primary-300 font-mediumrounded-lgtext-smpx-5 py-2.5 text-centerdark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Masuk</button>
                        <pclass="text-smfont-lighttext-gray-500 dark:text-gray-400">
                            Kamubelumpunyaakun? <ahref="registrasi.php" class="font-mediumtext-primary-600 hover:underlinedark:text-primary-500">Daftardisini</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
