<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Medicion extends CI_Controller {

	public function index()
	{
		
        $lista=$this->medicion_model->listamediciones();
		$data['mediciones']=$lista;

        $this->load->view('cabezera');
		$this->load->view('med_lista',$data);
        $this->load->view('pie');

	}

    public function subirfoto()
	{
        if($this->session->userdata('login'))
        {
            $data['idMedicion']=$_POST['idmedicion'];;

            $this->load->view('inclte/cabezera');
            $this->load->view('inclte/menusuperior');
            $this->load->view('inclte/menulateral');
            $this->load->view('subirform',$data);
            $this->load->view('inclte/pie'); 
        }
        else{
            redirect('usuarios/index/2','refresh');
        }
		
	}

    public function subir()
	{
		$idmedicion=$_POST['idMedicion'];
        $nombrearchivo=$idmedicion.".jpg";
        
        $config['upload_path']='./uploads/mediciones/';

        $config['file_name']=$nombrearchivo;

        $direccion="./uploads/mediciones/".$nombrearchivo;

        if(file_exists($direccion))
        {
            unlink($direccion);
        }

        $config['allowed_types']='jpg';

        $this->load->library('upload',$config);

        if(!$this->upload->do_upload())
        {
            $data['error']=$this->upload->display_errors();
        }
        else
        {
            $data['foto']=$nombrearchivo;
            $this->medicion_model->modificarmedicion($idmedicion,$data);
            $this->upload->data();
        }

        redirect('medicion/indexlte','refresh');

	}

    public function agregar()
    {
        $this->load->view('inclte/cabezera');
        $this->load->view('inclte/menusuperior');
		$this->load->view('inclte/menulateral');
        $this->load->view('med_formulario');
        $this->load->view('inclte/pie');
    }

    public function agregarbd()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('sistema','Nombre de sistema','required|min_length[5]|max_length[12]',array('required'=>'Se requiere el sistema','min_length'=>'Por lo menos 5 caracteres','max_length'=>'Maximo 12  caracteres'));

        if($this->form_validation->run()==FALSE)
        {
            $this->load->view('inclte/cabezera');
            $this->load->view('inclte/menusuperior');
            $this->load->view('inclte/menulateral');
            $this->load->view('med_formulario');
            $this->load->view('inclte/pie');
        }
        else
        {
            $data['idSistema']=$_POST['sistema'];
            $data['fechaMedicion']=$_POST['fecha'];
            $data['potenciaGenerada']=$_POST['potencia'];
            $data['eficiencia']=$_POST['eficiencia'];        
            $data['nota']=$_POST['nota'];        
            $this->medicion_model->agregarmedicion($data);
            redirect('medicion/index','refresh');    
        }
        
    }

    public function eliminarbd()
    {
        $idmedicion=$_POST['idmedicion'];
        $this->medicion_model->eliminarmedicion($idmedicion);
        redirect('medicion/index','refresh');
    }
	
    public function modificar()
    {
        $idmedicion=$_POST['idmedicion'];
        $data['infomedicion']=$this->medicion_model->recuperarmedicion($idmedicion);
        $this->load->view('cabezera');
        $this->load->view('med_modificar',$data);
        $this->load->view('pie');
    }

    public function modificarbd()
    {
        $idmedicion=$_POST['idmedicion'];
        $data['idSistema']=$_POST['sistema'];
        $data['fechaMedicion']=$_POST['fecha'];
        $data['potenciaGenerada']=$_POST['potencia'];
        $data['eficiencia']=$_POST['eficiencia'];        
        
        $this->medicion_model->modificarmedicion($idmedicion,$data);
        redirect('medicion/index','refresh');
    }

    public function deshabilitarbd()
    {
        $idmedicion=$_POST['idmedicion'];
        $data['estado']='0';
        $this->medicion_model->modificarmedicion($idmedicion,$data);
        redirect('medicion/index','refresh');
    }

    public function habilitarbd()
    {
        $idmedicion=$_POST['idmedicion'];
        $data['estado']='1';
        $this->medicion_model->modificarmedicion($idmedicion,$data);
        redirect('medicion/deshabilitados','refresh');
    }

    public function deshabilitados()
	{	
        $lista=$this->medicion_model->listamedicionesdesh();
		$data['mediciones']=$lista;
        
        $this->load->view('inclte/cabezera');
        $this->load->view('inclte/menusuperior');
        $this->load->view('inclte/menulateral');
        $this->load->view('med_listadesh',$data);
        $this->load->view('inclte/pie');

	}

    public function indexlte()
	{
		

        if($this->session->userdata('login'))
        {
            $lista=$this->medicion_model->listamediciones();
            $data['mediciones']=$lista;
    
            $this->load->view('inclte/cabezera');
            $this->load->view('inclte/menusuperior');
            $this->load->view('inclte/menulateral');
            $this->load->view('med_listalte', $data);
            $this->load->view('inclte/pie');        }
        else
        {
            redirect('usuarios/index/2','refesh');
        }
	}

    public function listaxls(){
        $lista=$this->medicion_model->listamediciones();
        $lista=$lista->result();

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="medicion.xlsx"');
        $spreadsheet=new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1','ID');
        $sheet->setCellValue('B1','Sistema');
        $sheet->setCellValue('C1','Fecha Medicion');
        $sheet->setCellValue('D1','Potencia Generada');
        $sheet->setCellValue('E1','Eficiencia');

        $sn=2;
        foreach($lista as $row){
            $sheet->setCellValue('A'.$sn,$row->idMedicion);
            $sheet->setCellValue('B'.$sn,$row->idSistema);
            $sheet->setCellValue('C'.$sn,$row->fechaMedicion);
            $sheet->setCellValue('D'.$sn,$row->potenciaGenerada);
            $sheet->setCellValue('E'.$sn,$row->eficiencia);
            //$sheet->setCellValue();
            $sn++;
        }
        $writer=new Xlsx($spreadsheet);
        $writer->save("php://output");
    }

    public function listaxls2(){
        $lista=$this->medicion_model->listamediciones();
        $lista=$lista->result();

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="medicion_2.xlsx"');
        $spreadsheet=new Spreadsheet();

        //Metadatos para editar reporte de excel
        $spreadsheet
        ->getProperties()
        ->setCreator("Nombre del autor")
        ->setLastModifiedBy("Juan Perez")
        ->setTitle('Excel creado en el sistema')
        ->setSubject('Excel de prueba')
        ->setDescription('Descripcion del excel')
        ->setKeywords('Lista estudiantes')
        ->setCategory('Categoria de prueba');
        //----
        //Hoja activa
        $sheet = $spreadsheet->getActiveSheet();
        //Nombre de la hoja
        $sheet->setTitle("Lista mediciones");
        //colores de textos y fondos de la hoja antes de meter valores
        //color de la letra 
        $sheet->getStyle('A1:E1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED); 
        //color de fondo de la celda
        $sheet->getStyle('A1:E1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffff00');

        //Ancho de la columna A es toda la fila
        $sheet->getColumnDimension('A')->setWidth(20);

        //Funciones concatenar

        $sheet->setCellValue('A1','ID');
        $sheet->setCellValue('B1','Sistema');
        $sheet->setCellValue('C1','Fecha Medicion');
        $sheet->setCellValue('D1','Potencia Generada');
        $sheet->setCellValue('E1','Eficiencia');

        $sn=2;
        foreach($lista as $row){
            $sheet->setCellValue('A'.$sn,$row->idMedicion);
            $sheet->setCellValue('B'.$sn,$row->idSistema);
            $sheet->setCellValue('C'.$sn,$row->fechaMedicion);
            $sheet->setCellValue('D'.$sn,$row->potenciaGenerada);
            $sheet->setCellValue('E'.$sn,$row->eficiencia);
            //$sheet->setCellValue();
            $sn++;
        }
        $writer=new Xlsx($spreadsheet);
        $writer->save("php://output");
    }

    public function listapdf(){
        if($this->session->userdata('login'))
        {
            $lista=$this->medicion_model->listamediciones();
            $lista=$lista->result();
            
            $this->pdf=new Pdf();
            $this->pdf->AddPage();
            $this->pdf->AliasNbPages();
            $this->pdf->SetTitle("Lista de mediciones");
            
            $this->pdf->SetLeftMargin(15);
            $this->pdf->SetRightMargin(15);
            $this->pdf->SetFillColor(210,210,210);//RGB
            $this->pdf->SetFont('Arial','B',11);//I italic U underline B bold ''normal
            $this->pdf->Ln(5);
            $this->pdf->Cell(30);
            $this->pdf->Cell(120,10,'LISTA DE ESTUDIANTES',0,0,'C',1);
            //ancho, alto, texto, borde, generacion de la siguiente celda
            //0 derecha 1 siguiente linea 2 debajo
            //Alineacion LCR, fill 0 1

            $this->pdf->Ln(10);
            $this->pdf->SetFont('Arial','B',9);

            $this->pdf->Cell(30);
            $this->pdf->Cell(7,5,'No','TBLR',0,'L',0);
            $this->pdf->Cell(20,5,'Nro. Sistema','TBLR',0,'L',0);
            $this->pdf->Cell(50,5,'Fecha Medicion','TBLR',0,'L',0);
            $this->pdf->Cell(30,5,'Potencia Generada','TBLR',0,'L',0);
            $this->pdf->Cell(30,5,'Eficiencia','TBLR',0,'L',0);
            $this->pdf->Ln(5);

           $this->pdf->SetFont('Arial','',9);

            $num=1;
            foreach($lista as $row)
            {
                $idSistema=$row->idSistema;
                $fechaMedicion=$row->fechaMedicion;
                $potenciaGenerada=$row->potenciaGenerada;
                $eficiencia=$row->eficiencia;

                $this->pdf->Cell(30);
                $this->pdf->Cell(7,5,$num,'TBLR',0,'L',0);
                $this->pdf->Cell(20,5,$idSistema,'TBLR',0,'L',0);
                $this->pdf->Cell(50,5,$fechaMedicion,'TBLR',0,'L',0);
                $this->pdf->Cell(30,5,$potenciaGenerada,'TBLR',0,'L',0);
                $this->pdf->Cell(30,5,$eficiencia,'TBLR',0,'L',0);
                $this->pdf->Ln(5);
                $num++;
            }


            $this->pdf->Output("Lista de mediciones.pdf","I");//I mostrar navegador //D Forzar descarga
            
        }
        else
        {
            redirect('usuarios/index/2','refesh');
        }
    }

    public function invitadolte()
    {
        if($this->session->userdata('login'))
        {
         
            $this->load->view('inclte/cabezera');
            $this->load->view('inclte/menusuperior');
            $this->load->view('inclte/menulateral');
            $this->load->view('med_invitado');
            $this->load->view('inclte/pie');        }
        else
        {
            redirect('usuarios/index/2','refesh');
        }

    }
}
