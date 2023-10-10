<?php
$error= $this->session->flashdata('error_password');
$error_email= $this->session->flashdata('error_email');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
</head>
<body>
<div class="">
        <section class="h-screen flex flex-col md:flex-row justify-center space-y-10 md:space-y-0 md:space-x-16 items-center my-2 mx-5 md:mx-0 md:my-0">
            <div class="md:w-1/3 max-w-sm">
                <img src="https://tecdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" alt="Sample image">
            </div>
            <div class="md:w-1/3 max-w-sm">
                <div class="text-center md:text-left">
                    <label class="mr-1 text-2xl font-semibold">
                        Sistem Aplikasi Absensi
                    </label>
                    <br>
                    <label class="mr-1 text-xl font-semibold">
                        Registrasi Karyawan
                    </label>
                </div>
                <div class="my-5 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300"></div>
                <form action="<?php echo base_url('auth/aksi_register_karyawan') ?>" enctype="multipart/form-data"
                        method="post">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="firstName" class="sr-only">Nama Depan</label>
                            <div class="relative mb-6">
                                <input type="text" id="firstName" name="nama_depan" class="w-full rounded-lg border p-4 pr-12 text-sm shadow-sm" placeholder="Nama Depan" required>
                            </div>
                        </div>
                        <div>
                            <label for="lastName" class="sr-only">Nama Belakang</label>
                            <div class="relative mb-6">
                                <input type="text" id="lastName" name="nama_belakang" class="w-full rounded-lg border p-4 pr-12 text-sm shadow-sm" placeholder="Nama Belakang" required>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="username" class="sr-only">Username</label>
                        <div class="relative mb-6">
                            <input type="text" id="username" name="username" class="w-full rounded-lg border p-4 pr-12 text-sm shadow-sm" placeholder="Username" required>
                        </div>
                    </div>
                    <div>
                        <label class="sr-only">Email</label>
                        <div class="relative mb-6">
                            <input type="email" name="email" class="w-full rounded-lg border p-4 pr-12 text-sm shadow-sm" placeholder="Masukan email" required>
                        </div>
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <div class="relative">
                            <input type="password" name="password" class="w-full rounded-lg border p-4 pr-12 text-sm shadow-sm" placeholder="Masukan password" required>
                            <span class="absolute inset-y-0 right-0 grid place-content-center px-4 cursor-pointer">
                                <i class="fa-regular fa-eye-slash"></i>
                            </span>
                        </div>
                    </div>
                    <div class="text-center md:text-left">
                        <button class="mt-4 bg-rose-600 hover:bg-rose-700 px-4 py-2 text-white uppercase rounded text-xs tracking-wider" type="submit">Masuk</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
  document.addEventListener("DOMContentLoaded", function () {
    const passwordInput = document.querySelector('input[type="password"]');
    const togglePasswordButton = document.querySelector('.fa-eye-slash');

    togglePasswordButton.addEventListener('click', function () {
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        togglePasswordButton.className = 'fa-regular fa-eye';
      } else {
        passwordInput.type = 'password';
        togglePasswordButton.className = 'fa-regular fa-eye-slash';
      }
    });
  });
  var error = "<?php echo $error; ?>";
  var error_email = "<?php echo $error_email; ?>";
  if (error) {
            Swal.fire({
                icon: 'error',
                title: 'Kesalahan!!',
                text: "Password harus memiliki minimal 8 karakter!!",
                showConfirmButton: false,
                timer: 2000
            });
        }

    if(error_email){
        Swal.fire({
                icon: 'error',
                title: 'Kesalahan!!',
                text: "Email sudah digunakan tolong gunakan email yang lain",
                showConfirmButton: false,
                timer: 2000
            });
    }
</script>
  </body>
</html>