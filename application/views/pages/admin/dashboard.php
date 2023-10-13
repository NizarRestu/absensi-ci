<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>
<body>
<div class="relative min-h-screen md:flex" data-dev-hint="container">
<?php $this->load->view('component/sidebar_admin') ?>
      <main id="content" class="max-h-screen overflow-y-auto flex-1 p-6 lg:px-8">
        <div class="container mx-auto">
          <div class="grid gap-6 mb-2 mt-2 md:grid-cols-2">
            <div class="py-2 bg-white shadow border border-gray-900">
              <p class="text-md text-center font-medium">
               TOTAL KARYAWAN
              </p>
              <div class="text-3xl text-center text-rose-700 font-semibold mb-2">
                <span class="fa-stack fa-xs">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa-solid fa-calendar-days fa-stack-1x fa-inverse"></i>
                </span>
                <?php echo $karyawan?> Orang
              </div>
            </div>

            <div class="py-2 bg-white shadow border border-gray-900">
              <p class="text-md text-center font-medium">
              TOTAL ABSEN
              </p>
              <div class="text-3xl text-center text-rose-700 font-semibold mb-2">
                <span class="fa-stack fa-xs">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa-solid fa-calendar-days fa-stack-1x fa-inverse"></i>
                </span>
                <?php echo $absen?> Kali
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>

</body>
</html>