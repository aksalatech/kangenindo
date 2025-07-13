<?php
require_once "Custom_CI_Controller.php";
// Include librari PhpSpreadsheet
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * 
 */
class Sales extends Custom_CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper("form");
	}

	public function index()
	{
		$this->load->model("Sales_model");
		$this->load->model("Customer_model");
		if ($this->input->post("action") == null) {
			$req = "";
		} else {
			$req = $this->input->post("action");
		}

		if ($this->input->post("sd") == null) {
			$st = date('Y-m-01');
		} else {
			$st = $this->input->post("sd");
		}

		if ($this->input->post("ed") == null) {
			$ed = date('Y-m-t');
		} else {
			$ed = $this->input->post("ed");
		}
		$data = array();
		$data["temp"] = $req;
		$data["start"] = $st;
		$data["endd"] = $ed;
		$data['view_branch'] = $this->Customer_model->get_type();
		$data['view_type'] = $this->Sales_model->get_bystore($req, $st, $ed);

		$this->load->view("Sales_view", $data);
	}

	public function bystore()
	{
		$this->load->model("Sales_model");
		$this->load->model("Customer_model");
		if ($this->input->post("action") == null) {
			$req = "";
		} else {
			$req = $this->input->post("action");
		}

		if ($this->input->post("sd") == null) {
			$st = date('Y-m-01');
		} else {
			$st = $this->input->post("sd");
		}

		if ($this->input->post("ed") == null) {
			$ed = date('Y-m-t');
		} else {
			$ed = $this->input->post("ed");
		}
		$data = array();
		$data["temp"] = $req;
		$data["start"] = $st;
		$data["endd"] = $ed;
		$data['view_branch'] = $this->Customer_model->get_type();
		$data['view_type'] = $this->Sales_model->get_bystore($req, $st, $ed);

		$this->load->view("Sales_view", $data);
	}

	public function bybrand()
	{
		$this->load->model("Sales_model");
		$this->load->model("Customer_model");
		$this->load->model("Store_model");
		if ($this->input->post("action") == null) {
			$req = "";
		} else {
			$req = $this->input->post("action");
		}

		if ($this->input->post("sd") == null) {
			$st = date('Y-m-01');
		} else {
			$st = $this->input->post("sd");
		}

		if ($this->input->post("ed") == null) {
			$ed = date('Y-m-t');
		} else {
			$ed = $this->input->post("ed");
		}
		$data = array();
		$data["temp"] = $req;
		$data["start"] = $st;
		$data["endd"] = $ed;
		$data['view_branch'] = $this->Store_model->get_all_store();
		$data['view_type'] = $this->Sales_model->get_bybrand($req, $st, $ed);

		$this->load->view("Salesbybrand_view", $data);
	}

	public function byproduct()
	{
		$this->load->model("Sales_model");
		$this->load->model("Customer_model");
		$this->load->model("Store_model");
		if ($this->input->post("action") == null) {
			$req = "";
		} else {
			$req = $this->input->post("action");
		}

		if ($this->input->post("sd") == null) {
			$st = date('Y-m-01');
		} else {
			$st = $this->input->post("sd");
		}

		if ($this->input->post("ed") == null) {
			$ed = date('Y-m-t');
		} else {
			$ed = $this->input->post("ed");
		}
		$data = array();
		$data["temp"] = $req;
		$data["start"] = $st;
		$data["endd"] = $ed;
		$data['view_branch'] = $this->Store_model->get_all_store();
		$data['view_type'] = $this->Sales_model->get_bybrand($req, $st, $ed);

		$this->load->view("Salesbybrand_view", $data);
	}

	
	public function exportbystore()
	{
		$this->load->model("Sales_model");
		$this->load->model("Customer_model");
		$this->load->model("Store_model");

		// Get Parameter
		$store = $this->input->get("store");
		$sd = $this->input->get("sd");
		$ed = $this->input->get("ed");
		$data = $this->Sales_model->get_bystore($store, $sd, $ed);

		$qtytotal = 0;
		$transAmttot = 0;
		$discAmttot = 0;
		$netrevtotal = 0;
		foreach ($data as $value) {
			//var_dump($value)
			$qtytotal = $qtytotal + $value->qty;
			$transAmttot = $transAmttot + $value->transAmt;
			$discAmttot = $discAmttot + $value->discAmt;
			$netrevtotal = $netrevtotal + ($value->transAmt - $value->discAmt);
		}

		$spreadsheet = new Spreadsheet();
		$activeWorksheet = $spreadsheet->getActiveSheet();
		// $activeWorksheet->setCellValue('A1', 'Hello World !');
		$activeWorksheet->getCell("A1")->setValue("Data Sales By Store");

		$activeWorksheet->getCell("A3")->setValue("No.");
		$activeWorksheet->getCell("B3")->setValue("Store Name");
		$activeWorksheet->getCell("C3")->setValue("QTY");
		$activeWorksheet->getCell("D3")->setValue("Revenue");
		$activeWorksheet->getCell("E3")->setValue("Discount");
		$activeWorksheet->getCell("F3")->setValue("Net Revenue");
		$activeWorksheet->getCell("B4")->setValue("Grand Total");
		$activeWorksheet->getCell("C4")->setValue($qtytotal);
		$activeWorksheet->getCell("D4")->setValue("$".$transAmttot);
		$activeWorksheet->getCell("E4")->setValue("$".$discAmttot);
		$activeWorksheet->getCell("F4")->setValue("$".$netrevtotal);
		$activeWorksheet->getStyle("A1:B4")->getFont()->setBold(true);

		$styleArray = [
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
					'color' => ['argb' => '000000'],
				],
			],
		];
		
		$activeWorksheet->getStyle('A3:F3')->applyFromArray($styleArray);

		$index = 4;
		$no = 0;
		foreach ($data as $key => $value) {
			$index++;
			$no++;
			$activeWorksheet->getCell("A" . $index)->setValue($no);
			$activeWorksheet->getCell("B" . $index)->setValue($this->isNull($value->store_name));
			$activeWorksheet->getCell("C" . $index)->setValue($this->isNull($value->qty));
			$activeWorksheet->getCell("D" . $index)->setValue("$" . $this->isNull($value->transAmt));
			$activeWorksheet->getCell("E" . $index)->setValue("$" . $this->isNull($value->discAmt));
			$activeWorksheet->getCell("F" . $index)->setValue("$" . $this->isNull($value->transAmt - $value->discAmt));
		}
		$styleArray2 = [
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => ['argb' => '000000'],
				],
			],
		];
		$activeWorksheet->getStyle("A4:F".$index)->applyFromArray($styleArray2);

		$activeWorksheet->getColumnDimension('A')->setWidth(5);
		$activeWorksheet->getColumnDimension('B')->setAutoSize(true);
		$activeWorksheet->getColumnDimension('C')->setAutoSize(true);
		$activeWorksheet->getColumnDimension('D')->setAutoSize(true);
		$activeWorksheet->getColumnDimension("E")->setAutoSize(true);
		$activeWorksheet->getColumnDimension("F")->setAutoSize(true);

		

		$writer = new Xlsx($spreadsheet);
		$filename = "By-Store-report-" . date('dmY') . ".xlsx";
		$writer->save('./dist/download/' . $filename);
		redirect(base_url() . "dist/download/" . $filename);
	}

	public function exportbybrand()
	{
		$this->load->model("Sales_model");
		$this->load->model("Customer_model");
		$this->load->model("Store_model");

		// Get Parameter
		$store = $this->input->get("store");
		$sd = $this->input->get("sd");
		$ed = $this->input->get("ed");
		// $data = $this->Sales_model->get_bystore($store, $sd, $ed);
		$data = $this->Sales_model->get_bybrand($store, $sd, $ed);

		$qtytotal = 0;
		$transAmttot = 0;
		$discAmttot = 0;
		$netrevtotal = 0;
		foreach ($data as $value) {
			//var_dump($value)
			$qtytotal = $qtytotal + $value->qty;
			$transAmttot = $transAmttot + $value->transAmt;
			$discAmttot = $discAmttot + $value->discAmt;
			$netrevtotal = $netrevtotal + ($value->transAmt - $value->discAmt);
		}

		$spreadsheet = new Spreadsheet();
		$activeWorksheet = $spreadsheet->getActiveSheet();
		// $activeWorksheet->setCellValue('A1', 'Hello World !');
		$activeWorksheet->getCell("A1")->setValue("Data Sales By Brand");

		$activeWorksheet->getCell("A3")->setValue("No.");
		$activeWorksheet->getCell("B3")->setValue("Store Name");
		$activeWorksheet->getCell("C3")->setValue("QTY");
		$activeWorksheet->getCell("D3")->setValue("Revenue");
		$activeWorksheet->getCell("E3")->setValue("Discount");
		$activeWorksheet->getCell("F3")->setValue("Net Revenue");
		$activeWorksheet->getCell("B4")->setValue("Grand Total");
		$activeWorksheet->getCell("C4")->setValue($qtytotal);
		$activeWorksheet->getCell("D4")->setValue("$".$transAmttot);
		$activeWorksheet->getCell("E4")->setValue("$".$discAmttot);
		$activeWorksheet->getCell("F4")->setValue("$".$netrevtotal);
		$activeWorksheet->getStyle("A1:B4")->getFont()->setBold(true);

		$styleArray = [
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
					'color' => ['argb' => '000000'],
				],
			],
		];
		
		$activeWorksheet->getStyle('A3:F3')->applyFromArray($styleArray);

		$index = 4;
		$no = 0;
		foreach ($data as $key => $value) {
			$index++;
			$no++;
			$activeWorksheet->getCell("A" . $index)->setValue($no);
			$activeWorksheet->getCell("B" . $index)->setValue($this->isNull($value->brand_name));
			$activeWorksheet->getCell("C" . $index)->setValue($this->isNull($value->qty));
			$activeWorksheet->getCell("D" . $index)->setValue("$" . $this->isNull($value->transAmt));
			$activeWorksheet->getCell("E" . $index)->setValue("$" . $this->isNull($value->discAmt));
			$activeWorksheet->getCell("F" . $index)->setValue("$" . $this->isNull($value->transAmt - $value->discAmt));
		}
		$styleArray2 = [
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => ['argb' => '000000'],
				],
			],
		];
		$activeWorksheet->getStyle("A4:F".$index)->applyFromArray($styleArray2);

		$activeWorksheet->getColumnDimension('A')->setWidth(5);
		$activeWorksheet->getColumnDimension('B')->setAutoSize(true);
		$activeWorksheet->getColumnDimension('C')->setAutoSize(true);
		$activeWorksheet->getColumnDimension('D')->setAutoSize(true);
		$activeWorksheet->getColumnDimension("E")->setAutoSize(true);
		$activeWorksheet->getColumnDimension("F")->setAutoSize(true);

		

		$writer = new Xlsx($spreadsheet);
		$filename = "By-Brand-report-" . date('dmY') . ".xlsx";
		$writer->save('./dist/download/' . $filename);
		redirect(base_url() . "dist/download/" . $filename);
	}
}
