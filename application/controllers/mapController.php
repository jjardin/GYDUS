<?php

	class mapController extends CI_Controller{

		function index(){
		
			$data = array();
				
			$data['content'] = 'mapView';
			$this->load->view('templates/template', $data);
		
		
		}
		function searchView(){
		
			$data = array();
				
			$data['content'] = 'searchView';
			$this->load->view('templates/template', $data);
		
		
		}
		function search(){
			/*
				search the database for locations
			*/
			
		}
		function POI(){
			/*
				show points of interest
			*/
			
		}
		
		function suggestaspotView(){
		
			$data['content'] = 'sasView';
			$this->load->view('templates/template', $data);			
		
		}
		function suggestaspot(){
			$this->load->model('mapModel');
			$query = $this->mapModel->suggestaspot();
			
			
			redirect('index.php/mapController');

			
		}
		
		

	}
?>