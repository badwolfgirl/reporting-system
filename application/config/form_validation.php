<?php

$config = array(
	 'dealer_survey' => array(
					   array(
							 'field'   => 'dealerName',
							 'label'   => 'Dealership Name',
							 'rules'   => 'required'
						  ),
					   array(
							 'field'   => 'dealerContact',
							 'label'   => 'Contact Person',
							 'rules'   => 'required'
						  ),
					   array(
							 'field'   => 'dealerZip',
							 'label'   => 'Zip Code',
							 'rules'   => 'required'
						  ),
					   array(
							 'field'   => 'dealerPhone',
							 'label'   => 'Phone Number',
							 'rules'   => 'required|numeric'
						  ),
					   array(
							 'field'   => 'dealerEmail', 
							 'label'   => 'Email', 
							 'rules'   => 'required|valid_email'
						  )
					)                      
	);