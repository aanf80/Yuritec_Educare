<?php
/**
 * Created by PhpStorm.
 * User: Jessica Lizbeth
 * Date: 21/06/2017
 * Time: 07:44 PM
 */


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
}
/* application/libraries/Pdf.php */