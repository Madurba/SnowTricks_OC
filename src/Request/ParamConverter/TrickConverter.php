<?php

namespace App\Request\ParamConverter;

use App\Entity\Tricks;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;

class TrickConverter implements ParamConverterInterface
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function apply(Request $request, ParamConverter $configuration)
    {
        
    }

    public function supports(ParamConverter $configuration)
    {
        return $configuration->getClass() === Tricks::class;
    }
}
