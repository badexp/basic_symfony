<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/get_some_data/{cacheTime}", name="get_some_data")
     */
    public function getSomeData(int $cacheTime, AdapterInterface $cache): Response
    {
        $item = $cache->getItem('some_data');
        if(!$item->isHit())
        {
            // TODO: retrieve some_data from real service
            $item->set('');
            $item->expiresAfter($cacheTime);
            $cache->save($item);
        }
        $data = $item->get();

        return new Response($data);
    }
}
