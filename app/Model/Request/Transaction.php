<?php

/**
 * @OA\Schema(
 *      title="Transaction",
 *      description="Transaction body data",
 *      type="object"
 * )
 */
class Transaction
{
    /**
     * @OA\Property(
     *      title="bank",
     *      description="Código del Banco",
     *      example="banco"
     * )
     *tipo_doc
     * @var int
     */
    public $bank;

    /**
     * @OA\Property(
     *      title="doc_type",
     *      description="(CC,CE,PPN,SSN,LIC,NIT,DNI)",
     *      example="CC"
     * )
     *
     * @var string
     */
    public $doc_type;

    /**
     * @OA\Property(
     *      title="doc_number",
     *      description="Número de identificación",
     *      example="0000AB"
     * )
     *
     * @var string
     */
    public $doc_number;

    /**
     * @OA\Property(
     *      title="name",
     *      description="Nombres del usuario",
     *      example="Nombres de usuario"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="email",
     *      description="Email del usuario",
     *      example="Correo electrónico del usuario"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="cell_phone",
     *      description="Número de celular del usuario",
     *      example="+570000"
     * )
     *
     * @var string
     */
    public $cell_phone;

    /**
     * @OA\Property(
     *      title="invoice",
     *      description="Numero de factura",
     *      example="FA0000"
     * )
     *
     * @var string
     */
    public $invoice;


    /**
     * @OA\Property(
     *      title="value",
     *      description="Valor total de la compra, si se calcula el iva y base iva debe ser coincidir con la suma del baseiva + iva",
     *      example="1000000"
     * )
     *
     * @var string
     */
    public $value;

    /**
     * @OA\Property(
     *      title="type_person",
     *      description="Tipo de Persona",
     *      example="0"
     * )
     *
     * @var string
     */
    public $type_person;

    /**
     * @OA\Property(
     *      title="url_response",
     *      description="Url de respuesta final de la transacción, donde el cliente será redireccionado después de finalizar la compra en la pasarela de pagos",
     *      example="/"
     * )
     *
     * @var string
     */
    public $url_response;
}
