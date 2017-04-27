<?php

namespace Breeze\Auth\Mutation;

use Breeze\Auth\Context\CreateToken;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;
use Youshido\GraphQL\Type\Scalar\StringType;

 /**
 * Class Login
 */
class Login extends AbstractField
{
    /**
     * @var CreateToken
     */
    private $createToken;

    /**
     * Login constructor.
     * @param CreateToken $createToken
     */
    public function __construct(CreateToken $createToken)
    {
        $this->createToken = $createToken;

        parent::__construct();
    }

    /**
     * @return StringType
     */
    public function getType()
    {
        return new StringType();
    }

    /**
     * @param FieldConfig $config
     * @return void
     */
    public function build(FieldConfig $config)
    {
        $config->addArgument('username', new StringType());
        $config->addArgument('password', new StringType());
    }

    /**
     * @param $value
     * @param array $args
     * @param ResolveInfo $info
     * @return string
     */
    public function resolve($value, array $args, ResolveInfo $info)
    {
        return $this->createToken->create($args['username'], $args['password']);
    }
}
