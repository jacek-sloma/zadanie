<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\przystanek;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="zaproponujroute")
     */
    public function zaproponujAction()
    {
        return $this->render('default/zaproponuj.html.twig', []);
    }


    /**
     * @Route("/zapiszpropozycje", name="zapiszpropozycjeroute", methods={"POST"})
     */
    public function zapiszpropozycjeAction(Request $request)
    {
        
        $przystanek = new przystanek();
        $przystanek->setAdres($request->request->get('adres'));
        $przystanek->setOpis($request->request->get('opis'));
        $przystanek->setUserid(1);
        $przystanek->setCzyodczytano(FALSE);
        $przystanek->setDatadodania(new \DateTime("now"));

        //dump($request);die;

        for ($i=1; $i <4 ; $i++) { //dla każdego z pól formularza: zdjecie1, zdjecie2, zdjecie3
            $file = $request->files->get('zdjecie'.strval($i));
            
            //jeżeli nazwa zdjęcia nie jest pustym stringiem to dodajemy do nazwy losowy prefix i zapisujemy nową nazwę do bazy danych, a plik do wspólnego katalogu "zdjęcia".
            if ($file != NULL) {
                $losowyprefix = substr(sha1(rand()), 0, 10);
                $nowanazwapliku = $losowyprefix.($file->getClientOriginalName());
                $przystanek->setZdjecie($i,$nowanazwapliku);
                $file->move("zdjecia", $nowanazwapliku);
            }
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($przystanek);
        $em->flush();

        return $this->render('default/zapiszpropozycje.html.twig', []);
    }

    /**
     * @Route("/admin", name="adminroute")
     */
    public function adminAction()
    {
        $em = $this->getDoctrine()->getManager();
        $przystanki = $em->getRepository('AppBundle:przystanek')->findAll();

        return $this->render('default/admin.html.twig', ['przystanki' => $przystanki]);
    }


    /**
     * @Route("/eye.png", name="ikonka")
     */
    public function eye()
    {
        //mam problem z działaniem funkcji asset w twig, nie mam bespośredniego dostępu do folderu web, chwilowo wymyśliłem takie obejście, działa
        return new BinaryFileResponse("eye.png");
    }

    /**
     * @Route("/zdjecia/{foto}", name="foto")
     */
    public function pobierzfoto($foto)
    {
        return new BinaryFileResponse("zdjecia/".$foto);
    }

    //metoda POST w poniższym routingu jest użyta jako podstawowe zabezpieczenie przed zmianą wartości w bazie danych z wywołania w pasku adresu przeglądarki
    /**
     * @Route("/przeczytano/{id}", name="przeczytanoroute", methods={"POST"}))
     */
    public function przeczytano($id) 
    {
        $em = $this->getDoctrine()->getManager();
        $propozycja = $em->getRepository(przystanek::class)->find($id);
    
        $propozycja->setCzyodczytano(1);
        $em->flush();
        
        $response = new Response();
        $response->setStatusCode(Response::HTTP_OK);
        return $response;
    }

}
