<?php

namespace Breeze\Auth\Context;

use Firebase\JWT\JWT;
use Account\Document\User;

/**
 * Class CreateToken
 */
class CreateToken
{
    /** @var string */
    private $secretKey;

    /** @var string */
    private $serverName;

    /**
     * CreateToken constructor.
     * @param $secretKey
     * @param $serverName
     */
    public function __construct(string $secretKey, string $serverName)
    {
        $this->secretKey  = $secretKey;
        $this->serverName = $serverName;
    }

    /**
     * @param string $username
     * @param string $password
     * @return string
     */
    public function create(string $username, string $password): string
    {
        /** @var User $user */
        $user = null;

        if ($user->getUsername() === $username && $user->verifyPassword($password)) {
            $tokenId    = base64_encode(random_bytes(32));
            $issuedAt   = time();
            $notBefore  = $issuedAt + 10;
            $expire     = $notBefore + 60;

            $data = [
                'iat'  => $issuedAt,         // Issued at: time when the token was generated
                'jti'  => $tokenId,          // Json Token Id: an unique identifier for the token
                'iss'  => $this->serverName,
                'nbf'  => $notBefore,        // Not before
                'exp'  => $expire,           // Expire
                'data' => [                  // Data related to the signer user
                                             'userId' => $user->getId()
                ]
            ];

            $secretKey = base64_decode($this->secretKey);

            $jwt = JWT::encode($data, $secretKey, 'HS512');
        }

        return $jwt ?? '';
    }
}
