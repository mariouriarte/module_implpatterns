<?php

namespace App\Dto\Transformer;

abstract class AbstractResponseDtoTransformer implements ResponseDtoTransformerInterface
{
    public function transformFromObjects(iterable $objects): array
    {
        $dto = [];

        foreach ($objects as $object) {
            $dto[] = $this->transformFromObject($object);
        }

        return $dto;
    }
}
