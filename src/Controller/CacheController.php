<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class CacheController extends AbstractController
{
    #[Route('/cache', name: 'cache_index')]
    public function index(
        CacheInterface $cache
    ): Response
    {
        $result = $cache->get('some_key', function(ItemInterface $item){
            $item->expiresAfter(3600);
            return 'Cache result';
        });
        return new Response($result);
    }
}