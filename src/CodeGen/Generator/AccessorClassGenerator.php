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
            'scalar_type_hint' => false,
            'property_filter' => null,
        ), $options);
    }

    protected function isScalarType($typeName)
    {
        return in_array($typeName, ['string', 'int', 'boolean', 'double', 'float']);
    }


    protected function buildUserClassFromObject($object)
    {
        $reflObject = new ReflectionObject($object);

        if (isset($this->options['class_name'])) {
            $className = $this->options['class_name'];
        } else if (isset($this->options['prefix'])) {
            $className = $this->options['prefix'] . $reflObject->getShortName();
        } else {
            throw new Exception('Neither class name or prefix is not defined.');
        }

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

            $propertyName = $reflProperty->getName();

            $docComment = $reflProperty->getDocComment();
            if (!preg_match('/@synthesize/', $docComment)) {
                continue;
            }

            $propertyNameVar = new Variable('$' . $propertyName);

            if (preg_match('/@var (\w+)\[\]/',$docComment, $matches)) {
                $methodName = 'add' . Inflector::classify(Inflector::singularize($propertyName));
                $userClass->addMethod('public', $methodName, ["\$entry"], [ 
                    "\$this->{$propertyName}[] = \$entry;",
                ]);

                $methodName = 'remove' . Inflector::classify(Inflector::singularize($propertyName));
                $userClass->addMethod('public', $methodName, ["\$entry"], [ 
                    "\$pos = array_search(\$entry, \$this->{$propertyName}, true);",
                    "if (\$pos !== -1) {",
                    "    unset(\$this->{$propertyName}[\$pos]);",
                    "    return true;",
                    "}",
                    "return false;"
                ]);
            } else if (preg_match('/@var (\w+)\[(\w+)\]/',$docComment, $matches)) {
                $keyTypeHint = $matches[1];
                $valueTypeHint = $matches[2];

                if (!$this->options['scalar_type_hint']) {
                    if ($this->isScalarType($keyTypeHint)) {
                        $keyTypeHint = null;
                    }
                    if ($this->isScalarType($valueTypeHint)) {
                        $valueTypeHint = null;
                    }
                }

                $methodName = 'add' . Inflector::classify(Inflector::singularize($propertyName));
                $userClass->addMethod('public', $methodName, [
                    join(' ',array_filter([$keyTypeHint, '$key'])),
                    join(' ',array_filter([$valueTypeHint,'$entry'])),
                ],[ 
                    "\$this->{$propertyName}[\$key] = \$entry;",
                ]);

                $methodName = 'remove' . Inflector::classify(Inflector::singularize($propertyName));
                $userClass->addMethod('public', $methodName, [
                    join(' ',array_filter([$keyTypeHint, '$key'])),
                ], [ 
                    "unset(\$this->{$propertyName}[\$key]);",
                    "return true;"
                ]);



            }

            // Add scalar setter and getter
            $setterName = 'set' . Inflector::classify($propertyName);
            $getterName = 'get' . Inflector::classify($propertyName);

            $userClass->addMethod('public', $setterName, [$propertyNameVar], [ 
                "\$this->$propertyName = " . $propertyNameVar . ';',
            ]);
            $userClass->addMethod('public', $getterName, [], [ 
                "return \$this->$propertyName;",
            ]);
        }
        return $userClass;
    }
}




