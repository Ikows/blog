<?php
/**
 * Created by PhpStorm.
 * User: ikows
 * Date: 05/11/18
 * Time: 11:26
 */

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{

    private $categories = [
        'PHP',
        'Java',
        'Python',
        'JavaScript',
        'Ruby'
    ];

    public function load(ObjectManager $manager)
    {
        foreach ($this->categories as $key => $categoryName)
        {
            $category = new Category();
            $category->setName($categoryName);
            $manager->persist($category);
            $this->addReference('categorie_' . $key, $category);
        }

        $manager->flush();
    }
}