<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__ . '/../../');
$dotenv->load();

function html2text($Document) {
    $Rules = ['@<style[^>]*?>.*?</style>@si',
        '@<script[^>]*?>.*?</script>@si',
        '@<[\/\!]*?[^<>]*?>@si',
        '@([\r\n])[\s]+@',
        '@&(quot|#34);@i',
        '@&(amp|#38);@i',
        '@&(lt|#60);@i',
        '@&(gt|#62);@i',
        '@&(nbsp|#160);@i',
        '@&(iexcl|#161);@i',
        '@&(cent|#162);@i',
        '@&(pound|#163);@i',
        '@&(copy|#169);@i',
        '@&(reg|#174);@i',
        '@&#(d+);@i'
    ];
    $Replace = ['',
        '',
        '',
        '',
        '',
        '&',
        '<',
        '>',
        ' ',
        chr(161),
        chr(162),
        chr(163),
        chr(169),
        chr(174),
        'chr()'
    ];
    return preg_replace($Rules, $Replace, $Document);
}

return function($kirby, $pages, $page) {

    $alert = null;

    if($kirby->request()->is('POST') && get('submit')) {

        // check the honeypot
        if(empty(get('website')) === false) {
            go($page->url());
            exit;
        }

        $data = [
            'name'  => get('name'),
            'email' => get('email'),
            'text'  => get('text')
        ];

        $rules = [
            'name'  => ['required', 'minLength' => 3],
            'email' => ['required', 'email'],
            'text'  => ['required', 'minLength' => 3, 'maxLength' => 3000],
        ];

        $messages = [
            'name'  => 'Please enter a valid name',
            'email' => 'Please enter a valid email address',
            'text'  => 'Please enter a text between 3 and 3000 characters'
        ];

        // some of the data is invalid
        if($invalid = invalid($data, $rules, $messages)) {
            $alert = $invalid;

            // the data is fine, let's send the email
        } else {

            try {
                $mail = new PHPMailer(true);
                $mail->IsSMTP(); 
                $mail->SMTPDebug = getenv('MAIL_SMTP_DEBUG');
                $mail->SMTPAuth = getenv('MAIL_SMTP_AUTH');
                $mail->SMTPSecure = getenv('MAIL_SMTP_SECURE');
                $mail->Host = getenv('MAIL_SMTP_HOST');
                $mail->Port = getenv('MAIL_SMTP_PORT');
                $mail->CharSet = "UTF-8";
                $mail->IsHTML(true);
                $mail->Username = getenv('MAIL_SMTP_ACCOUNT');
                $mail->Password = getenv('MAIL_SMTP_PASSWORD');
                $mail->setFrom($data['email'], $data['name']);
                $mail->addReplyTo(getenv('MAIL_SMTP_ACCOUNT'), getenv('MAIL_FROM_NAME'));
                $mail->Subject = esc($data['name']) . ' sent you a message from your contact form';
                $mail->Body = esc($data['text']);
                $mail->AltBody = \html2text(esc($data['text']));
                $mail->addAddress(getenv('MAIL_NOTIFY'), 'Administrador');
                $mail->send();

                /* $kirby->email([
                    'template' => 'email',
                    'from'     => 'hello.camminus@gmail.com',
                    'replyTo'  => $data['email'],
                    'to'       => 'telemagico@gmail.com',
                    'subject'  => esc($data['name']) . ' sent you a message from your contact form',
                    'data'     => [
                        'text'   => esc($data['text']),
                        'sender' => esc($data['name'])
                    ]
                ]); */
            } catch (Exception $error) {
                $alert['error'] = 'El formulario no pudo ser enviado: <strong>' . $error->getMessage() . '</strong>';
            }

            // no exception occurred, let's send a success message
            if (empty($alert) === true) {
                // $success = 'Your message has been sent, thank you. We will get back to you soon!';
                $success = 'Su mensaje fue enviado, gracias. Volveremos a usted pronto!';
                $data = [];
            }
        }
    }

    return [
        'alert'   => $alert,
        'data'    => $data ?? false,
        'success' => $success ?? false
    ];
};