<?php
/**
 * Created by PhpStorm.
 * User: ikows
 * Date: 05/11/18
 * Time: 11:47
 */

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i<=50; $i++)
        {
            $article = new Article();
            $article->setTitle($faker->sentence(3));
            $article->setContent($faker->paragraph(5));
            $article->setCategory($this->getReference('categorie_'. random_int(0,4)));
            $manager->persist($article);
        }


        $manager->flush();
    }

    public function getDependencies()
    {
        return [CategoryFixtures::class];
    }
}