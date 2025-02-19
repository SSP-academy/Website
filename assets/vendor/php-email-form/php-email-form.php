<?php
class PHP_Email_Form {
    public $to = '';
    public $from_name = '';
    public $from_email = '';
    public $subject = '';
    public $smtp = [];
    public $ajax = false;

    public function add_message($value, $label) {
        $this->message .= "$label: $value\n";
    }

    public function send() {
        // Prepare email headers
        $headers = "From: {$this->from_name} <{$this->from_email}>\r\n";
        $headers .= "Reply-To: {$this->from_email}\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Send email using mail() function
        if (mail($this->to, $this->subject, $this->message, $headers)) {
            return 'OK'; // Success message
        } else {
            return 'Error sending email.'; // Error message
        }
    }
}
?>
