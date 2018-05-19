<?php 

namespace core;

use core\vendor\PHPMailer as PHPMailer;

Class Emails {


	// var $views;
	var $vars    = [];
	var $test 	 = false;
	var $template_default = 'email_default';
	var $email_test_folder = '/views/emails';

	var $files_test = [];
	// var $options = [];
	// var $params  = [];
	// var $vars_array  = [];



	public function __construct($view){

		$this->vars=$view->vars;

		$this->views=$view->views;

	}

	function send($emails,$subject,$vars=[],$opt=[]){

		// prin($vars);

		global $_FILES;

		$template=($opt['template'])?$opt['template']:$this->template_default;

		$name 	=($opt['name'])?$opt['name']:$template;

		$email_dir = APP.$this->email_test_folder;

		
		$view_email= new \core\Views($this->views.'/inline');
		// assing vars inline
		$view_email->assign(
			[
				'pub_img'     => $this->vars['pub_img_abs_rem'],
				'logo'        => $this->logo,
				'logo_height' => $this->logo_height,
				'name_right'  => $subject,
				'title'       => $subject,
			]
		);

		foreach($vars as $var=>$val){

			$view_email->assign([$var=>$val]);

		}

		$view_email->assign(['show_view'=>true]);
		

		$html_email    = $view_email->render($template,[],true);


		// $html_email= implode('', file($email_dir."/".str_replace(' ','_',$name).'.html'));

		// echo $html_email;
		// exit();

		if($this->vars['email_test']){
			

			if(!file_exists($email_dir)) mkdir($email_dir);

			// $filesss=scandir($email_dir);
			// foreach($filesss as $filess){
			// 	if(!in_array($filess,['.','..'])){
			// 		$archivo_email=$email_dir.'/'.$filess;
			// 		if(file_exists($archivo_email)){
			// 			unlink($archivo_email);
			// 		}
			// 	}
			// }

			$html_email=$html_email."<div class='preemail'>
			<table>
			<tr><td><b>SUBJECT:</b></td><td>".$subject."</td></tr>
			<tr><td><b>FROM:</b></td><td>".$this->vars['web_name']."</td></tr>
			<tr><td><b>TO:</b></td><td>".$emails."</td></tr>
			</table></div>
			<style>
/*.preemail { background:#C34D4D;padding: 1em 0;color:#fff;}*/
.preemail table { text-align:left; margin:0 auto; font-size: 13px; }
.preemail table td { color:inherit; padding: 2px 1em; }
			</style>
			";

			$file=$email_dir."/".str_replace(' ','_',$name).'.html';
			$f1=fopen($file,"w+");
			fwrite($f1,$html_email);
			fclose($f1);

			$this->files_test[]=[
				'emails'  =>$emails,
				'from'    =>$this->vars['web_name'],
				'subject' =>$subject,
				'link'    =>$file
			];

			return true;

		} else {


			$phpMail = new PHPMailer(); // defaults to using php "mail()"

			if(0){
				$phpMail->PluginDir = "../work/core/vendor/";
				$phpMail->Mailer    = "smtp";
				$phpMail->Host      = $this->smtp_Host;
				$phpMail->SMTPAuth  = true;
				$phpMail->Username  = $this->smtp_Username;
				$phpMail->Password  = $this->smtp_Password;
				if (isset($_FILES['uploaded_file']) &&
				    $_FILES['uploaded_file']['error'] == UPLOAD_ERR_OK) {
				    $mail->AddAttachment($_FILES['uploaded_file']['tmp_name'],
				                         $_FILES['uploaded_file']['name']);
				}				
			}
			// }
			$phpMail->SetLanguage('en','../work/core/vendor/');

			$phpMail->From       = ($this->from_email)?$this->from_email:'prueba@incaclick.com';
			$phpMail->FromName   = $this->vars['web_name'];

			$phpMail->Subject    = $subject;
			// $phpMail->AltBody    = 'altbody';
			$phpMail->MsgHTML($html_email);
			$phpMail->CharSet	  = "utf-8";

			$emails_arr=explode(',',$emails);
			foreach($emails_arr as $ema){
				if(
					(substr($ema,-1,1)=='*') 
					or enhay($ema,'guille')
					// or enhay($ema,'prodiserv')
				){
					$emails_cc[]=str_replace('*','',$ema);
				} else {
					$emails_st[]=$ema;
				}
			}

			// prin($emails_cc);
			// prin($emails_st);
			// exit();

			if(sizeof($emails_st)>0){
				$phpMail->AddAddress(implode(',',$emails_st));
			}

			if(sizeof($emails_cc)>0){
				$phpMail->AddCC(implode(',',$emails_cc));
			}

			// echo ($phpMail->Send())?1:2;
			if($phpMail->Send()){
				return true;
			} else {
				prin($phpMail->ErrorInfo);
				return false;
			}
			// if($parametros['disabled']==1){
			// 	$enviado=true;
			// } else {
			// 	$enviado=$phpMail->Send();
			// }

			// if(!$enviado){
			// 	$todosenviados=false;
			// }
			// $phpMailenviado[$email]=($enviado)?true:$phpMail->ErrorInfo;
			// $phpMail->ErrorInfo;

		}

		// exit();

	}


}