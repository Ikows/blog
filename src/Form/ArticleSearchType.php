<?php
/**
 * Created by PhpStorm.
 * User: ikows
 * Date: 13/11/18
 * Time: 11:36
 */
namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ArticleSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('searchField');
    }
}
