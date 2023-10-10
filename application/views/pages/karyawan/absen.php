<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Kegiatan</title>
    <link href="https://cdn.tailwindcss.com/2.2.15/tailwind.min.css" rel="stylesheet">
</head>
<body class="">
    <div class="md:flex min-h-screen">
        <?php $this->load->view('component/sidebar') ?>
        <main id="content" class="flex-1 p-6 lg:px-8 m-12">
            <div class="max-w-4xl mx-auto grid grid-cols-1 px-2 md:grid-cols-3 rounded-t-lg py-2.5 bg-rose-700 text-white text-xl">
            <div class="flex justify-center mb-2 md:justify-start md:pl-6">
              ABSEN
            </div>
          </div>
            <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
                <form action="#" method="POST">
                    <div>
                        <label for="kegiatan" class="block text-gray-800 font-medium mb-2">Kegiatan</label>
                        <textarea id="kegiatan" name="kegiatan" rows="6" class="bg-gray-50 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" required></textarea>
                    </div>
                    <div class="text-right mt-6">
                        <button type="submit" class="px-4 py-2 bg-rose-700 text-white rounded  hover:bg-rose-600 focus:outline-none focus:ring focus:ring-rose-500 uppercase rounded text-xs tracking-wider">Simpan</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
