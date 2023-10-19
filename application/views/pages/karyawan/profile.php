<?php
$error= $this->session->flashdata('message');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
</head>
<body>
<?php foreach($user as $users): ?>
    <div class="relative min-h-screen md:flex">
    <?php $this->load->view('component/sidebar') ?>
    <section class="max-h-screen overflow-y-auto w-11/12 rounded-md shadow-md flex-1 p-6 lg:px-8 container flex flex-col md:flex-row justify-center space-y-10 md:space-y-0 md:space-x-16 items-center my-2 mx-5 md:mx-0 md:my-0">
        <div class="md:w-1/3 max-w-sm flex-shrink-0">
            <label class="cursor-pointer" for="image" id="imageTrigger">
                <img src="<?php echo base_url('images/'.$users->image)?>" class="max-w-full h-auto">
            </label>
        </div>
        <div class="md:w-2/3">
        <form action="<?php echo base_url('karyawan/aksi_ubah_profile') ?>" enctype="multipart/form-data" method="post">
    <!-- Bagian untuk mengunggah gambar profil -->
    <div class="md:w-1/3 max-w-sm">
        <label class="cursor-pointer" for="image" id="imageTrigger">
        </label>
        <input class="hidden" type="file" id="image" name="image">
    </div>
    
    <!-- Bagian untuk mengedit informasi pengguna -->
    <div class="md:w-2/3">
        <div>
            <label class="sr-only">Email</label>
            <div class="relative mb-6">
                <input type="email" name="email" class="w-full rounded-lg border p-4 pr-12 text-sm shadow-sm" placeholder="Masukan email" value="<?php echo $users->email?>" disabled required>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="firstName" class="sr-only">Nama Depan</label>
                <div class="relative mb-6">
                    <input type="text" id="firstName" name="nama_depan" class="w-full rounded-lg border p-4 pr-12 text-sm shadow-sm" placeholder="Nama Depan" value="<?php echo $users->nama_depan?>" required>
                </div>
            </div>
            <div>
                <label for="lastName" class="sr-only">Nama Belakang</label>
                <div class="relative mb-6">
                    <input type="text" id="lastName" name= "nama_belakang" class="w-full rounded-lg border p-4 pr-12 text-sm shadow-sm" placeholder="Nama Belakang" value="<?php echo $users->nama_belakang?>" required>
                </div>
            </div>
        </div>
        <div>
            <label for="username" class="sr-only">Username</label>
            <div class="relative mb-6">
                <input type="text" id="username" name="username" class="w-full rounded-lg border p-4 pr-12 text-sm shadow-sm" placeholder="Username" value="<?php echo $users->username?>" required>
            </div>
        </div>
        <div>
            <label for="password" class="sr-only">Password Lama</label>
            <div class="relative mb-6">
                <input type="password" name="password_lama" class="w-full rounded-lg border p-4 pr-12 text-sm shadow-sm" placeholder="Password Lama">
                <span class="absolute inset-y-0 right-0 grid place-content-center px-4 cursor-pointer">
                    <i class="fa-regular fa-eye-slash"></i>
                </span>
            </div>
        </div>
        <div>
            <label for="password" class="sr-only">Password Baru</label>
            <div class="relative mb-6">
                <input type="password" id="pass_baru" name="password_baru" class="w-full rounded-lg border p-4 pr-12 text-sm shadow-sm" placeholder="Password Baru">
                <span id="password_baru" class="absolute inset-y-0 right-0 grid place-content-center px-4 cursor-pointer">
                    <i class="fa-regular fa-eye-slash"></i>
                </span>
            </div>
        </div>
        <div>
            <label for="password" class="sr-only">Konfirmasi Password</label>
            <div class="relative">
                <input type="password" id="conPass" name="con_pass" class="w-full rounded-lg border p-4 pr-12 text-sm shadow-sm" placeholder="Konfirmasi password">
                <span id="toggleConPass" class="absolute inset-y-0 right-0 grid place-content-center px-4 cursor-pointer">
                    <i class="fa-regular fa-eye-slash"></i>
                </span>
            </div>
        </div>
        <div class="text-center md:text-right">
            <button class="mt-4 bg-rose-600 hover:bg-rose-700 px-4 py-2 text-white uppercase rounded text-xs tracking-wider" type="submit">ubah</button>
            </div>
    </div>
</form>
<?php
            if($users->image == 'User.png') {
               echo ''; 
            } else {
                echo '<button onclick= "hapus()" class=" mt-4 bg-red-600 hover:bg-red-700 px-4 py-2 text-white uppercase rounded text-xs tracking-wider">hapus foto</button>
                ';
            }
            ?>
        </div>
    </section>
</div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function hapus() {
        Swal.fire({
       title: 'Apakah Mau Dihapus?',
         text: "foto ini tidak bisa dikembalikan lagi!",
     icon: 'warning',
     showCancelButton: true,
     confirmButtonColor: '#3085d6',
     cancelButtonColor: '#d33',
     cancelButtonText: 'Batal',
     confirmButtonText: 'Ya, hapus!'
      }).then((result) => {
    if (result.isConfirmed) {
         Swal.fire({
         position: 'center',
        icon: 'success',
         title: 'Foto Terhapus!!',
    showConfirmButton: false,
    timer: 1500
      })
      setTimeout(() => {
        window.location.href= "<?php echo base_url('karyawan/hapus_foto') ?>";
      }, 1800);
    }
    })
  }
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
  const conPassInput = document.getElementById('conPass');
    const toggleConPassButton = document.getElementById('toggleConPass');

    toggleConPassButton.addEventListener('click', function () {
        if (conPassInput.type === 'password') {
            conPassInput.type = 'text';
            toggleConPassButton.innerHTML = '<i class="fa-regular fa-eye"></i>';
        } else {
            conPassInput.type = 'password';
            toggleConPassButton.innerHTML = '<i class="fa-regular fa-eye-slash"></i>';
        }
    });
    const conPassInput2 = document.getElementById('pass_baru');
    const toggleConPassButton2 = document.getElementById('password_baru');

    toggleConPassButton2.addEventListener('click', function () {
        if (conPassInput2.type === 'password') {
            conPassInput2.type = 'text';
            toggleConPassButton2.innerHTML = '<i class="fa-regular fa-eye"></i>';
        } else {
            conPassInput2.type = 'password';
            toggleConPassButton2.innerHTML = '<i class="fa-regular fa-eye-slash"></i>';
        }
    });
    var error = "<?php echo $error; ?>";
  if (error) {
            Swal.fire({
                icon: 'error',
                title: 'Kesalahan!!',
                text: "Password baru dan konfirmasi password harus sama",
                showConfirmButton: false,
                timer: 2000
            });
        }
</script>
<?php endforeach?>
  </body>
</html>