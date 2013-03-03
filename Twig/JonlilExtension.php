<?php
/**
 * User: jonas
 * Date: 2013-03-03
 * Time: 23:25
 *
 * Use with love
 */

namespace Jonlil\CKFinderBundle\Twig;

use Symfony\Component\Routing\RouterInterface;

class JonlilExtension extends \Twig_Extension
{
    protected $router;
    protected $parameters;

    public function __construct(RouterInterface $router, array $parameters)
    {
        $this->router = $router;
        $this->parameters = $parameters;
    }

    public function getFunctions()
    {
        return array(
            'ckfinder_service' => new \Twig_Function_Method($this, 'ckfinderService')
        );
    }

    public function ckfinderService()
    {
        return $this->router->generate('', array());
    }

    public function getName()
    {
        return 'jonlil_extension';
    }
}