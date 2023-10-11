<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Karyawan</title>
</head>
<body>
<div class="relative min-h-screen md:flex" data-dev-hint="container">
<?php $this->load->view('component/sidebar') ?>
      <main id="content" class="max-h-screen overflow-y-auto flex-1 p-6 lg:px-8">
        <div class="container mx-auto">
          <div class="grid gap-6 mb-2 mt-2 md:grid-cols-2">
            <div class="py-2 bg-white shadow border border-gray-900">
              <p class="text-md text-center font-medium">
               TOTAL MASUK KERJA
              </p>
              <div class="text-3xl text-center text-rose-700 font-semibold mb-2">
                <span class="fa-stack fa-xs">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa-solid fa-calendar-days fa-stack-1x fa-inverse"></i>
                </span>
                11 Hari
              </div>
            </div>

            <div class="py-2 bg-white shadow border border-gray-900">
              <p class="text-md text-center font-medium">
              TOTAL IZIN
              </p>
              <div class="text-3xl text-center text-rose-700 font-semibold mb-2">
                <span class="fa-stack fa-xs">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa-solid fa-calendar-days fa-stack-1x fa-inverse"></i>
                </span>
                2 Hari
              </div>
            </div>

            <!-- <div class="py-2 bg-white shadow border border-gray-900">
              <p class="text-md text-center font-medium">
               Total Tanpa Keterangan
              </p>
              <div class="text-3xl text-center text-rose-700 font-semibold mb-2">
                <span class="fa-stack fa-xs">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa-solid fa-calendar-days fa-stack-1x fa-inverse"></i>
                </span>
                2 Hari
              </div>
            </div> -->
          </div>

          <div class="text-center py-2.5 rounded-t-lg mt-4 bg-rose-700 text-white text-xl">
           HISTORY ABSEN
          </div>
          <div class="my-4 overflow-x-auto w-full px-4 bg-white rounded-b-lg shadow">
            <table class="w-full divide-y divide-gray-300 text-center">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-6 py-2 text-xs text-gray-500">NO</th>
                  <th class="px-6 py-2 text-xs text-gray-500">
                   KEGIATAN
                  </th>
                  <th class="px-6 py-2 text-xs text-gray-500">
                   TANGGAL
                  </th>
                  <th class="px-6 py-2 text-xs text-gray-500">
                   JAM MASUK
                  </th>
                  <th class="px-6 py-2 text-xs text-gray-500">
                   JAM PULANG
                  </th>
                  <th class="px-6 py-2 text-xs text-gray-500">
                   KETERANGAN IZIN
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-300">
              <?php $no = 0;foreach ($absen as $row): $no++?>
                  <tr class="whitespace-nowrap">
                    <td class="px-3 py-4 text-sm text-gray-500"><?php echo $no?></td>
                    <td class="px-3 py-4">
                      <div class="text-sm text-gray-900">
                      <?php echo $row->kegiatan?>
                      </div>
                    </td>
                    <td class="px-3 py-4">
                      <div class="text-sm text-gray-900">
                      <?php echo $row->date?>
                      </div>
                    </td>
                    <td class="px-3 py-4">
                      <div class="text-sm text-gray-900">
                      <?php echo $row->jam_masuk?>
                      </div>
                    </td>
                    <td class="px-3 py-4">
                      <div class="text-sm text-gray-900">
                      <?php if( $row->jam_pulang == NULL) {
                        echo '-';
                      } else{
                        echo $row->jam_pulang;
                      }?>
                      </div>
                    </td>
                    <td class="px-3 py-4">
                      <div class="text-sm text-gray-900">
                      <?php echo $row->keterangan_izin?>
                      </div>
                    </td>
                  </tr>
                  <?php endforeach?>
              </tbody>
            </table>
          </div>
        </div>
      </main>
    </div>

</body>
</html>