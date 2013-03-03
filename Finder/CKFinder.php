<?php
/**
 * User: jonas
 * Date: 2013-03-02
 * Time: 17:11
 *
 * Use with love
 */

namespace Jonlil\CKFinderBundle\Finder;

class CKFinder extends \CKFinder
{
    function __construct(array $options = array())
    {
         //$basePath = CKFINDER_DEFAULT_BASEPATH, $width = '100%', $height = 400, $selectFunction = null

        $this->parameters = $options;

        // TODO: Implement __construct() method.
    }

}