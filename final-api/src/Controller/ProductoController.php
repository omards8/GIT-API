<?php

namespace App\Controller;
use App\Repository\ProductoRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ProductoController extends AbstractController
{
    private $ProductoRepository;

    public function __construct(ProductoRepository $ProductoRepository)
    {
        $this->ProductoRepository = $ProductoRepository;
    }
    /**
     * @Route("/producto", name="add_producto",methods={"POST"})
     */

    public function addProducto(Request $request): JsonResponse
    {
        $data=json_decode($request->getContent(), true);

        $nombre = $data['nombre'];
        $procesador = $data['procesador'];
        $pantalla = $data['pantalla'];
        $camara = $data['camara'];
        $bateria = $data['bateria'];
        $imagen = $data['imagen'];
        $conectividad = $data['conectividad'];
        $tipo = $data['tipo'];
        
        $this ->ProductoRepository->saveProducto($nombre,$procesador,$pantalla,$camara, $bateria,$imagen,$conectividad,$tipo);
        return new JsonResponse(['status'=>'Producto CREADO!'], Response::HTTP_CREATED);

    }
    /**
     * @Route("/producto/{id}", name="get_one_producto", methods={"GET"})
     */
    public function getProducto($id): JsonResponse
    {
        $producto = $this->ProductoRepository->findOneBy(['id'=>$id]);
            $data = [
                'id' => $producto->getId(),
                'nombre' => $producto->getNombre(),
                'pantalla' => $producto->getPantalla(),
                'procesador' => $producto->getProcesador(),
                'camara' => $producto->getCamara(),
                'bateria' => $producto->getBateria(),
                'imagen' => $producto->getImagen(),
                'conectividad' => $producto->getConectividad(),
                'tipo' => $producto->getTipo(),
            ];

            return new JsonResponse($data, Response::HTTP_OK);
    }
    /**
     * @Route("/productos", name="get_all_productos", methods={"GET"})
     */
    public function getAll(): JsonResponse
    {
        $productos = $this->ProductoRepository->findAll();
        $data =[];

        foreach ($productos as $producto) {
            $data[] = [
                'id' => $producto->getId(),
                'nombre' => $producto->getNombre(),
                'pantalla' => $producto->getPantalla(),
                'procesador' => $producto->getProcesador(),
                'camara' => $producto->getCamara(),
                'bateria' => $producto->getBateria(),
                'imagen' => $producto->getImagen(),
                'conectividad' => $producto->getConectividad(),
                'tipo' => $producto->getTipo(),
            ];
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }
    /**
     * @Route("/producto/{id}", name="update_producto", methods={"PUT"})
     */
    public function updateProducto($id, Request $request): JsonResponse
    {
        $producto = $this->ProductoRepository->findOneBy(['id' => $id]);
        $data = json_decode($request->getContent(), true);

        empty($data['id']) ? true : $producto->setId($data['id']);
        empty($data['nombre']) ? true : $producto->setNombre($data['nombre']);
        empty($data['procesador']) ? true : $producto->setProcesador($data['procesador']);
        empty($data['pantalla']) ? true : $producto->setPantalla($data['pantalla']);
        empty($data['camara']) ? true : $producto->setCamara($data['camara']);
        empty($data['bateria']) ? true : $producto->setBateria($data['bateria']);
        empty($data['imagen']) ? true : $producto->setImagen($data['imagen']);
        empty($data['conectividad']) ? true : $producto->setConectividad($data['conectividad']);
        empty($data['tipo']) ? true : $producto->setTipo($data['tipo']);

        $updatedProducto = $this->ProductoRepository->updateProducto($producto);

        return new JsonResponse(['status' => 'Producto ACTUALIZADO!'], Response::HTTP_OK);
    }

    /**
     * @Route("/producto/{id}", name="delete_productos", methods={"DELETE"})
     */
    public function deleteProducto($id): JsonResponse
    {
        $producto = $this->ProductoRepository->findOneBy(['id' => $id]);

        $this->ProductoRepository->removeProducto($producto);

        return new JsonResponse(['status'=> 'Producto ELIMINADO!'], Response::HTTP_OK);
    }
    /*   public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ProductosController.php',
        ]);
    } */


}
