<?php

namespace App\Repository;

use App\Entity\Contacto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method Contacto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contacto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contacto[]    findAll()
 * @method Contacto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry,EntityManagerInterface $manager)
    {
        parent::__construct($registry, Contacto::class);
        $this->manager= $manager;
    }
    public function saveContacto($data)

    {
         $newContacto = new Contacto();

         $newContacto
                    ->setName($name)
                    ->setEmail($email)
                    ->setMessage($message);  

        $this->manager->persist($newContacto);
        $this->manager->flush();

    }  

    public function updateContacto(Contacto $contacto):Contacto
    
    {
        $this->manager>persist($contacto);
        $this->manager->flush();

        return $contacto;
    } 

    public function removeContacto(Contacto $contacto):Contacto
    
    {
        $this->manager->remove($contacto);
        $this->manager->flush();

        return $contacto;
    }

    
}
    // /**
    //  * @return Contacto[] Returns an array of Contacto objects
    //  */
    /*
   