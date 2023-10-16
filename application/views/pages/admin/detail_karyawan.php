<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="sweetalert2.min.css">

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="bg-gray-100">
<?php foreach ($karyawan as $users): ?>
    <div class="relative min-h-screen md:flex">
    <?php $this->load->view('component/sidebar_admin')?>
    <section class=" overflow-y-auto w-10/12 rounded-md shadow-lg bg-white p-6 lg:px-8 container flex flex-col md:flex-row justify-center space-y-10 md:space-y-0 md:space-x-16 items-center my-2 mx-5 md:mx-0 md:my-0">
        <div class="md:w-1/3 max-w-sm flex-shrink-0">
            <label class="" for="image" id="imageTrigger">
                <img src="<?php echo base_url('images/' . $users->image) ?>" class="max-w-full h-auto rounded-lg shadow-md">
            </label>
        </div>
        <form>
    <div class="md:w-2/3">
        <div>
            <label class="text-sm text-gray-600" for="email">Email</label>
            <div class="relative mb-6">
                <input type="email" name="email" class="w-full rounded-lg border p-4 pr-12 text-sm shadow-sm" placeholder="Masukan email" value="<?php echo $users->email ?>" disabled required>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-sm text-gray-600" for="firstName">Nama Depan</label>
                <div class="relative mb-6">
                    <input type="text" id="firstName" name="nama_depan" class="w-full rounded-lg border p-4 pr-12 text-sm shadow-sm" placeholder="Nama Depan" value="<?php echo $users->nama_depan ?>" disabled required>
                </div>
            </div>
            <div>
                <label class="text-sm text-gray-600" for="lastName">Nama Belakang</label>
                <div class="relative mb-6">
                    <input type="text" id="lastName" name= "nama_belakang" class="w-full rounded-lg border p-4 pr-12 text-sm shadow-sm" placeholder="Nama Belakang" value="<?php echo $users->nama_belakang ?>" disabled required>
                </div>
            </div>
        </div>
        <div>
            <label class="text-sm text-gray-600" for="username">Username</label>
            <div class="relative mb-6">
                <input type="text" id="username" name="username" class="w-full rounded-lg border p-4 pr-12 text-sm shadow-sm" placeholder="Username" value="<?php echo $users->username ?>" disabled required>
            </div>
        </div>
         </div>
        </form>
        </div>
    </section>
</div>
<?php endforeach?>
</body>
</html>
