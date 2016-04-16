<?php
namespace CodeGen\Generator;
use Doctrine\Common\Inflector\Inflector;
use CodeGen\UserClass;
use CodeGen\Variable;
use ReflectionObject;
use ReflectionProperty;

/**
 * Generate UserClass for applciation based on the runtime object.
 */
class AccessorClassGenerator
{
    protected $properties;

    public function __construct(array $options = array())
    {
        $this->options = array_merge(array(
            'namespace' => null,
            'prefix' => 'App',
            'reflection_property_filter' => ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PROTECTED,
            'property_filter' => null,
        ), $options);
    }

    protected function buildUserClassFromObject($object)
    {
        $reflObject = new ReflectionObject($object);
            $className = $this->options['prefix'] . $reflObject->getShortName();
            if (!$this->options['namespace'] && $reflObject->inNamespace()) {
                $namespace = $reflObject->getNamespaceName();
                $className = '\\' . $namespace . '\\' . $className;
            } else {
                $className = $this->options['namespace'] . '\\' . $className;
            }
            $userClass = new UserClass($className);
            $userClass->extendClass('\\' . $reflObject->getName(), false);
            return $userClass;
    }

    public function generate($object, UserClass $userClass = null)
    {
        if (!$userClass) {
            $userClass = $this->buildUserClassFromObject($object);
        }

        $reflObject = new ReflectionObject($object);
        $properties = $reflObject->getProperties($this->options['reflection_property_filter']);
        $propertyFilter = $this->options['property_filter'];
        foreach ($properties as $reflProperty) {
            $reflProperty->setAccessible(true);

            if ($propertyFilter && !$propertyFilter($reflProperty)) {
                continue;
            }

            if ($propertyName = $reflProperty->getName()) {
                $docComment = $reflProperty->getDocComment();
                if (!preg_match('/@synthesize/', $docComment)) {
                    continue;
                }


                $propertyIsArray = false;
                if (preg_match('/@var (string)\[\]/',$docComment)) {
                    $propertyIsArray = true;
                    // push value
                    $methodName = 'add' . Inflector::classify(Inflector::singularize($propertyName));
                    $userClass->addMethod('public', $methodName, [$propertyNameVar], [ 
                        "\$this->{$propertyName}[] = " . $propertyNameVar . ';',
                    ]);

                    // push value
                    $methodName = 'remove' . Inflector::classify(Inflector::singularize($propertyName));
                    $userClass->addMethod('public', $methodName, [$propertyNameVar], [ 
                        "\$pos = array_search($propertyNameVar, \$this->{$propertyName}, true);",
                        "if (\$pos !== -1) {",
                        "    unset(\$this->{$propertyName}[\$pos]);",
                        "    return true;",
                        "}",
                        "return false;"
                    ]);
                }

                // Add scalar setter and getter
                $setterName = 'set' . Inflector::classify($propertyName);
                $getterName = 'get' . Inflector::classify($propertyName);

                $propertyNameVar = new Variable('$' . $propertyName);
                $userClass->addMethod('public', $setterName, [$propertyNameVar], [ 
                    "\$this->$propertyName = " . $propertyNameVar . ';',
                ]);
                $userClass->addMethod('public', $getterName, [], [ 
                    "return \$this->$propertyName;",
                ]);

            }
        }
        return $userClass;
    }
}




