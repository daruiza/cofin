<?php
/**
 * @OA\Schema(
 *      title="Invoice",
 *      description="Invoice body data",
 *      type="object"
 * )
 */
class Invoice {
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the commerce",
     *      example="TempoSolutions"
     * )
     *
     * @var string
     */
    public $name;


    /**
     * @OA\Property(
     *      title="number",
     *      description="Nit of the Commerce",
     *      example="AB78546"
     * )
     *
     * @var string
     */
    public $number;


    /**
     * @OA\Property(
     *      title="description",
     *      description="Description of the invoice",
     *      example="Description"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="dateStart",
     *      description="dateStart of the invoice",
     *      example="2020-01-20"
     * )
     *
     * @var string
     */
    public $dateStart;

    /**
     * @OA\Property(
     *      title="dateEnd",
     *      description="dateEnd of the invoice",
     *      example="2020-12-20"
     * )
     *
     * @var string
     */
    public $dateEnd;
    
    /**
     * @OA\Property(
     *      title="loop",
     *      description="loop of the invoice",
     *      example="7"
     * )
     *
     * @var integer
     */
    public $loop;

    /**
     * @OA\Property(
     *      title="loopDate",
     *      description="loopDate of the invoice",
     *      example="2020-12-25"
     * )
     *
     * @var integer
     */
    public $loopDate;

    /**
     * @OA\Property(
     *      title="loopDay",
     *      description="loopDay of the invoice",
     *      example="1"
     * )
     *
     * @var integer
     */
    public $loopDay;

    /**
     * @OA\Property(
     *      title="customer_id",
     *      description="customer_id of the invoice",
     *      example="1"
     * )
     *
     * @var integer
     */
    public $customer_id;   

    /**
     * @OA\Property(
     *      title="invoice_detail",
     *      description="invoice_detail of the invoice",
     *      example={{"price":10000,"volume": 2,"description": "description"}, {"price":25000,"volume": 1,"description": "description"}}
     * )
     *
     * @var object
     */
    public $invoice_detail;
}
