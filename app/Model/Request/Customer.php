<?php
/**
 * @OA\Schema(
 *      title="Customer",
 *      description="Customer body data",
 *      type="object"
 * )
 */
class Customer {
    /**
     * @OA\Property(
     *      title="user_id",
     *      description="user_id of the Customer",
     *      example="1"
     * )
     *
     * @var integer
     */
    public $user_id;


    /**
     * @OA\Property(
     *      title="nit",
     *      description="commerce_id of the Customer",
     *      example="1"
     * )
     *
     * @var integer
     */
    public $commerce_id;
   
}

