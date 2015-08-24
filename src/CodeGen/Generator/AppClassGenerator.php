<?php
namespace CodeGen\Generator;
use ReflectionClass;
use ReflectionObject;
use ReflectionProperty;
use CodeGen\UserClass;

/** 
 * Generate UserClass for applciation based on the runtime object.
 */
class AppClassGenerator
{
    protected $options = array();

    public function __construct(array $options = array())
    {
        $this->options = array_merge(array(
            'prefix' => 'App',
            'property_filter' => ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PROTECTED,
        ), $options);
    }


    protected function isValueExportable($value)
    {
        return is_array($value) || is_scalar($value) || is_null($value);
    }

    public function generate($object, UserClass $userClass = null)
    {
        $reflObject = new ReflectionObject($object);

        if (!$userClass) {
            $className = $this->options['prefix'] . $reflObject->getShortName();
            if ($reflObject->inNamespace()) {
                $namespace = $reflObject->getNamespaceName();
                $className = $namespace . '\\' . $className;
            }
            $userClass = new UserClass($className);
            $userClass->extendClass($reflObject->getName());
        }

        $properties = $reflObject->getProperties($this->options['property_filter']);
        foreach ($properties as $reflProperty) {
            $reflProperty->setAccessible(true);

            $propertyName = $reflProperty->getName();
            $propertyValue = $reflProperty->getValue($object);


            // check if the property value is exportable
            // $propertyValue
            if (!$this->isValueExportable($propertyValue)) {
                continue;
            }

            if ($reflProperty->isPublic()) {
                $userClass->addPublicProperty($propertyName, $propertyValue);
            } else if ($reflProperty->isProtected()) {
                $userClass->addProtectedProperty($propertyName, $propertyValue);
            }
            // $appClass->addPublicProperty('files', $this->files);
        }
        return $userClass;
    }
}




