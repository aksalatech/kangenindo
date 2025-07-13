<?php
require_once "Custom_CI_Controller.php";

/**
* 
*/
class Report extends Custom_CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
		$this->load->helper("form");
	}

	public function index() {
		$this->load->model("Business_type_model");
		$this->load->model("Cert_type_model");

		// Get users
		$data["users"] = $this->Business_type_model->get_active_type();
		$data["dukcapil"] = $this->Cert_type_model->get_all_dukcapil();

		$this->load->view("Report_view", $data);
	}

	public function exportAlumni() {
		$this->load->library("PHPExcel/Classes/PHPExcel");
		$this->load->model("Cert_type_model");

		// Get Parameter
		$angkatan = $this->input->get("angkatan");
		$tkt_pddk = $this->input->get("tktpddk");

		$data = $this->Cert_type_model->get_all_type_req($angkatan, $tkt_pddk);

		$PHPExcel = new PHPExcel;
		$objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, "Excel2007");
		//$PHPExcel->setActiveSheetIndex(0);
		$objSheet = $PHPExcel->getActiveSheet();
		$objSheet->setTitle("Data Alumni IPB HAE");

		for($i = 1; $i <= 3; $i++) {
			$objSheet->mergeCells("A".$i.":G".$i);
		}
		$objSheet->getCell("A1")->setValue("DAFTAR ALUMNI IPB HAE");
		
		$objSheet->getCell("A5")->setValue("No.");
		$objSheet->getCell("B5")->setValue("Nama Alumni");
		$objSheet->getCell("C5")->setValue("NRP/NIM");
		$objSheet->getCell("D5")->setValue("Tempat Lahir");
		$objSheet->getCell("E5")->setValue("Tanggal Lahir");
		$objSheet->getCell("F5")->setValue("Angkatan");
		$objSheet->getCell("G5")->setValue("Jenis Kelamin");
		$objSheet->getCell("H5")->setValue("Tahun Masuk");
		$objSheet->getCell("I5")->setValue("Tahun Selesai");
		$objSheet->getCell("J5")->setValue("Tingkat Pendidikan");
		$objSheet->getCell("K5")->setValue("Program Studi");
		$objSheet->getCell("L5")->setValue("Provinsi");
		$objSheet->getCell("M5")->setValue("Kab/Kota");
		$objSheet->getCell("N5")->setValue("No. HP");
		$objSheet->getCell("O5")->setValue("Email");
		$objSheet->getCell("P5")->setValue("Pekerjaan");
		$objSheet->getCell("Q5")->setValue("Keahlian");
		$objSheet->getCell("R5")->setValue("Status Hidup ?");
		$objSheet->getStyle("A1:R5")->getFont()->setBold(true);
		$style = array(
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
				)
			);
		// Set Border
		$styleArray = array(
	          'borders' => array(
	              'allborders' => array(
	                  'style' => PHPExcel_Style_Border::BORDER_THIN
	              )
	          )
	      );

		$objSheet->getStyle("A1:R5")->applyFromArray($style);

		$index = 5;
		$no = 0;
		foreach ($data as $key => $value) {
			$index++;
			$no++;
			$objSheet->getCell("A".$index)->setValue($no);
			$objSheet->getCell("B".$index)->setValue($this->isNull($value->nama));
			$objSheet->getCell("C".$index)->setValue($this->isNull($value->nrp_nim));
			$objSheet->getCell("D".$index)->setValue($this->isNull($value->tempat_lahir));
			$objSheet->getCell("E".$index)->setValue(date('Y-m-d', strtotime($value->tanggal_lahir)));
			$objSheet->getCell("F".$index)->setValue($this->isNull($value->angkatan));
			$objSheet->getCell("G".$index)->setValue($value->sex);
			$objSheet->getCell("H".$index)->setValue($this->isNull($value->tanggal_masuk));
			$objSheet->getCell("I".$index)->setValue($this->isNull($value->tanggal_selesai));
			$objSheet->getCell("J".$index)->setValue($this->isNull($value->tkt_pddk));
			$objSheet->getCell("K".$index)->setValue($this->isNull($value->program_studi));
			$objSheet->getCell("L".$index)->setValue($this->isNull($value->provinsi));
			$objSheet->getCell("M".$index)->setValue($this->isNull($value->kab_kota));
			$objSheet->getCell("N".$index)->setValue($this->isNull($value->no_hp));
			$objSheet->getCell("O".$index)->setValue($this->isNull($value->email));
			$objSheet->getCell("P".$index)->setValue($this->isNull($value->pekerjaan));
			$objSheet->getCell("Q".$index)->setValue($this->isNull($value->keahlian));
			$objSheet->getCell("R".$index)->setValue($this->isNull($value->status_hidup));
		}
		$objSheet->getStyle("A5:R".$index)->applyFromArray($styleArray);

		// Set Dimension
		$objSheet->getColumnDimension('A')->setWidth(5);
		$objSheet->getColumnDimension('B')->setWidth(22);
		$objSheet->getColumnDimension('C')->setWidth(35);
		$objSheet->getColumnDimension('D')->setWidth(35);
		$objSheet->getColumnDimension("E")->setAutoSize(true);
		$objSheet->getColumnDimension("F")->setAutoSize(true);
		$objSheet->getColumnDimension('G')->setAutoSize(true);
		$objSheet->getColumnDimension('H')->setAutoSize(true);
		$objSheet->getColumnDimension('I')->setAutoSize(true);
		$objSheet->getColumnDimension('J')->setAutoSize(true);
		$objSheet->getColumnDimension('K')->setAutoSize(true);
		$objSheet->getColumnDimension('L')->setAutoSize(true);
		$objSheet->getColumnDimension('M')->setAutoSize(true);
		$objSheet->getColumnDimension('N')->setAutoSize(true);
		$objSheet->getColumnDimension('O')->setAutoSize(true);
		$objSheet->getColumnDimension('P')->setAutoSize(true);
		$objSheet->getColumnDimension('Q')->setAutoSize(true);
		$objSheet->getColumnDimension('R')->setAutoSize(true);


		// Download Filenya		
		$filename = "alumni-report-".date('dmY').".xlsx";
		$objWriter->save('./dist/download/'.$filename);
		redirect(base_url()."dist/download/".$filename);
	}
}