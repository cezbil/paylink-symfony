<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Controller\ExtendableController;

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
     * @Route("/setGet", name="setget")
     */
    public function useProperty(Request $request)
    {
        $classWithProperty = new ClassWithProperty();
        $classWithProperty->property = 'Here we set some value of a private property using trait';
        $propertyForView = $classWithProperty->property; // here we get private property of
         // render view for setget
        return $this->render('setget/setGet.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'propertyForView' => $propertyForView,
        ]);
    }
    /**
     * @Route("/fibonacci", name="fibonacci")
     */
    public function renderFibonacci(Request $request)
    {
        $fibonacciGenerator = $this->fibonacci(10);
          // render view for fibonacci
        return $this->render('fibonacci/fibonacci.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'fibonacciGenerator' => $fibonacciGenerator,
        ]);
    }

    /**
     * @Route("/uml", name="uml")
     */
    public function showUml(Request $request)
    {
          // render view for uml
        return $this->render('uml/uml.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
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

    function fibonacci(int $q = null) {
        $currentIteration = 1;
        $previousIteration = 0;

        for ($i = 0; $i < $q; $i++) {
            yield $currentIteration;
            $temporaryVar = $currentIteration;
            $currentIteration = $previousIteration + $currentIteration;
            $previousIteration = $temporaryVar;
        }
    }
}
