<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Mingguan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="relative min-h-screen md:flex" data-dev-hint="container">
        <?php $this->load->view('component/sidebar_admin')?>
        <main id="content" class="max-h-screen overflow-y-auto flex-1 p-6 lg:px-8">
            <div class="container mx-auto">
                <div class="grid grid-cols-1 px-2 md:grid-cols-3 rounded-t-lg py-2.5 bg-rose-700 text-white text-xl">
                    <div class="flex justify-center mb-2 md:justify-start md:pl-6">
                        REKAP MINGGUAN
                    </div>
                    <div class="flex flex-wrap justify-center col-span-2 gap-2 md:justify-end">
              <a
              href="<?php echo base_url('Admin/export_rekap_mingguan'); ?>"
                class="py-1 float-end bg-sky-400
          text-white bg-sky-500 hover:bg-sky-600 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center w-[250px] md:w-[250px]"
              >
                Export Data
              </a>
            </div>
                </div>
                <div class="overflow-x-auto w-full px-4 bg-white rounded-b-lg shadow">
                    <table class="my-4 w-full divide-y divide-gray-300 text-center">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-3 py-2 text-xs text-gray-500">NO</th>
                                <th class="px-3 py-2 text-xs text-gray-500">NAMA KARYAWAN</th>
                                <th class="px-3 py-2 text-xs text-gray-500">
                                    KEGIATAN
                                </th>
                                <th class="px-3 py-2 text-xs text-gray-500">TANGGAL</th>
                                <th class="px-3 py-2 text-xs text-gray-500">JAM MASUK</th>
                                <th class="px-3 py-2 text-xs text-gray-500">JAM PULANG</th>
                                <th class="px-3 py-2 text-xs text-gray-500">KETERANGAN IZIN</th>
                                <th class="px-3 py-2 text-xs text-gray-500">STATUS</th>
                                <th class="px-3 py-2 text-xs text-gray-500">AKSI</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                            <?php $no=0; foreach ($data_mingguan as $absen): $no++ ?>
                            <tr class="whitespace-nowrap">
                                <td class="px-3 py-4 text-sm text-gray-500"><?php echo $no ?></td>
                                <td class="px-3 py-4 text-sm text-gray-500 uppercase"><?php echo tampil_nama_karawan_byid($absen['id_karyawan']) ?></td>
                                <td class="px-3 py-4">
                                    <div class="text-sm text-gray-900">
                                        <?php echo $absen['kegiatan']; ?>
                                    </div>
                                </td>
                                <td class="px-3 py-4">
                                    <div class="text-sm text-gray-900">
                                        <?php echo $absen['date']; ?>
                                    </div>
                                </td>
                                <td class="px-3 py-4">
                                    <div class="text-sm text-gray-900">
                                    <?php if ($absen['jam_masuk'] == null) {
                                        echo '-';
                                    } else {
                                        echo $absen['jam_masuk'];
                                    }?>
                                    </div>
                                </td>
                                <td class="px-3 py-4">
                                    <div class="text-sm text-gray-900">
                                    <?php if ($absen['jam_pulang'] == null) {
                                        echo '-';
                                    } else {
                                        echo $absen['jam_pulang'];
                                    }?>
                                    </div>
                                </td>
                                <td class="px-3 py-4">
                                    <div class="text-sm text-gray-900">
                                        <?php echo $absen['keterangan_izin']; ?>
                                    </div>
                                </td>
                                <td class="px-3 py-4">
                      <div class="text-sm text-gray-900 uppercase">
                      <?php echo $absen['status']?>
                      </div>
                    </td>
                    <td class="flex  px-3 gap-3 py-4 justify-center">
                    <div class="">
                        <?php
                        if($absen['keterangan_izin'] == '-') {
                          echo '<a href="' . base_url('admin/ubah_absen_mingguan/') . $absen['id'] . '">
                          <button class="text-blue-600">
                              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                              </svg>
                          </button>
                      </a>';
                        } else {
                          echo '<a href="' . base_url('admin/ubah_izin_mingguan/') . $absen['id'] . '">
             <button class="text-blue-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
        </svg>
    </button>
                </a>';

                        }
                        ?>
                      </div>
                      <div class="">
                        <button onclick="hapus(<?php echo $absen['id'] ?>)" class="text-red-600">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                          </svg>
                        </button>
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
    <script>
    function hapus(id) {
        Swal.fire({
     title: 'Apakah Mau Dihapus?',
     text: "data ini tidak bisa dikembalikan lagi!",
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
    title: 'Data Terhapus!!',
    showConfirmButton: false,
    timer: 1500
                })
      setTimeout(() => {
        window.location.href= "<?php echo base_url('admin/hapus_mingguan/') ?>" + id;
      }, 1800);
    }
    })
  }
</script>
</body>

</html>