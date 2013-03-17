<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class userController extends CI_Controller
{
	
	function login()
	{	
		
		$data['content'] = 'loginView';
		$this->load->view('templates/template', $data);		
	}
		
	function check_member()
	{		
		$this->load->model('userModel');
		$query = $this->userModel->validate();
		
		if($query) // if the user's credentials validated...
		{
			$row = $query->row_array();
							
			$userData = array(
				'id' => $row['id'],
				'name' => $row['name'],
				'email' => $row['email'],
				'pass' => $row['password'],
				'is_logged_in' => TRUE
			);
			

			$this->session->set_userdata($userData);

			redirect('index.php/mapController/index');
						
		
		}else{ // incorrect username or password
						$loginVal = $this->session->set_flashdata('message', 'Email or Password is incorrect');

				redirect('index.php/userController/login');

					
		}
	}	
	
	function register()
	{
		$data['content'] = 'registerView';

		$this->load->view('templates/template', $data);
	}
	
	function create_member()
	{
				
			$this->load->model('userModel');
			$query = $this->userModel->validateRegister();
			
			if($query)//if the username alreayd exsists
			{
				$egisterVal = $this->session->set_flashdata('message', 'Email already exsists');

				redirect('index.php/userController/register');
			}else{// if it doesnt then create the member
				$query = $this->userModel->create_member();
			
				$row = $query->row_array();

			
				$userData = array(
					'id' => $row['id'],
					'name' => $row['name'],
					'email' => $row['email'],
					'pass' => $row['password'],
					'is_logged_in' => TRUE
				);
			

			$this->session->set_userdata($userData);
			
			redirect('index.php/mapController/index');


				
			}// end of else	
	}// end of create_member
	
	function logout()
	{
		$this->session->sess_destroy();
	
		
		$data['content'] = 'marketingView';
		$this->load->view('templates/template', $data);		
		
	}
	
	function account_setting(){
	
		$this->load->helper('url');

		if ($this->session->userdata('is_logged_in')){	
			$data['userData'] = $this->session->all_userdata();
		};	
		$data['content'] = 'accountSettingsView';
		$this->load->view('templates/template', $data);		

	
	}
	
	function edit_account_settings(){
	
		$this->load->helper('url');

		if ($this->session->userdata('is_logged_in')){	
			$data['userData'] = $this->session->all_userdata();
		};	
		$data['content'] = 'editAccountSettingsView';
	
		$this->load->view('templates/template', $data);		

	
	}
	function update_member(){
	
		$this->load->helper('url');
		$data = $this->session->all_userdata();
	
		$this->load->model('userModel');
		$query = $this->userModel->validateUpdateMember();
		
		if($query)//if the email and username is the same already
		{
			$updateAccVal = $this->session->set_flashdata('message', 'Cant update account to the same information');

				redirect('index.php/userController/edit_account_settings');
			
		}else{// update the credientials
		$query = $this->userModel->update_member($data);
			$row = $query->row_array();

			
			$userData = array(
				'id' => $row['id'],
				'name' => $row['name'],
				'email' => $row['email'],
				'pass' => $row['password'],
				'is_logged_in' => TRUE
			);
			
			$editaccsucc = $this->session->set_flashdata('word', 'Your account has been successfully updated');
			$this->session->set_userdata($userData);
			
			redirect('index.php/userController/account_setting');
			
		}//end of else
	}// end of update member
	
	function contact_us(){
	
		$this->load->helper('url');

		if ($this->session->userdata('is_logged_in')){	
				$data['userData'] = $this->session->all_userdata();
		};	
		$data['content'] = 'contactUsView';
		$this->load->view('templates/template', $data);		

	
	}
	function send_email()
	{
		

			/* These are the variable that tell the subject of the email and where the email will be sent.*/
			$emailSubject = $_POST['subjectSelect'];
			$mailto = 'gydusapp@gmail.com';

			/* These will gather what the user has typed into the fieled. */
			$nameField = $_POST['reginputName'];
			$messField = $_POST['gydusContactMes'];
			$emailField = $_POST['reginputEmail'];
			

			/* This takes the information and lines it up the way you want it to be sent in the email. */
			$body = "
				<br><hr><br>
				Name: $nameField <br>
				Email: $emailField <br>
			";

			$headers = "From: $emailField\r\n"; // This takes the email and displays it as who this email is from.
			$headers.= "Content-type: text/html\r\n"; // This tells the server to turn the coding into the text.
			$success = mail($mailto, $emailSubject, $body, $headers); // This tells the server what to send.
			
			if ($success)
			{
				$this->load->helper('url');
				$data['content'] = 'emailSentView';
				$this->load->view('templates/template', $data);	

				echo 'message sent';
			}
			else
			{
				echo "idk if it worked";	
			}
		
	}
	
	function dev_corner(){

		$this->load->helper('url');
	
		if ($this->session->userdata('is_logged_in')){	
				$data['userData'] = $this->session->all_userdata();
		};	
		$data['content'] = 'developersCorner';
		$this->load->view('templates/template', $data);		


	}//end of dev_corner
	
		function terms(){

		$this->load->helper('url');
	
		if ($this->session->userdata('is_logged_in')){	
				$data['userData'] = $this->session->all_userdata();
		};	
		$data['content'] = 'termsCondView';
		$this->load->view('templates/template', $data);		


	}//end of terms

	
	

}