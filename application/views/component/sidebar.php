<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
#sidebar {
    --tw-translate-x: -100%;
    height:100vh;
}
#menu-close-icon {
    display: none;
}

#menu-open:checked ~ #sidebar {
    --tw-translate-x: 0;
}
#menu-open:checked ~ * #mobile-menu-button {
    background-color: rgba(31, 41, 55, var(--tw-bg-opacity));
}
#menu-open:checked ~ * #menu-open-icon {
    display: none;
}
#menu-open:checked ~ * #menu-close-icon {
    display: block;
}

@media (min-width: 768px) {
    #sidebar {
        --tw-translate-x: 0;
    }
}
@media (max-width: 767px) {
    #sidebar {
        order: 2; /* Mengubah urutan tampilan untuk mobile */
    }
    
    nav[data-dev-hint="second-main-navigation"] {
        order: 3; /* Mengubah urutan tampilan untuk mobile */
    }
    
    nav[data-dev-hint="second-main-navigation"] svg {
        display: inline-block; /* Menunjukkan ikon di tampilan mobile */
    }
}

.icoon {
    filter: invert(100%) sepia(100%) saturate(0%) hue-rotate(26deg) brightness(104%) contrast(101%);
}

.active {
    background: #06d853;
    color: #ffffff;
  }

    </style>
</head>
<body>
<input type="checkbox" id="menu-open" class="hidden" />

<header
  class="bg-gray-800 text-gray-100 flex justify-between md:hidden"
  data-dev-hint="mobile menu bar"
>
  <a href="/dash" class="block p-4 text-white font-bold no-underline">
    Sistem Aplikasi Absensi
  </a>

  <label for="menu-open" id="mobile-menu-button" class="flex items-center m-2 p-2 focus:outline-none hover:text-white hover:bg-rose-700 rounded-md">
    <svg
        id="menu-open-icon"
        class="h-6 w-6 transition duration-200 ease-in-out"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
            strokeLinecap="round"
            strokeLinejoin="round"
            strokeWidth="2"
            d="M4 6h16M4 12h16M4 18h16"
        />
    </svg>
    <svg
        id="menu-close-icon"
        class="h-6 w-6 transition duration-200 ease-in-out"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
        style="display: none;"
    >
        <path
            strokeLinecap="round"
            strokeLinejoin="round"
            strokeWidth="2"
            d="M6 18L18 6M6 6l12 12"
        />
    </svg>
</label>
</header>

<aside
  id="sidebar"
  class="max-h-screen bg-gray-800 text-gray-100 md:w-64 w-3/4 space-y-6 pt-6 px-0 absolute z-50 inset-y-0 left-0 transform md:relative md:translate-x-0 transition duration-700 ease-in-out md:justify-between md:flex md:flex-col overflow-y-auto"
  data-dev-hint="sidebar; px-0 for frameless; px-2 for visually inset the navigation"
>
  <div
    class="flex flex-col space-y-4"
    data-dev-hint="optional div for having an extra footer navigation"
  >
    <div class="text-white flex-1 items-center px-4">
      <div class="text-lg font-semibold">SISTEM APLIKASI ABSENSI</div>
    </div>
    <hr />
    <nav data-dev-hint="main navigation">
      <a
      href="<?php echo base_url('karyawan/dashboard')?>"
        class="flex items-center py-2 text-white px-4 transition duration-300 hover:bg-rose-700 no-underline gap-2"
        activeclass="active"
      >
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 icoon" viewBox="0 0 512 512"><path d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm320 96c0-26.9-16.5-49.9-40-59.3V88c0-13.3-10.7-24-24-24s-24 10.7-24 24V292.7c-23.5 9.5-40 32.5-40 59.3c0 35.3 28.7 64 64 64s64-28.7 64-64zM144 176a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm-16 80a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm288 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64zM400 144a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/></svg>
        <span class="font-semibold text-lg">Dashboard</span>
      </a>
      <a
      href="<?php echo base_url('karyawan/history')?>"
        class="flex items-center py-2 text-white px-4 transition duration-300 hover:bg-rose-700 no-underline gap-2"
        activeclass="active"
      >
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 icoon" viewBox="0 0 512 512">
        <path d="M75 75L41 41C25.9 25.9 0 36.6 0 57.9V168c0 13.3 10.7 24 24 24H134.1c21.4 0 32.1-25.9 17-41l-30.8-30.8C155 85.5 203 64 256 64c106 0 192 86 192 192s-86 192-192 192c-40.8 0-78.6-12.7-109.7-34.4c-14.5-10.1-34.4-6.6-44.6 7.9s-6.6 34.4 7.9 44.6C151.2 495 201.7 512 256 512c141.4 0 256-114.6 256-256S397.4 0 256 0C185.3 0 121.3 28.7 75 75zm181 53c-13.3 0-24 10.7-24 24V256c0 6.4 2.5 12.5 7 17l72 72c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-65-65V152c0-13.3-10.7-24-24-24z"/>
    </svg>
        <span class="font-semibold text-lg">History Absen</span>
      </a>
      <a
      href="<?php echo base_url('karyawan/absen')?>"
        class="flex items-center py-2 text-white px-4 transition duration-300 hover:bg-rose-700 no-underline gap-2"
        activeclass="active"
      >
      <svg  class="w-6 h-6 icoon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z"/></svg>
        <span class="font-semibold text-lg">Absen</span>
      </a>
      <a
      href="<?php echo base_url('karyawan/izin')?>"
        class="flex items-center py-2 text-white px-4 transition duration-300 hover:bg-rose-700 no-underline gap-2"
        activeclass="active"
      >
        <svg
          class="w-6 h-6 icoon"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 576 512"
        >
          <path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
        </svg>
        <span class="font-semibold text-lg">Izin</span>
      </a>
      <a
      href="<?php echo base_url('karyawan/profile')?>"
        class="flex items-center py-2 text-white px-4 transition duration-300 hover:bg-rose-700 no-underline gap-2"
        activeclass="active"
      >
      <svg class="w-6 h-6 icoon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
        <span class="font-semibold text-lg">Profile</span>
      </a>
      <div class="m-12 ml-14 mt-[40vh] text-2xl ">
          <span id="current-time"></span>
      </div>
    </nav>
  </div>

  <button
  onclick="logout()"
    class="flex items-center py-2 text-white px-4 transition duration-300 hover:bg-rose-700 no-underline gap-2 cursor-pointer"
    data-dev-hint="second-main-navigation or footer navigation"
>
    <svg
        class="w-6 h-6 icoon"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 512 512"
    >
        <path d="M160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96C43 32 0 75 0 128V384c0 53 43 96 96 96h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H96c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32h64zM504.5 273.4c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22v72H192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32H320v72c0 9.6 5.7 18.2 14.5 22s19 2 26-4.6l144-136z" />
    </svg>
    <span class="font-semibold text-lg">Log out</span>
</button>
</aside>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function toggleSidebar() {
        var menuOpen = document.getElementById("menu-open");
        var sidebar = document.getElementById("sidebar");
        var menuOpenIcon = document.getElementById("menu-open-icon");
        var menuCloseIcon = document.getElementById("menu-close-icon");

        if (menuOpen.checked) {
            sidebar.style.transform = "translateX(0)";
            menuOpenIcon.style.display = "none";
            menuCloseIcon.style.display = "block";
        } else {
            sidebar.style.transform = "translateX(-100%)";
            menuOpenIcon.style.display = "block";
            menuCloseIcon.style.display = "none";
        }
    }

    function logout() {
        Swal.fire({
     title: 'Apakah Mau Logout?',
     icon: 'warning',
     showCancelButton: true,
     confirmButtonColor: '#3085d6',
     cancelButtonColor: '#d33',
     cancelButtonText: 'Batal',
     confirmButtonText: 'Ya'
    }).then((result) => {
   if (result.isConfirmed) {
    Swal.fire({ 
    position: 'center',
    icon: 'success',
    title: 'Berhasil Logout',
    showConfirmButton: false,
    timer: 1500
  })
    setTimeout(() => {
        window.location.href= "<?php echo base_url('auth/logout') ?>" ;
    }, 1800);
  }
})
      }

    // Memanggil toggleSidebar() saat tombol hamburger diklik
    document.getElementById("mobile-menu-button").addEventListener("click", toggleSidebar);
     // Fungsi untuk mengupdate waktu setiap detik
     function updateClock() {
            var currentTime = new Date();
            var formattedTime = currentTime.toLocaleString();
            document.getElementById("current-time").innerHTML = formattedTime;
        }

        // Memanggil fungsi pertama kali
        updateClock();

        // Mengatur interval untuk memperbarui waktu setiap 1 detik (1000 ms)
        setInterval(updateClock, 1000);
</script>
</body>
</html>
