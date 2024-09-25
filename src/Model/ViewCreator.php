<?php

namespace Odb\AgGridUxBundle\Model;


trait ViewCreator
{
    public function createView() : array
    {
        return self::extract($this);
    }

    public static function extract(object $object): array
    {
        $reflect = new \ReflectionClass($object);
        $reflexionProperties = $reflect->getProperties();
        $properties = [];
        foreach ($reflexionProperties as $reflexionProperty) {
            $property = $reflexionProperty->getName();
            if(in_array($property, [ 'attributes', 'theme'], true)) {
                continue;
            }
            $getter = 'get' . ucfirst($property);
            $value = null;
            if(method_exists($object, $getter)) {
                $value = $object->$getter();

            } else {
                $getter = 'is' . ucfirst($property);
                if(method_exists($object, $getter)){
                    $value = $object->$getter();
                }
            }

            if(!is_null($value) || (is_array($value) && !empty($value))) {
                if($property === 'columnDefs') {
                    $isCollection = false;
                    foreach ($value as $columnDef) {
                        if($columnDef instanceof AgGridObjectInterface) {
                            $isCollection = true;
                            $properties[$property][] = $columnDef->createView();
                        }
                    }

                    if(!$isCollection) {
                        $properties[$property] = $value;
                    }
                } elseif ($value instanceof AgGridObjectInterface) {
                    $properties[$property] = $value->createView();
                } else {
                    $properties[$property] = $value;
                }
            }
        }
        return $properties;
    }
}