<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeScreenController extends AbstractController
{
    /**
     * @Route("/home", name = "home_screen", methods = {"DELETE", "GET"})
     */
    public function index(Request $request): Response
    {
        return $this->json([
            'page' => $request->query->get(key: 'page'),
            'message' => 'Welcome to your new controller! Home',
            'path' => 'src/Controller/HomeScreenController.php',
        ]);
    }

    /**
     * @Route("/recipe/{id}", name = "all_recipies", methods = {"GET"})
     */
    public function recipe(Request $request, $id)
    {
        return $this->json([
            'message' => 'request recipe with id ' . $id,
            'page' => $request->query->get(key: 'page'),
            'path' => 'src/Controller/HomeScreenController.php'
        ]);
    }

    /**
     * @Route("recipes/all", name= "get_a_recipes", methods= {"GET"})
     */
    public function getAllRecipes()
    {
        $rootPath = $this->getParameter('kernel.project_dir');
        $recipes = file_get_contents($rootPath . '/resources/recipies.json');
        $decodedRecipes = json_decode($recipes);
        return $this->json($decodedRecipes);
    }

}
