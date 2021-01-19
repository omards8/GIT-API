<?php

namespace App\Controller;
use App\Repository\ContactoRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactoController extends AbstractController
{
    private $ContactoRepository;

    public function __construct(ContactoRepository $ContactoRepository)
    {
        $this->ContactoRepository = $ContactoRepository;
    }
    /**
     * @Route("/contacto", name="add_contacto", methods={"POST"})
     */
    public function addContacto(Request $request): JsonResponse

    {
        $data=json_decode($request->getContent(), true);

        $name = $data['name'];
        $email = $data['email'];
        $message = $data['message'];
        
        $this ->ContactoRepository->saveContacto($data);
        return new JsonResponse(['status'=>'Contacto creado!'], Response::HTTP_CREATED);
    }
     /**
     * @Route("/contacto/{id}", name="get_one_contacto", methods={"GET"})
     */
    public function getContacto($id): JsonResponse

    {
        $contacto = $this->ContactoRepository->findOneBy(['id'=>$id]);
            $data = [
                'id'=> $contacto->getId(),
                'name'=> $contacto->getName(),
                'email'=> $contacto->getEmail(),
                'message'=>$contacto->getMessage(),
            ];

            return new JsonResponse($data, Response::HTTP_OK);
    }
     /**
     * @Route("/contacto/{id}", name="update_contacto", methods={"PUT"})
     */
    public function updateContacto($id, Request $request): JsonResponse
    {
        $contacto = $this->ContactoRepository->findOneBy(['id' => $id]);
        $data = json_decode($request->getContent(), true);

        empty($data['id']) ? true : $contacto->setContacto($data['id']);
        empty($data['name']) ? true : $contacto->setContacto($data['name']);
        empty($data['email']) ? true : $contacto->setContacto($data['email']);
        empty($data['message']) ? true : $contacto->setContacto($data['message']);

        $updatedContacto = $this->ContactoRepository->updateContacto($contacto);

        return new JsonResponse(['status' => 'Contacto actualizado!'], Response::HTTP_OK);
    }
     /**
     * @Route("/contacto/{id}", name="delete_contacto", methods={"DELETE"})
     */
    public function deleteContacto($id): JsonResponse
    
    {
        $pet = $this->ContactoRepository->findOneBy(['id' => $id]);

        $this->ContactoRepository->removeContacto($contacto);

        return new JsonResponse(['status'=> 'Contacto eliminado!'], Response::HTTP_OK);
    }

}
