<?php
class ConfiguracionModel extends Mysql{
    public $id, $facultad, $calle, $colonia, $cp, $ciudad;
    public function __construct()
    {
        parent::__construct();
    }

    //SELECCIONA TODOS LOS DATOS DE CONFIGURACIÓN
    public function selectConfiguracion()
    {
        $sql = "SELECT * FROM configuracion";
        $res = $this->select($sql);
        return $res;
    }

    //ACTUALIZA LOS DATOS DE CONFIGURACIÓN
    public function actualizarConfiguracion(String $facultad, string $calle, string $colonia, string $cp, string $ciudad ,int $id)
    {
        $return = "";
        $this->facultad = $facultad;
        $this->calle = $calle;
        $this->colonia = $colonia;
        $this->cp = $cp;
        $this->ciudad = $ciudad;
        $this->id = $id;
        $query = "UPDATE configuracion SET facultad=?, calle=?, colonia=?, cp=?, ciudad=? WHERE id=?";
        $data = array($this->facultad, $this->calle, $this->colonia, $this->cp, $this->ciudad ,$this->id);
        $resul = $this->update($query, $data);
        return $resul;
    }

    //ACTUALIZA LOS DATOS DE CONFIGURACIÓN FALTAS
    public function actualizarConfiguracionA(String $semestres, int $id)
    {
        $return = "";
        $this->semestres = $semestres;
        $this->id = $id;
        $query = "UPDATE configuracion SET semestres=? WHERE id=?";
        $data = array($this->semestres, $this->id);
        $resul = $this->update($query, $data);
        return $resul;
    }
    //elimina todos los semestres
    public function elsemestres()
    {
        $return = "";
        $query = "DELETE FROM configsemestre";
        $resul = $this->select($query);
        return $resul;
    }

    //Añade nuevos semestres
    public function addsemestre(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "INSERT INTO configsemestre(id) VALUES (?)";
        $data = array($this->id);
        $resul = $this->insert($query, $data);
        return $resul;
    }

    //ACTUALIZA LOS DATOS DE semestres
    public function actsemestre(String $aminimas, String $fmaximas, int $id)
    {
        $return = "";
        $this->aminimas = $aminimas;
        $this->fmaximas = $fmaximas;
        $this->id = $id;
        $query = "UPDATE configsemestre SET aminimas=?, fmaximas=? WHERE id=?";
        $data = array($this->aminimas, $this->fmaximas, $this->id);
        $resul = $this->update($query, $data);
        return $resul;
    }

    //SELECCIONA TODOS LOS DATOS DE CONFIGURACIÓN Act
    public function selectConfiguracionA()
    {
        $sql = "SELECT * FROM configsemestre";
        $res = $this->select_all($sql);
        return $res;
    }
}
?>

 