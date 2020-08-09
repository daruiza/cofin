<?php
/**
 * @OA\Schema(
 *      title="Commerce",
 *      description="Commerce body data",
 *      type="object"
 * )
 */
class Commerce {
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the user",
     *      example="TempoSolutions"
     * )
     *
     * @var string
     */
    public $name;


    /**
     * @OA\Property(
     *      title="department",
     *      description="Department of the commerce",
     *      example="Antioquia"
     * )
     *
     * @var string
     */
    public $department;

    /**
     * @OA\Property(
     *      title="city",
     *      description="Name of the commerce",
     *      example="Medellin"
     * )
     *
     * @var string
     */
    public $city;

    /**
     * @OA\Property(
     *      title="adress",
     *      description="adress of the commerce",
     *      example="Cll 60 # 75 - 150"
     * )
     *
     * @var string
     */
    public $adress;

    /**
     * @OA\Property(
     *      title="description",
     *      description="description of the commerce",
     *      example="super"
     * )
     *
     * @var string
     */
    public $description;
    /**
     * @OA\Property(
     *      title="logo",
     *      description="Logo of the commerce",
     *      example="default.png"
     * )
     *
     * @var string
     */
    public $logo;

    /**
     * @OA\Property(
     *      title="currency",
     *      description="currency of the commerce",
     *      example="COP"
     * )
     *
     * @var string
     */
    public $currency;

    /**
     * @OA\Property(
     *      title="label",
     *      description="label of the commerce",
     *      example="{}}"
     * )
     *
     * @var string
     */
    public $label;

   
}

