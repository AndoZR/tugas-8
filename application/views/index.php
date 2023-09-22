<!DOCTYPE html>
<html>
    <head>
        <title>PHP SpreadSheet</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="<?php echo base_url('assets/sweetalert2.all.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/sweetalert2.min.js'); ?>"></script>

    </head>
    <body class="page-login">
        <main class="container mt-4">
            <h2>Tugas Mentoring 8 / Data Mahasiswa
            <span class="float-right">
                <?php echo anchor('home/spreadsheet_format_download', 'Download Sample Data', 'class="btn btn-success"'); ?>
                <a class="btn btn-info" href="<?php echo base_url('home/spreadsheet_export');?>" target="_blank">Export Data Mahasiswa</a>
            </span>
            </h2>
            <hr>
            <?php
            if ($this->session->flashdata('message'))
            {
                
                echo $this->session->flashdata('message');
            }
            ?>
            <form method="post" action="<?php echo base_url('home/spreadsheet_import');?>" enctype="multipart/form-data">
                <label for="">Import Data Mahasiswa :</label>
                <div class="form-group">
                    <input type="file" name="upload_file" class="form-control" placeholder="Enter Name" id="upload_file" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">Import</button>
                </div>
            </form>

            <!-- Bagian Table -->
            <table border="1" class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>No. Telpon</th>
                        <th>Kelamin</th>
                        <th>Alamat</th>
                        <th>Tanggal Lahir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mahasiswa_data as $mahasiswa) : ?>
                        <tr>
                            <td><?php echo $mahasiswa['nama_mahasiswa']; ?></td>
                            <td><?php echo $mahasiswa['prodi']; ?></td>
                            <td><?php echo $mahasiswa['no_telpon']; ?></td>
                            <td><?php echo $mahasiswa['kelamin']; ?></td>
                            <td><?php echo $mahasiswa['alamat']; ?></td>
                            <td><?php echo $mahasiswa['tanggal_lahir']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </main><!-- Page Content -->

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
    </body>

</html>