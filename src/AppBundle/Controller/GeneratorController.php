<?php
// src/AppBundle/Controller/GeneratorController.php
namespace AppBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
 
class GeneratorController extends Controller
{
    /**
     * @Route("/raspuns/html")
     */
    public function raspunsHtmlAction()
    {
        $number = rand(0, 100);
 
        return new Response(
            '<html><body>Acesta este numarul generat: '.$number.'</body></html>'
        );
    }
	
	/**
     * @Route("/raspuns/json/{numar}")
     */
    public function raspunsJsonAction($numar)
    {
        $data = array();
        for ($i = 1; $i <= $numar; $i++) {
            $data['numar_generat'.$i] = rand(0, 100);
        }
 
        return new Response(
            json_encode($data),
            200,
            array('Content-Type' => 'application/json')
        );
    } 

/**
     * @Route("/raspuns/htmlmvc")
     */
    public function raspunsHtmlMvcAction()
    {
        $number1 = rand(0, 100);
		$number2 = rand(0, 100);
 
        return $this->render(
            'Generator/raspunsHtml.html.twig',
            array('num1' => $number1, 'num2' => $number2, )
        );
    }    	
 
}