<?
class mapModel extends CI_Model{
		
	function __construct(){
        parent::__construct();
    }
	
	function suggestaspot(){
		if($this->input->post('sasLat') == '' || $this->input->post('spot-name') == ''  ){
			
			return false;
		}else{
	
		
			$this->db->where('name', $this->input->post('spot-name'));
			$query = $this->db->get('SuggestASpot');
			

			
			if($query->num_rows == 1){ // it exists
				
				/*
					get tally 
					create var for tally# +1
					update table	
				*/
				
				$query = $this->db->get_where('SuggestASpot', array('name' => $this->input->post('spot-name')));
	
				
				foreach ($query->result() as $row)
				{
				      $t = ($row->tally) + 1;
				     
				}
				
				
				$this->db->where('name', $this->input->post('spot-name'));
				$this->db->update('SuggestASpot', array('tally' => $t)); 
				
				
				return true;			
				
	
			}else{  //make one
				
				/*
					create suggestion
				
				*/	
				
				$startTally = '1';
				
				$SuggestASpot_data = array(
					'name' => $this->input->post('spot-name'),
					'tally' => $startTally,
					'longitude' => $this->input->post('sasLng'),
					'latitude' => $this->input->post('sasLat')
	
					);
					 /*,
					'building_id' => $this->input->post('building_id'),			
					'latitude' => $this->input->post('spot_lat')	
					'longitude' => $this->input->post('spot_long')	*/
					// add the rest of the fields later. this is a just logic test					
				
			
				$insert = $this->db->insert('SuggestASpot', $SuggestASpot_data);
				
				return true;
				
			}
		}
	}//ends of suggest a spot function
	
	/* #-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#


						ADDING DB CLASSROOM SPOTS


#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-# */

function addRoom(){
		if($this->input->post('sasLat') == '' || $this->input->post('spot-name') == ''  ){
			
			return false;
		}else{
	
		
			$this->db->where('name', $this->input->post('spot-name'));
			$query = $this->db->get('Rooms');
			

			
							
				
				$addRoom_data = array(
					'name' => $this->input->post('spot-name'),
					'building_id' => $this->input->post('spot-Building'),
					'longitude' => $this->input->post('sasLng'),
					'latitude' => $this->input->post('sasLat')
	
					);
								
				
			
				$insert = $this->db->insert('Rooms', $addRoom_data);
				
				return true;
				
			}
		
	}//ends of suggest a spot function






/* #-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#


						ADDING DB CLASSROOM SPOTS


#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-# */
	
	function search(){


	/* The User searches for a room directly	 */
		if($this->input->get('searchLocation')!= ''){

			$this->db->where('name',$this->input->get('searchLocation'));
			$query = $this->db->get('Rooms'); //Change this to rooms later


			if($query->num_rows() > 0)
			{

				return $query;
				//echo gettype($query);
			}else
			{

				return false;

			}

		}else{

	/* The user searches for POI 	 */
			$qArray = array();

			if(isset($_GET['points'])){
				$points = $_GET['points'];

			}

			  if(empty($points))   {
				return false;			    

			  }else{

			  	foreach($points as $p){

				  	$this->db->where('categorey',$p);
			        $query = $this->db->get('PointsOfInterest'); //Change this to rooms later


			        if($query->num_rows() > 0){

						array_push($qArray, $query);						     

			        }else{

				        return false;
			        };

				 }
				//echo gettype($qu);

				 return $qArray;
			  }

		}

	}	

		
	function get_DirectionsViaMarker(){
			
		$formA_Building = $this->input->get('buildingA');
		$formA_Room = $this->input->get('roomA');
		$formB_Building = $this->input->get('buildingB');
		$formB_Room = $this->input->get('roomB');

		$this->db->where('buildingA',$formA_Building);
		$this->db->where('buildingB',$formB_Building);
		$this->db->where('pointA',$formA_Room);
		$this->db->where('pointB',$formB_Room);

		$query = $this->db->get('Navigation'); 

		if($query){

			return $query;

		}else{
			
			return false;
		}
	
		
	}
	
	function get_DirectionsViaForm(){
				
		$formA_Building = $this->input->get('buildingSelectionA');
		$formA_Room = $this->input->get('pointA');
		$formB_Building = $this->input->get('buildingSelectionB');
		$formB_Room = $this->input->get('pointB');

		
		if($formA_Building == 'SELECT BUILDING' || $formB_Building == 'SELECT BUILDING'){
			
			return false;
			
			
		}else if($formA_Building == $formB_Building){             //One Line
			
			$this->db->where('buildingA',$formA_Building);
			$this->db->where('buildingB',$formB_Building);
			$this->db->where('pointA',$formA_Room);
			$this->db->where('pointB',$formB_Room);
	
			$query = $this->db->get('Navigation'); 
	
	
			
				
			if($query->num_rows() > 0){
			
				return $query;
			}else{
				$this->db->where('buildingA',$formB_Building);
				$this->db->where('buildingB',$formA_Building);
				$this->db->where('pointA',$formB_Room);
				$this->db->where('pointB',$formA_Room);
		
				$query1 = $this->db->get('Navigation'); 
				
				if($query1){
					
					return $query1;
				}else{
					return false;
				}	

			}
			
			
		}else{	
		
			$entrance = '1';
			$nArray = array();
			
			$this->db->where('buildingA',$formA_Building);
			$this->db->where('buildingB',$formA_Building);
			$this->db->where('pointA',$entrance);
			$this->db->where('pointB',$formA_Room);
	
			$queryA = $this->db->get('Navigation'); 
	
	
			if($queryA){
				array_push($nArray, $queryA);
			}else{
				return false;
			}
				
			$this->db->where('buildingA',$formB_Building);
			$this->db->where('buildingB',$formB_Building);
			$this->db->where('pointA',$entrance);
			$this->db->where('pointB',$formB_Room);
	
			$queryB = $this->db->get('Navigation'); 
	
	
			if($queryB){
				array_push($nArray, $queryB);
			}else{
				return false;
			}			
										
			return $nArray;
		}			
	}
	
	

			
		
} 
?>