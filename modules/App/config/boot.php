<?php
/**
 * sFire Framework
 *
 * @link      https://sfire.nl
 * @copyright Copyright (c) 2014-2018 sFire Framework.
 * @license   https://sfire.nl/license BSD 3-CLAUSE LICENSE
 */
 
use sFire\HTTP\Response;

Response :: addHeader('X-Frame-Options', 'SAMEORIGIN');
?>