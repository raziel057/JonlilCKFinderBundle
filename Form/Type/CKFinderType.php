<?php
/**
 * User: jonas
 * Date: 2013-03-02
 * Time: 17:27
 *
 * Use with love
 */

namespace Jonlil\CKFinderBundle\Form\Type;


use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;


class CKFinderType extends CKEditorType
{
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        parent::buildView($view, $form, $options);
    }


    public function getName()
    {
        return 'ckfinder';
    }
}