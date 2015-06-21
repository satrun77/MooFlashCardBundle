<?php

/*
 * This file is part of the Moo\FlashCardBundle package.
 *
 * (c) Mohamed Alsharaf <mohamed.alsharaf@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Moo\FlashCardBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture as DectrineAbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Moo\FlashCardBundle\Entity;

/**
 * AbstractFixture contains abstracted/helper methods that are needed for the load fixture classes.
 *
 * @author Mohamed Alsharaf <mohamed.alsharaf@gmail.com>
 */
abstract class AbstractFixture extends DectrineAbstractFixture implements OrderedFixtureInterface
{
    /**
     * Helper method to create a card.
     *
     * @param string                               $title
     * @param \Moo\FlashCardBundle\Entity\Category $category
     * @param string                               $content
     * @param string                               $keywords
     * @param string                               $description
     * @param string                               $slug
     * @param bool                                 $isActive
     * @param int                                  $views
     *
     * @return \Moo\FlashCardBundle\Entity\Card
     */
    protected function createCard(
        $title,
        $category,
        $content,
        $keywords,
        $description,
        $slug = null,
        $isActive = true,
        $views = 0
    ) {
        $card = new Entity\Card();
        $card->setCreated();
        $card->setTitle($title);
        $card->setCategory($category);
        $card->setContent($content);
        $card->setActive($isActive);
        $card->setMetaKeywords($keywords);
        $card->setMetaDescription($description);
        if ($slug !== null) {
            $card->setSlug($slug);
        }
        $card->setViews($views);

        return $card;
    }

    /**
     * Helper method to create a category.
     *
     * @param string $title
     * @param string $description
     * @param null   $parent
     * @param bool   $isActive
     *
     * @return Entity\Category
     */
    protected function createCategory($title, $description, $parent = null, $isActive = true)
    {
        $category = new Entity\Category();
        $category->setCreated();
        $category->setDescription($description);
        $category->setActive($isActive);
        $category->setTitle($title);
        $category->setParent($parent);

        return $category;
    }

    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}
