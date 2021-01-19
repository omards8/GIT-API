<?php

namespace App\Repository;

use App\Entity\Producto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;


/**
 * @method Producto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Producto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Producto[]    findAll()
 * @method Producto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry,EntityManagerInterface $manager)

    {
        parent::__construct($registry, Producto::class);
        $this->manager= $manager;
    }

    public function saveProducto($nombre,$procesador,$pantalla,$camara,$bateria,$imagen,$conectividad,$tipo)
    {
        $newProducto = new Producto();

        $newProducto
                ->setNombre($nombre)
                ->setProcesador($procesador)
                ->setPantalla($pantalla)
                ->setCamara($camara)
                ->setBateria($bateria)
                ->setImagen($imagen)
                ->setConectividad($conectividad)
                ->setTipo($tipo);  

        $this->manager->persist($newProducto);
        $this->manager->flush();

    }  

    public function updateProducto(Producto $producto):Producto
    {
        $this->manager->persist($producto);
        $this->manager->flush();

        return $producto;
    } 

    public function removeProducto(Producto $producto):Producto
    {
        $this->manager->remove($producto);
        $this->manager->flush();

        return $producto;
    }
} 
    // /**
    //  * @return Producto[] Returns an array of Productos objects
    //  */
    /*