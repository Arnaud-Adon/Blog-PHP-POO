<?php 

namespace app\Controller;

use core\Controller\Controller;

class ContactController extends AppController{

	public function mail(){
		$error='';

		if(!empty($_POST['name'])){
			if(!empty($_POST['email'])){
				if(!empty($_POST['message'])){
					if(!preg_match("/^[a-z]+$/i", $_POST['name'])){
						$error_name = true;
					}else{
						if(!preg_match("/^[a-z0-9\-_.]+@[a-z0-9\-_.]+\.[a-z]{2,3}$/i", $_POST['email'])){
							$error_email = true;
						}else{
							$to="contact@arnaudadon.fr";
        					$sujet= $name." a contact le site";
        					$header="From : $name <$email>";
        					$header .= "Reply-To: $email";
        					$header .="Content-Type: text/plain; charset=\"iso-8859-1\"";
        					$envoi=true;

        					$message=stripslashes($message);
        					$name=stripslashes($name);

        					if(mail($to,$sujet,$message,$header)){
            					$success="Votre message m'est bien parvenu.<br> Je vous réponderai le plus vite possible.";
            					unset($name);
            					unset($email);
            					unset($message);
        					}
        					else{
            					$error_mail=true;
        					}
						}
					}
				}else{
					$empty_message = true;
				}
			}else{
				$empty_email = true;
			}
		}else{
			$empty_name = true;
		}

		$form = new \core\HTML\BootstrapForm($_POST);

		$this->render('contact.mail', compact('form','error'));


	}
}