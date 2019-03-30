<?php

namespace App\Controller;

use App\Services\GitHubService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/get_some_data/{cacheTime}", name="get_some_data")
     */
    public function getSomeData(int $cacheTime, AdapterInterface $cache, GitHubService $github): Response
    {
        $item = $cache->getItem('some_data');
        if(!$item->isHit())
        {
            $item->set($github->getPublicGists());
            $item->expiresAfter($cacheTime);
            $cache->save($item);
        }
        $data = $item->get();

        return new Response($data);
    }
}
