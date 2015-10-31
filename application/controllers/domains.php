<?php

class Domains extends CI_Controller{

function index()
{
	echo ' ';
}

 public function check_domain_uri($domain, $uri)
	{
	   
		$this->load->model('domains_model');
		$data = $this->domains_model->get_domain($domain);
		$data1 = $this->domains_model->get_uri();
		
        if (!$data) 
			{ 
			$id = $this->domains_model->set_domain($domain);
			}
       else 
		{ 
	   
			foreach ($data as $row)
				{
					$visits = $row['visits'] + 1;
					$this->domains_model->update_domain($domain, $visits);
					$id = $row['id'];
				}	
	   } 
	   
	    for($i=1;$i<count($uri);$i++)
		{
			$brojac = 0; 

			foreach($data1 as $row)
				{
					if(($row['uri'] == $uri[$i]) && ($row['position'] == $i) && ($row['domain_id'] == $id)) 
						{
							$brojac++; 
							$count = $row['count'] + 1; 
							$position = $row['position']; 
						}
				}
				
			if($brojac == 0 && !empty($uri[$i]) && ($uri[$i] != 'favicon.ico')) 
				{
					$position = $i;
					$uri1 = $uri[$i];
					$this->domains_model->set_uri($uri1, $position, $id);
				}
			if($brojac>0 && !empty($uri[$i]) && ($uri[$i] != 'favicon.ico'))
				{
					$uri1 = $uri[$i];
					$this->domains_model->update_uri($uri1, $count, $position, $id);
				} 	
		}  
    }

function uri($domain, $uri)
{

switch ($domain)
{
	case 'www.testsite.loc':
		if (!empty($uri[1]))
			{
				$uri['uri1'] = ltrim(implode(", ", $uri), ",");
				$this->load->view('domain_view', $uri);
			} 
		else
			{
				$nouri['nouri'] = 'There is no URI elements';
				$this->load->view('domain_view', $nouri);
			}
	break;
	
	case 'www.adminsite.loc':
	
		$this->load->model('domains_model');
				
		 if(empty($uri[1]))
			{
				$result['domains'] = $this->domains_model->get_domains();
				$this->load->view('domain_view', $result);
			}
		else
			{	
				$results = $this->domains_model->get_domains();
				 foreach($results as $row1)
					{	
						for($i=1;$i<count($uri);$i++)
							{
								if($uri[$i] == substr($row1['domain'], 4)) 
									{
										$id = $row1['id'];
										$uri_elements['elements'] = $this->domains_model->get_uris_id($id);
											if(!$uri_elements)
												{
													$this->load->view('domain_view', $uri_elements);
												}
											else
												{
													$nouris['nouris'] = 'No URI  elements for that domain';
													$this->load->view('domain_view', $nouris);
												}
									}
							}
					}
			}
		break;
		
	case 'www.hashsite.loc':
	    if (empty($uri[1])) {
		$nhash['nhash'] = 'Nothing to hash';
		$this->load->view('domain_view', $nhash);
		}
		else {
		$specchar = array("+" => "-", "/" => "_", "=" => "");
		$hash = base64_encode( md5( $uri[1] ) . time() );
        $hash = strtr($hash, $specchar);
		$hashed['hashed'] = $hash;
		$this->load->view('domain_view', $hashed);
		}
		break;
    default:
        echo 'No Site Found';
        break;
}	
}
}


$domain = $_SERVER['SERVER_NAME']; 
$uri = explode("/", $_SERVER['REQUEST_URI']); 

$a = new Domains();
$a->uri($domain, $uri); 
$a->check_domain_uri($domain, $uri);  