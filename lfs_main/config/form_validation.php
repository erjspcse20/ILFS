<?php
$config = array(
    'forget_password_master_rules' => array(
        array(
            'field' =>	'Email',
            'level' =>	'Email',
            'rules'	=>	'required',
            'errors' => array(
                'required' => 'Please provide Country Email.'
            )
        )
    ),
    'signin-master-rules' => array(
        array(
            'field' =>	'Username',
            'level' =>	'Username',
            'rules'	=>	'required',
            'errors' => array(
                'required' => 'Please Provide Your User Name.'
            )
        ),array(
            'field' =>	'Password',
            'level' =>	'Password',
            'rules'	=>	'required',
            'errors' => array(
                'required' => 'Please Provide Password.'
            )
        )
    ),
    'signup_master_rules' => array(
        array(
            'field' =>	'Name',
            'level' =>	'Name',
            'rules'	=>	'required',
            'errors' => array(
                'required' => 'You must provide Name.'
            )
        ),												array(
            'field' =>	'Mobile',
            'level' =>	'Mobile',
            'rules'	=>	'required',
            'errors' => array(
                'required' => 'You must provide Mobile.'
            )
        ),												array(
            'field' =>	'Password',
            'level' =>	'Password',
            'rules'	=>	'required',
            'errors' => array(
                'required' => 'You must provide Password.'
            )
        ),												array(
            'field' =>	'Email',
            'level' =>	'Email',
            'rules'	=>	'required',
            'errors' => array(
                'required' => 'You must provide Email.'
            )
        )
    ),
    'wallet_tansfar_master_rule' => array(
        array(
            'field' =>	'agent',
            'level' =>	'agent',
            'rules'	=>	'required',
            'errors' => array(
                'required' => 'Please select agent to transfar money.'
            )
        ),array(
            'field' =>	'amount',
            'level' =>	'amount',
            'rules'	=>	'required|numeric',
            'errors' => array(
                'required' => 'Please Enter Amount u want to transfar.'
            )
        )
    ),
    'airlines_markup_master_rule' => array(
        array(
            'field' =>	'agent',
            'level' =>	'agent',
            'rules'	=>	'required',
            'errors' => array(
                'required' => 'Please Select agent.'
            )
        ),												array(
            'field' =>	'airlines',
            'level' =>	'airlines',
            'rules'	=>	'required',
            'errors' => array(
                'required' => 'Please Select airlines.'
            )
        ),												array(
            'field' =>	'markupType',
            'level' =>	'markupType',
            'rules'	=>	'required',
            'errors' => array(
                'required' => 'Please Select markup type .'
            )
        ),												array(
            'field' =>	'amount',
            'level' =>	'amount',
            'rules'	=>	'required',
            'errors' => array(
                'required' => 'Please Enter Amount.'
            )
        )
    ),
    'segment_markup_master_rule' => array(
        array(
            'field' =>	'agent',
            'level' =>	'agent',
            'rules'	=>	'required',
            'errors' => array(
                'required' => 'Please Select agent.'
            )
        ),												array(
            'field' =>	'markupType',
            'level' =>	'markupType',
            'rules'	=>	'required',
            'errors' => array(
                'required' => 'Please Select markup type .'
            )
        ),												array(
            'field' =>	'amount',
            'level' =>	'amount',
            'rules'	=>	'required',
            'errors' => array(
                'required' => 'Please Enter Amount.'
            )
        )
    ),
    'Distributor_company_mapping' => array(
        array(
            'field' =>	'company',
            'level' =>	'company',
            'rules'	=>	'required',
            'errors' => array(
                'required' => 'please select company.'
            )
        ),												array(
            'field' =>	'agent',
            'level' =>	'agent',
            'rules'	=>	'required',
            'errors' => array(
                'required' => 'please select agent.'
            )
        )
    ),
    'profile_update_rule' => array(
        array(
            'field' =>	'fName',
            'level' =>	'fName',
            'rules'	=>	'required',
            'errors' => array(
                'required' => 'please provide first name.'
            )
        ),												array(
            'field' =>	'lName',
            'level' =>	'lName',
            'rules'	=>	'required',
            'errors' => array(
                'required' => 'please provide last name.'
            )
        ),												array(
            'field' =>	'emailId',
            'level' =>	'emailId',
            'rules'	=>	'required',
            'errors' => array(
                'required' => 'please provide Email id.'
            )
        ),												array(
            'field' =>	'mobileNo',
            'level' =>	'mobileNo',
            'rules'	=>	'required',
            'errors' => array(
                'required' => 'please provide Mobile No.'
            )
        )
    ),
    'password_update_rule' => array(
        array(
            'field' =>	'oldPassword',
            'level' =>	'oldPassword',
            'rules'	=>	'required',
            'errors' => array(
                'required' => 'please provide Old Password.'
            )
        ),												array(
            'field' =>	'Password',
            'level' =>	'Password',
            'rules'	=>	'required|min_length[6]',
            'errors' => array(
                'required' => 'please provide new password.'
            )
        ),												array(
            'field' =>	'passwordrepeat',
            'level' =>	'passwordrepeat',
            'rules'	=>	'required|min_length[6]',
            'errors' => array(
                'required' => 'please Confirm password.'
            )
        )
    )




);
?>