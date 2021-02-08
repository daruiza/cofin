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
     *      title="last_name",
     *      description="Apellidos del usuario",
     *      example="Apellido de usuario"
     * )
     *
     * @var string
     */
    public $last_name;

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
     *      title="country",
     *      description="País en formato ISO ejemplo: Colombia = CO",
     *      example="CO"
     * )
     *
     * @var string
     */
    public $country;
    
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
     *      title="description",
     *      description="Descipción del producto",
     *      example="Descipción del producto"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="tax",
     *      description="iva factura, si no se calcula mandar el valor en 0",
     *      example="0"
     * )
     *
     * @var string
     */

    public $tax;

    /**
     * @OA\Property(
     *      title="tax_base",
     *      description="Base iva de la factura,es la base del producto a vender",
     *      example="0"
     * )
     *
     * @var string
     */
    public $tax_base;

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
     *      title="currency",
     *      description="Moneda predeterminada COP (Peso colombiano)",
     *      example="COP"
     * )
     *
     * @var string
     */
    public $currency;

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

    /**
     * @OA\Property(
     *      title="url_confirmation",
     *      description="Url de confirmación de la transacción donde se enviarán variables de respuesta confirmando la aceptación o negación de la transacción en caso de que la misma quede pendiente",
     *      example="/"
     * )
     *
     * @var string
     */
    public $url_confirmation;

    /**
     * @OA\Property(
     *      title="method_confirmation",
     *      description="Método (POST O GET) para enviar las variables de confirmación de la transacción",
     *      example="POST"
     * )
     *
     * @var string
     */
    public $method_confirmation;


}
