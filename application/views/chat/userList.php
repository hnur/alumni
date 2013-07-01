<?php
	session_start();
	$_SESSION['username'] = $this->session->userdata('username'); // Must be already set
?>
<?php $this->load->view('header'); ?>

<?php
	//Show Flash Message
	if($msg = $this->session->flashdata('flash_message'))
	{
		echo $msg;	
	}
	
?>

<h2>Online Üyeler</h2>

<?php
if($_SESSION['username']=='') { ?>
	<h3>Lütfen giriş yapınız</h3>
	<li><a href="<?=site_url('login'); ?>" class="navbar-link">Giriş Yap</a></li>
<?php
} else {  echo 'Hoşgeldin '.$_SESSION['username'];
?> 
<br />

	<li><a href="<?=site_url('login/logout'); ?>">Çıkış</a></li>
<?php
}
?>               <table width="45%" cellspacing="1" cellpadding="2" class="tableContent" style="margin-left:0px !important;">
                        <tbody>
                                  <tr style="background-color:#9EB0E9;  font-size:13px; font-weight:bold; color:#fff;">
                                  <th>Online</th>
                                  <th>User Id</th>
                                  <th>Kullanıcı ismi</th>
                                </tr>
                              
								<?php
								
								 //print_r($listOfUsers); 
								
								 if(isset($listOfUsers))
							    {
							   
							    foreach($listOfUsers->result() as $res)
								 {
 
							    ?>

                                    <tr style="background-color:#efefef;">
                                            
                                            <td><?php if($res->online==1) echo 'Active'; else echo 'Inactive'; ?></td>
                                            <td><?php echo $res->id; ?></td>
                                            
                                            <td>
                                            <?php if($_SESSION['username']==$res->first_name) { ?>
                                            		<a href="#" style="text-decoration:none">
                                                  <?php } else { ?>  
                                                		<a href="javascript:void(0)" onClick="javascript:chatWith('<?php echo $res->first_name; ?>');">
                                                  <?php } ?>      
                                                            <?php echo $res->first_name;  ?>
                                                </a>
                                            </td>
                                    </tr>

										 <?php 	
										 
									  }
								  }
							  ?>	  	  	
			
					</tbody>
			   </table>
<?php $this->load->view('footer'); ?>
