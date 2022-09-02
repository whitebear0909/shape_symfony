<?php

namespace App\Controller\Api;

use Throwable;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

use App\Services\ShapeService;

class ShapesController
{
    #[Route('/api/{s_type}/{a_or_radius}/{b}/{c}')]
    public function index($s_type, $a_or_radius = null, $b = null, $c = null): Response
    {
        try {
            $shape = ShapeService::getInstance($s_type);
            $shape->setAttributes($a_or_radius, $b, $c);
            
            $surface = $shape->surface();
            $circumference = $shape->circumference();

            $data = [];

            if($s_type == 'circle') $data = [
                "type" => $shape->getType(),
                "radius" => $a_or_radius,
                "surface" => $surface,
                "circumference" => $circumference,
            ];
            else $data = [
                "type" => $shape->getType(),
                "a" => $a_or_radius,
                "b" => $b,
                "c" => $c,
                "surface" => $surface,
                "circumference" => $circumference,
            ];

            $response = [
                "success" => true,
                "data" => $data
            ];

            return new JsonResponse($response);
        } catch (Throwable $throwable) {
            $response = [
                "success" => false,
                "message" => $throwable->getMessage(),
                "data" => null
            ];
            return new JsonResponse($response, 500);
        }
    }
}