<?php

// アトリビュート class

#[Attribute(Attribute::TARGET_CLASS)]
class MyAttribute
{
    public function __construct(public string $value)
    {
    }
}

#[MyAttribute(value: 1234)]
class Thing
{
}

dumpAttributeData(new ReflectionClass(Thing::class));


// TARGET_CLASS のアトリビュートを関数に指定した場合

#[MyAttribute(5678)]
function foo() {
}

$fooReflection = new ReflectionFunction('foo');

foreach ($fooReflection->getAttributes() as $attribute) {
    var_dump($attribute->getName());
    var_dump($attribute->getArguments());

    // MyAttributeは TARGET_CLASS なので、
    // newInstance() 呼び出し時に例外がスローされる
    // var_dump($attribute->newInstance());
}


// アトリビュートの繰り返し利用について

#[Attribute(Attribute::TARGET_CLASS)]
class OneTimeAttribute
{
}

// Attribute::IS_REPEATABLE が指定されていないので、同じ属性を複数回指定するとエラーになる
// #[OneTimeAttribute]
#[OneTimeAttribute]
class Foo
{
}

dumpAttributeData(new ReflectionClass(Foo::class));

#[Attribute(Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
class RepeateAttribute
{
}

// Attribute::IS_REPEATABLE が指定されているので、同じ属性を複数回使える
#[RepeateAttribute]
#[RepeateAttribute]
class Bar
{
}

dumpAttributeData(new ReflectionClass(Bar::class));


function dumpAttributeData($reflection) {
    $attributes = $reflection->getAttributes();

    foreach ($attributes as $attribute) {
       var_dump($attribute->getName());
       var_dump($attribute->getArguments());
       var_dump($attribute->newInstance());
    }
}
