<?php

namespace Portal\Http\Helpers;


class LdapFunction
{
    protected $host;
    protected $port;
    protected $version;
    protected $dn;
    protected $domain;
    protected $user;
    protected $pass;
    protected $anonimo;
    protected $connection;
    protected $attributes;

    public function __construct()
    {
        # Configuracion
        $this->host 	= env('LDAP_HOST', '');
        $this->port 	= env('LDAP_PORT', '389');
        $this->version 	= env('LDAP_VERSION', 3);
        $this->dn 		= env('LDAP_DN', '');
        $this->domain 	= env('LDAP_DOMAIN', '');
        $this->user 	= env('LDAP_USER', '');
        $this->pass 	= env('LDAP_PASS', '');
        $this->anonimo 	= env('LDAP_ANONIMO', false);
        $this->attributes = explode(',', env('LDAP_ATTRIBUTES', 'cn,displayname'));

        # Conexion
        $this->connection = $this->_connect();
    }

    public function auth($username, $password)
    {
        $resultado = $this->_bind($username, $password);

        return $resultado;
    }

    public function searchByUsername($username)
    {
        # Filtro
        $filter = "(sAMAccountName=$username)";

        $resultado = $this->_search($filter);

        return $resultado;
    }

    protected function _generateArray($items)
    {
        $arrItems = [];

        $entry = ldap_first_entry($this->connection, $items);

        if (!$entry)
            return $arrItems;

        do {
            $attrs = ldap_get_attributes($this->connection, $entry);
            $items = [];

            foreach ($this->attributes as $attr)
            {
                $items[$attr] = (array_search($attr, $attrs) != false) ? $attrs[$attr][0] : null;
            }

            array_push($arrItems, $items);

        } while ($entry = ldap_next_entry($this->connection, $entry));

        return $arrItems;
    }

    protected function _search($filter)
    {
        # Login con credenciales de admin
        $this->_bind($this->user, $this->pass);

        $resultado = ldap_search($this->connection, $this->dn, $filter);

        return $this->_generateArray($resultado);
    }

    protected function _connect()
    {
        $cnn = @ldap_connect($this->host, $this->port);
        ldap_set_option($cnn, LDAP_OPT_PROTOCOL_VERSION, $this->version);
        ldap_set_option($cnn, LDAP_OPT_REFERRALS, 0);

        return $cnn;
    }

    protected function _bind($username, $password)
    {
        if (!$this->anonimo)
        {
            if (trim($username) == '' || trim($password) == '')
                return false;
        }

        $user = $username . '@' . $this->domain;
        $resultado = @ldap_bind($this->connection, $user, $password);

        return $resultado;
    }
}

?>