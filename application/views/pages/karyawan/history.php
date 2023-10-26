<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
.pagination {
        display: flex;
        justify-content: center;
        gap: 1rem;
}

.pagination a,
.pagination strong {
  display: block;
  width: 2rem;
  height: 2rem;
  text-align: center;
  line-height: 2rem;
  border: 1px solid #ccc;
  background-color: #fff;
  border-radius:4px;
  color: #333;
}

.pagination a:hover,
.pagination strong {
	display: block;
width: 2rem;
height: 2rem;
border: 1px solid #3b82f6; /* Ganti dengan warna sesuai kebutuhan Anda */
background-color: #3b82f6; /* Ganti dengan warna sesuai kebutuhan Anda */
text-align: center;
line-height: 2rem;
color: #fff;
}
    </style>
</head>

<body>
<div class="relative min-h-screen md:flex" data-dev-hint="container">
<?php $this->load->view('component/sidebar')?>
      <main id="content" class="max-h-screen overflow-y-auto flex-1 p-6 lg:px-8">
      <div class="container mx-auto">
          <div class="grid grid-cols-1 px-2 md:grid-cols-3 rounded-t-lg py-2.5 bg-rose-700 text-white text-xl">
            <div class="flex justify-center mb-2 md:justify-start md:pl-6">
              HISTORY
            </div>
          </div>
          <div class="overflow-x-auto w-full px-4 bg-white rounded-b-lg shadow">
            <table class="my-4 w-full divide-y divide-gray-300 text-center">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-3 py-2 text-xs text-gray-500">NO</th>
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
              <?php $no = 0;foreach ($history as $row): $no++?>
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
                      <?php if( $row->jam_masuk == NULL) {
                        echo '-';
                      } else{
                        echo $row->jam_masuk;
                      }?>
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
                    <td class="px-3 py-4">
                      <div class="text-sm text-gray-900 uppercase">
                      <?php echo $row->status?>
                      </div>
                    </td>
                    <td class="flex  px-3 gap-3 py-4 justify-center">
                      <div class="">
                        <?php
                        if($row->keterangan_izin == '-') {
                          echo '<a href="' . base_url('karyawan/ubah_absen/') . $row->id . '">
                          <button class="text-blue-600">
                              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                              </svg>
                          </button>
                      </a>';
                        } else {
                          echo '<a href="' . base_url('karyawan/ubah_izin/') . $row->id . '">
             <button class="text-blue-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
        </svg>
    </button>
                </a>';

                        }
                        ?>
                      </div>
                      <?php
                      if($row->status == 'done') {
                        echo '<div>
                        <button disabled>
                        <svg  xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 opacity-25"  viewBox="0 0 640 512" stroke="currentColor">
                          <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M208 96a48 48 0 1 0 0-96 48 48 0 1 0 0 96zM123.7 200.5c1-.4 1.9-.8 2.9-1.2l-16.9 63.5c-5.6 21.1-.1 43.6 14.7 59.7l70.7 77.1 22 88.1c4.3 17.1 21.7 27.6 38.8 23.3s27.6-21.7 23.3-38.8l-23-92.1c-1.9-7.8-5.8-14.9-11.2-20.8l-49.5-54 19.3-65.5 9.6 23c4.4 10.6 12.5 19.3 22.8 24.5l26.7 13.3c15.8 7.9 35 1.5 42.9-14.3s1.5-35-14.3-42.9L281 232.7l-15.3-36.8C248.5 154.8 208.3 128 163.7 128c-22.8 0-45.3 4.8-66.1 14l-8 3.5c-32.9 14.6-58.1 42.4-69.4 76.5l-2.6 7.8c-5.6 16.8 3.5 34.9 20.2 40.5s34.9-3.5 40.5-20.2l2.6-7.8c5.7-17.1 18.3-30.9 34.7-38.2l8-3.5zm-30 135.1L68.7 398 9.4 457.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L116.3 441c4.6-4.6 8.2-10.1 10.6-16.1l14.5-36.2-40.7-44.4c-2.5-2.7-4.8-5.6-7-8.6zM550.6 153.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L530.7 224H384c-17.7 0-32 14.3-32 32s14.3 32 32 32H530.7l-25.4 25.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l80-80c12.5-12.5 12.5-32.8 0-45.3l-80-80z"/></svg>
                        </button>
                       </div>';
                      } else {
                        echo '<div>
                        <button onclick= "pulang('. $row->id .')">
                        <svg  xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"  viewBox="0 0 640 512" stroke="currentColor">
                          <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M208 96a48 48 0 1 0 0-96 48 48 0 1 0 0 96zM123.7 200.5c1-.4 1.9-.8 2.9-1.2l-16.9 63.5c-5.6 21.1-.1 43.6 14.7 59.7l70.7 77.1 22 88.1c4.3 17.1 21.7 27.6 38.8 23.3s27.6-21.7 23.3-38.8l-23-92.1c-1.9-7.8-5.8-14.9-11.2-20.8l-49.5-54 19.3-65.5 9.6 23c4.4 10.6 12.5 19.3 22.8 24.5l26.7 13.3c15.8 7.9 35 1.5 42.9-14.3s1.5-35-14.3-42.9L281 232.7l-15.3-36.8C248.5 154.8 208.3 128 163.7 128c-22.8 0-45.3 4.8-66.1 14l-8 3.5c-32.9 14.6-58.1 42.4-69.4 76.5l-2.6 7.8c-5.6 16.8 3.5 34.9 20.2 40.5s34.9-3.5 40.5-20.2l2.6-7.8c5.7-17.1 18.3-30.9 34.7-38.2l8-3.5zm-30 135.1L68.7 398 9.4 457.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L116.3 441c4.6-4.6 8.2-10.1 10.6-16.1l14.5-36.2-40.7-44.4c-2.5-2.7-4.8-5.6-7-8.6zM550.6 153.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L530.7 224H384c-17.7 0-32 14.3-32 32s14.3 32 32 32H530.7l-25.4 25.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l80-80c12.5-12.5 12.5-32.8 0-45.3l-80-80z"/></svg>
                        </button>
                       </div>';
                      }
                      ?>
                    </td>
                  </tr>
                  <?php endforeach?>
              </tbody>
            </table>
            <div class="rounded-b-lg border-t border-gray-200 px-4 py-2">
            <?php echo $links; ?>
                </div>
          </div>
        </div>

      </main>
    </div>
<script>
      function pulang(id) {
        Swal.fire({
        title: 'Apakah Mau Pulang?',
        text: "Pastikan kegiatan sudah dilakukan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Ya, pulang!'
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Berhasil!!',
          showConfirmButton: false,
          timer: 1500
        })
        setTimeout(() => {
          window.location.href= "<?php echo base_url('karyawan/pulang/') ?>" + id;
          }, 1800);
        }
          })
      }
</script>
</body>

</html>