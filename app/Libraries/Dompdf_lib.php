<?php

use Dompdf\Dompdf;
use Dompdf\Options;

require_once APPPATH . 'libraries/dompdf/autoload.inc.php';

class Dompdf_lib
{
    public $dompdf;

    public function __construct()
    {
        $options = new Options();
        $options->set('isRemoteEnabled', true); // Bisa load gambar dari URL
        $this->dompdf = new Dompdf($options);
    }
}
