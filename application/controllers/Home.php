<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('mahasiswa');
        $this->load->library('session');
    }

    public function index()
    {
        // Ambil data mahasiswa dari model
        $mahasiswa_data = $this->mahasiswa->get_all_data();

        // Kirim data ke view
        $data['mahasiswa_data'] = $mahasiswa_data;

        // Load view dengan data
        $this->load->view('index', $data);
    }

    public function spreadsheet_format_download()
    {
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="SampleDataMahasiswa.xlsx"'); // header ini savenya nanti bernama sekian, dan jadi ms excel
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'No.'); // ini buat nambah kolom di export excelnya
        $activeWorksheet->setCellValue('B1', 'Nama Mahasiswa'); 
        $activeWorksheet->setCellValue('C1', 'Fakultas'); 
        $activeWorksheet->setCellValue('D1', 'Prodi'); 
        $activeWorksheet->setCellValue('E1', 'No. Telpon'); 
        $activeWorksheet->setCellValue('F1', 'Kelamin'); 
        $activeWorksheet->setCellValue('G1', 'Alamat'); 
        $activeWorksheet->setCellValue('H1', 'Tanggal Lahir'); 

        $activeWorksheet->setCellValue('A2', '1');
        $activeWorksheet->setCellValue('B2', 'Ando Zamhariro Royan'); 
        $activeWorksheet->setCellValue('C2', 'Fasilkom'); 
        $activeWorksheet->setCellValue('D2', 'Sistem Informasi'); 
        $activeWorksheet->setCellValue('E2', '081216532315'); 
        $activeWorksheet->setCellValue('F2', 'Laki-Laki'); 
        $activeWorksheet->setCellValue('G2', 'Jl. Melon 5/F-3'); 
        $activeWorksheet->setCellValue('H2', '04/09/2023'); 
        
        $activeWorksheet->setCellValue('A3', '2');
        $activeWorksheet->setCellValue('B3', 'Python Bean'); 
        $activeWorksheet->setCellValue('C3', 'faperta'); 
        $activeWorksheet->setCellValue('D3', 'Sistem Informasi'); 
        $activeWorksheet->setCellValue('E3', '081216532315'); 
        $activeWorksheet->setCellValue('F3', 'Perempuan'); 
        $activeWorksheet->setCellValue('G3', 'Jl. Melon 5/F-5'); 
        $activeWorksheet->setCellValue('H3', '11/09/2023'); 

        $writer = new Xlsx($spreadsheet);
        $writer->save("php://output");
    }

    public function spreadsheet_import()
    {
        $upload_file=$_FILES['upload_file']['name'];
		$extension=pathinfo($upload_file,PATHINFO_EXTENSION);
		if($extension=='csv')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		} else if($extension=='xls')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		} else if($extension=='xlsx')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		} else {
            // File format tidak didukung, atur pesan error
            $this->session->set_flashdata('message',"
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan!',
                    text: 'File yang diupload tidak valid! Wajib berupa .csv/.xlsx/.xls',
                });
            </script>");
            redirect('home');
        }

		$spreadsheet=$reader->load($_FILES['upload_file']['tmp_name']);
		$sheetdata=$spreadsheet->getActiveSheet()->toArray();
		$sheetcount=count($sheetdata);
		if($sheetcount>1)
		{
			$data=array();
			for ($i=1; $i < $sheetcount; $i++) { 
				$nama_mahasiswa=$sheetdata[$i][1];
				$fakultas=$sheetdata[$i][2];
				$prodi=$sheetdata[$i][3];
				$no_telpon=$sheetdata[$i][4];
				$kelamin=$sheetdata[$i][5];
				$alamat=$sheetdata[$i][6];
				$tanggal_lahir=$sheetdata[$i][7];

                if (!is_numeric($no_telpon)) {
                    $this->session->set_flashdata('message',"
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan!',
                            text: 'Data tidak valid, pastikan nomor telpon benar!',
                        });
                    </script>");
                    redirect('home');
                    break;
                }

                if (!DateTime::createFromFormat('d/m/Y', $tanggal_lahir) && !DateTime::createFromFormat('Y-m-d', $tanggal_lahir)) {
                    $this->session->set_flashdata('message',"
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan!',
                            text: 'Data tidak valid, pastikan tanggal lahir benar!',
                        });
                    </script>");
                    redirect('home');
                    break;
                }
                // Mengonversi tanggal Excel ke format MySQL
                $tanggal_lahir = date('Y-m-d', strtotime(str_replace('/', '-', $tanggal_lahir)));
                
				$data[]=array(
					'nama_mahasiswa'=>$nama_mahasiswa,
					'fakultas'=>$fakultas,
					'prodi'=>$prodi,
					'no_telpon'=>$no_telpon,
					'kelamin'=>$kelamin,
					'alamat'=>$alamat,
					'tanggal_lahir'=>$tanggal_lahir,
				);
			}
            
            $inserdata=$this->mahasiswa->insert_batch($data);
			if($inserdata)
			{
				$this->session->set_flashdata('message','<div class="alert alert-success">Successfully Added.</div>');
				redirect('home');
			} else {
				$this->session->set_flashdata('message','<div class="alert alert-danger">Data Not uploaded. Please Try Again.</div>');
				redirect('home');
			}
		}
    }

    public function spreadsheet_export()
	{
		//fetch my data
		$MahasiswaList=$this->mahasiswa->mahasiswa_list();
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="DataMahasiswa.xlsx"');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'No.');
		$sheet->setCellValue('B1', 'Nama Mahasiswa');
		$sheet->setCellValue('C1', 'Fakultas');
		$sheet->setCellValue('D1', 'Prodi');
		$sheet->setCellValue('E1', 'No. Telpon');
		$sheet->setCellValue('F1', 'Kelamin');
		$sheet->setCellValue('G1', 'Alamat');
		$sheet->setCellValue('H1', 'Tanggal Lahir');

		$sn=2;
		foreach ($MahasiswaList as $prod) {
			//echo $prod->product_name;
			$sheet->setCellValue('A'.$sn,$prod->mahasiswa_id);
			$sheet->setCellValue('B'.$sn,$prod->nama_mahasiswa);
			$sheet->setCellValue('C'.$sn,$prod->fakultas);
			$sheet->setCellValue('D'.$sn,$prod->prodi);
			$sheet->setCellValue('E'.$sn,$prod->no_telpon);
			$sheet->setCellValue('F'.$sn,$prod->kelamin);
			$sheet->setCellValue('G'.$sn,$prod->alamat);
			$sheet->setCellValue('H'.$sn,$prod->tanggal_lahir);
			$sn++;
		}

		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output");
	}
}