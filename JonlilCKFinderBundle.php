<?php
/**
 * User: jonasliljestrand
 * Date: 2013-03-02
 * Time: 14:28
 *
 * Use with love
 */

namespace Jonlil\CKFinderBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class JonlilCKFinderBundle extends Bundle
{
    public function boot()
    {
        $GLOBALS['config']['licenseKey'] = '';
        $GLOBALS['config']['licenseName'] = '';
    }
}
