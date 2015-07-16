<?php
require_once('db_abstract_class.php');

class usuarios extends db_abstract_class{
	
	private $id;
	private $tipo_identificacion = "";
	private $identificacion;
	private $nombres;
	private $apellidos;
	private $telefono;
	private $direccion;
	private $fecha_nacimiento;
	private $saldo;
	private $user_login;
	private $pass_login;
	private $estado;

	/* Setters and Getters*/
    public function getId(){
        return $this->id;
    }
    
    private function _setId ($Id){
        $this->id = $Id;
        return $this;
    }

    public function getTipo_Identificacion(){
        return $this->tipo_identificacion;
    }
    
    private function _setTipo_Identificacion ($tipo_identificacion){
        $this->tipo_identificacion = $tipo_identificacion;
        return $this;
    }

    public function getIdentificacion(){
        return $this->identificacion;
    }
    
    private function _setIdentificacion ($identificacion){
        $this->identificacion = $identificacion;
        return $this;
    }

    public function getNombres(){
        return $this->nombres;
    }
    
    private function _setNombres ($nombres){
        $this->nombres = $nombres;
        return $this;
    }

    public function getApellidos(){
        return $this->apellidos;
    }
    
    private function _setApellidos($apellidos){
        $this->apellidos = $apellidos;
        return $this;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    private function _setTelefono($telefono){
        $this->telefono = $telefono;
        return $this;
    }

    public function getDireccion(){
        return $this->direccion;
    }
    
    private function _setDireccion($direccion){
        $this->direccion = $direccion;
        return $this;
    }

    public function getFechaNacimiento(){
        return $this->fecha_nacimiento;
    }
    
    private function _setFechaNacimiento($fecha_nacimiento){
        $this->fecha_nacimiento = $fecha_nacimiento;
        return $this;
    }

    public function getSaldo(){
        return $this->saldo;
    }
    
    private function _setSaldo($saldo){
        $this->saldo = $saldo;
        return $this;
    }

    public function getUserLogin(){
        return $this->user_login;
    }
    
    private function _setUserLogin($user_login){
        $this->user_login = $user_login;
        return $this;
    }

    public function getPassLogin(){
        return $this->pass_login;
    }
    
    private function _setPassLogin($pass_login){
        $this->pass_login = $pass_login;
        return $this;
    }

    public function getEstado(){
        return $this->estado;
    }

    private function _setEstado($estado){
        $this->estado = $estado;
        return $this;
    }

    function __destruct() {
        $this->Disconnect();
    }

	public function __construct($user_data=array()){
        parent::__construct();
		if(count($user_data)>1){
			foreach ($user_data as $campo=>$valor){
                $this->$campo = $valor;
			}
		}else {
			$this->tipo_identificacion = "";
			$this->identificacion = "";
			$this->nombres = "";
			$this->apellidos = "";
			$this->telefono = "";
			$this->direccion = "";
			$this->fecha_nacimiento = "";
			$this->saldo = "";
			$this->user_login = "";
			$this->pass_login = "";
			$this->estado = "";
		}
    }

    public function insertar(){
        $arrUser = (array) $this;
        $this->insertRow("INSERT INTO usuarios
            VALUES ('NULL', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array( 
                $this->tipo_identificacion,
                $this->identificacion,
                $this->nombres,
                $this->apellidos,
                $this->telefono,
                $this->direccion,
                $this->fecha_nacimiento,
                $this->saldo,
                $this->user_login,
                $this->pass_login,
                $this->estado,
            )
        );
		$this->Disconnect();
    }

    public function editar(){
		
        return $this->user_login;
    }

    public function eliminar(){
        return $this->user_login;
    }

    public static function buscarForId($id){
		if ($id > 0){
			$usr = new usuarios();
			$getrow = $usr->getRow("SELECT * FROM usuarios WHERE idUsuarios =?", array($id));
			$usr->id = $getrow['idUsuarios'];
			$usr->tipo_identificacion = $getrow['tipo_identificacion'];
			$usr->identificacion = $getrow['Identificacion'];
			$usr->nombres = $getrow['Nombres'];
			$usr->apellidos = $getrow['Apellidos'];
			$usr->telefono = $getrow['Telefono'];
			$usr->direccion = $getrow['Direccion'];
			$usr->fecha_nacimiento = $getrow['Fecha_Nacimiento'];
			$usr->saldo = $getrow['Saldo_Cuenta'];
			$usr->user_login = $getrow['user_login'];
			$usr->pass_login = $getrow['pass_login'];
			$usr->estado = $getrow['estado'];
			$usr->Disconnect();
			return $usr;
		}else{
			return NULL;
		}

    }
	
	 public function buscar(){

    }

}
?>