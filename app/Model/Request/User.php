<?php
/**
 * @OA\Schema(
 *      title="User",
 *      description="User body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class User {    
    /**
     * @OA\Property(
     *      title="email",
     *      description="Email of the user",
     *      example="super@yopmail.com"
     * )
     *
     * @var string
     */
    public $email;
     /**
     * @OA\Property(
     *      title="password",
     *      description="Password of the user",
     *      example="0000"
     * )
     *
     * @var string
     */
    public $password;
}