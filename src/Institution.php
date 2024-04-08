<?php namespace Kattatzu\Sbif;

/**
 * Class Institution
 * @package Kattatzu\Sbif
 */
class Institution
{
    /**
     * @var array atributos de la institución
     */
    private $data = [];
    /**
     * @var array lista de instituciones bancarias registradas en la SBIF
     */
    private $institutions = [
        '001' => 'Banco de Chile',
        '009' => 'Banco Internacional',
        '014' => 'Scotiabank Chile',
        '016' => 'Banco de Credito E Inversiones',
        '028' => 'Banco Bice',
        '031' => 'HSBC Bank (chile)',
        '037' => 'Banco Santander-chile',
        '039' => 'Itaú Corpbanca',
        '049' => 'Banco Security',
        '051' => 'Banco Falabella',
        '053' => 'Banco Ripley',
        '054' => 'Rabobank Chile',
        '055' => 'Banco Consorcio',
        '056' => 'Banco Penta',
        '504' => 'Banco BBVA',
        '059' => 'Banco BTG Pactual Chile',
        '012' => 'Banco del Estado de Chile',
        '017' => 'Banco Do Brasil S.A.',
        '041' => 'JP Morgan Chase Bank, N. A.',
        '043' => 'Banco de la Nacion Argentina',
        '045' => 'The Bank of Tokyo-mitsubishi UFJ',
        '060' => 'China Construction Bank'
    ];

    /**
     * Constructor
     *
     * @param $response
     */
    public function __construct($response = null)
    {
        if ($response) {
            $this->data = [
                'code' => $response->Institucion->CodigoInstitucion,
                'name' => $response->Perfil->nombre,
                'swift_code' => $response->Perfil->codigoSWIFT,
                'rut' => $response->Perfil->rut,
                'address' => $response->Perfil->direccionPrincipal,
                'phone' => $response->Perfil->telefono,
                'website' => $response->Perfil->direccionWeb,
                'public_contact' => $response->Perfil->contactoPublico,
                'public_address' => $response->Perfil->direccionPublico,
                'public_phone' => $response->Perfil->telefonoPublico,
                'branches' => $response->Perfil->sucursales,
                'employees' => $response->Perfil->empleados,
                'publication_date' => $response->Perfil->fechaPublicacion,
                'cashiers' => $response->Perfil->cajeros,
            ];
        }
    }

    /**
     * Retorna los datos de la institución en un array
     *
     * @return array
     */
    public function toArray()
    {
        return $this->data;
    }

    /**
     * Retorna un atributo de la institución
     *
     * @param $varName
     * @return mixed|null
     */
    public function __get($varName)
    {
        return isset($this->data[$varName]) ? $this->data[$varName] : null;
    }

    /**
     * Retorna el listado de instituciones registradas en la SBIF
     *
     * @return array
     */
    public function getInstitutions()
    {
        return $this->institutions;
    }
}
