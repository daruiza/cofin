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
     *      title="banco",
     *      description="Código del Banco",
     *      example="banco"
     * )
     *tipo_doc
     * @var int
     */
    public $banco;

    /**
     * @OA\Property(
     *      title="tipo_doc",
     *      description="(CC,CE,PPN,SSN,LIC,NIT,DNI)",
     *      example="CC"
     * )
     *
     * @var string
     */
    public $tipo_doc;

    /**
     * @OA\Property(
     *      title="documento",
     *      description="Número de identificación",
     *      example="0000AB"
     * )
     *
     * @var string
     */
    public $documento;

    /**
     * @OA\Property(
     *      title="nombres",
     *      description="Nombres del usuario",
     *      example="Nombres de usuario"
     * )
     *
     * @var string
     */
    public $nombres;

    /**
     * @OA\Property(
     *      title="apellidos",
     *      description="Apellidos del usuario",
     *      example="Apellido de usuario"
     * )
     *
     * @var string
     */
    public $apellidos;

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
     *      title="pais",
     *      description="País en formato ISO ejemplo: Colombia = CO",
     *      example="CO"
     * )
     *
     * @var string
     */
    public $pais;

    /**
     * @OA\Property(
     *      title="depto",
     *      description="Departamento/Estado/Región del usuario ejemplo: Antioquia",
     *      example="Antioquia"
     * )
     *
     * @var string
     */
    public $depto;

    /**
     * @OA\Property(
     *      title="ciudad",
     *      description="Ciudad de residencia del usuario ejemplo: Medellín",
     *      example="Medellín"
     * )
     *
     * @var string
     */
    public $ciudad;

    /**
     * @OA\Property(
     *      title="celular",
     *      description="Número de celular del usuario",
     *      example="+570000"
     * )
     *
     * @var string
     */
    public $celular;

    /**
     * @OA\Property(
     *      title="direccion",
     *      description="Dirección de residencia u oficina",
     *      example="Cll 0 #0-0"
     * )
     *
     * @var string
     */
    public $direccion;

    /**
     * @OA\Property(
     *      title="factura",
     *      description="Numero de factura",
     *      example="FA0000"
     * )
     *
     * @var string
     */
    public $factura;

    /**
     * @OA\Property(
     *      title="descripcion",
     *      description="Descipción del producto",
     *      example="Descipción del producto"
     * )
     *
     * @var string
     */
    public $descripcion;

    /**
     * @OA\Property(
     *      title="iva",
     *      description="iva factura, si no se calcula mandar el valor en 0",
     *      example="0"
     * )
     *
     * @var string
     */

    public $iva;

    /**
     * @OA\Property(
     *      title="baseiva",
     *      description="Base iva de la factura,es la base del producto a vender",
     *      example="0"
     * )
     *
     * @var string
     */
    public $baseiva;

    /**
     * @OA\Property(
     *      title="valor",
     *      description="Valor total de la compra, si se calcula el iva y base iva debe ser coincidir con la suma del baseiva + iva",
     *      example="1000000"
     * )
     *
     * @var string
     */
    public $valor;

    /**
     * @OA\Property(
     *      title="moneda",
     *      description="Moneda predeterminada COP (Peso colombiano)",
     *      example="COP"
     * )
     *
     * @var string
     */
    public $moneda;

    /**
     * @OA\Property(
     *      title="i",
     *      description="vector de inicialización, puede ser estático o dinámico siempre de 16 carcteres, enviarlo codificao en base 64",
     *      example="COP"
     * )
     *
     * @var string
     */
    public $i;

    /**
     * @OA\Property(
     *      title="enpruebas",
     *      description="modo prueba=(TRUE), modo producción=(FALSE)",
     *      example="TRUE"
     * )
     *
     * @var string
     */
    public $enpruebas;

    /**
     * @OA\Property(
     *      title="lenguaje",
     *      description="lenguaje del cliente utilizado para hacer la petición a la rest(javascript,php, java, .net, ios, anroid, etc)",
     *      example="php"
     * )
     *
     * @var string
     */
    public $lenguaje;

    /**
     * @OA\Property(
     *      title="url_respuesta",
     *      description="Url de respuesta final de la transacción, donde el cliente será redireccionado después de finalizar la compra en la pasarela de pagos",
     *      example="/"
     * )
     *
     * @var string
     */
    public $url_respuesta;

    /**
     * @OA\Property(
     *      title="url_confirmacion",
     *      description="Url de confirmación de la transacción donde se enviarán variables de respuesta confirmando la aceptación o negación de la transacción en caso de que la misma quede pendiente",
     *      example="/"
     * )
     *
     * @var string
     */
    public $url_confirmacion;

    /**
     * @OA\Property(
     *      title="metodoconfirmacion",
     *      description="Método (POST O GET) para enviar las variables de confirmación de la transacción",
     *      example="POST"
     * )
     *
     * @var string
     */
    public $metodoconfirmacion;


}
