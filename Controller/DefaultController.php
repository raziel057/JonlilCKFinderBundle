<?php
/**
 * User: jonas
 * Date: 2013-03-02
 * Time: 17:24
 *
 * Use with love
 */

namespace Jonlil\CKFinderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



class DefaultController extends Controller
{
    public function indexAction ()
    {
        return $this->render('JonlilCKFinderBundle::ckfinder.html.twig');
    }

    public function connectorAction (Request $request)
    {
        return new Response('funka');
    }

    public function initAction (Request $request, $service)
    {

        switch ($service) {
            case 'php':
                $connector = $this->get('jonlil.ckfinder.connector.php');
                break;
            case 's3':
                $connector = $this->get('jonlil.ckfinder.connector.s3');
                break;
        }

        return new Response();
    }
}