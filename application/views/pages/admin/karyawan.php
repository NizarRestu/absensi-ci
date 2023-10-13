<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karyawan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
<div class="relative min-h-screen md:flex" data-dev-hint="container">
<?php $this->load->view('component/sidebar_admin')?>
      <main id="content" class="max-h-screen overflow-y-auto flex-1 p-6 lg:px-8">
      <div class="container mx-auto">
          <div class="grid grid-cols-1 px-2 md:grid-cols-3 rounded-t-lg py-2.5 bg-rose-700 text-white text-xl">
            <div class="flex justify-center mb-2 md:justify-start md:pl-6">
              DATA KARYAWAN
            </div>
            <div class="flex flex-wrap justify-center col-span-2 gap-2 md:justify-end">
              <a
              href="<?php echo base_url('Admin/exportToExcel'); ?>"
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
                  <th class="px-3 py-2 text-xs text-gray-500">
                   NAMA KARYAWAN
                  </th>
                  <th class="px-3 py-2 text-xs text-gray-500">USERNAME</th>
                  <th class="px-3 py-2 text-xs text-gray-500">AKSI</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-300">
              <?php $no = 0;foreach ($karyawan as $row): $no++?>
                  <tr class="whitespace-nowrap">
                    <td class="px-3 py-4 text-sm text-gray-500"><?php echo $no?></td>
                    <td class="px-3 py-4">
                      <div class="text-sm text-gray-900">
                      <?php echo $row->nama_depan .' '. $row->nama_belakang?>
                      </div>
                    </td>
                    <td class="px-3 py-4">
                      <div class="text-sm text-gray-900">
                      <?php echo $row->username?>
                      </div>
                    </td>
                    <td class="px-3 py-4">
                      <div class="text-sm text-gray-900">
                      <a href="<?php echo base_url('admin/detail_karyawan/'). $row->id?>">
                          <button class="text-blue-600">
                              <svg class="w-6 h-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 192 512"><style>svg{fill:#075ef2}</style><path d="M48 80a48 48 0 1 1 96 0A48 48 0 1 1 48 80zM0 224c0-17.7 14.3-32 32-32H96c17.7 0 32 14.3 32 32V448h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H64V256H32c-17.7 0-32-14.3-32-32z"/></svg>
                          </button>
                      </a>
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