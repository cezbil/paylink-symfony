<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // symfony example code
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/fizzBuzz", name="fizzbuzz")
     */
    public function fizzBuzz(Request $request)
    {
        $fizzBuzz = $this->generateFizzBuzzArray();
        // render view for fizzbuzz
        return $this->render('fizzBuzz/fizzBuzz.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'fizzBuzzArray' => $fizzBuzz,
        ]);
    }
    /**
     * @return array
     */
    private function generateFizzBuzzArray($counter = 20) {
        $fizzBuzzArray = [];
        for ($i = 1; $i <= $counter; $i++) {
            $fizz =  (0 === $i % 3);
            $buzz =  (0 === $i % 5);

            if (!$fizz && !$buzz) {
                array_push($fizzBuzzArray, $i);
                continue;
            }

            if ($fizz && !$buzz) {
                array_push($fizzBuzzArray, 'Fizz');
                continue;
            }

            if ($buzz && !$fizz) {
                array_push($fizzBuzzArray, 'Buzz');
                continue;
            }

            if ($fizz && $buzz) {
                array_push($fizzBuzzArray, 'FizzBuzz');
                continue;
            }
        }
        return $fizzBuzzArray;

    }
}
