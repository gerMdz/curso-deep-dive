<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;

class IsMAcArgumentValueResolver implements ArgumentValueResolverInterface
{

    public function supports(Request $request, ArgumentMetadata $argument)
    {
        return $argument->getName() === 'isMac';
    }

    public function resolve(Request $request, ArgumentMetadata $argument)
    {
        $userAgent = $request->headers->get('User-Agent');
        yield stripos($userAgent, 'Linux') !== false;
//        $request->attributes->set('isMac', $isMac);
    }
}