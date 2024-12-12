<?php

class Turno
{
    private $id;
    private $id_usuario;
    private $fecha_turno;
    private $creacion;

    /**
     * Devuelve el listado de turnos completo
     * 
     * @return Turno[] Un array de objetos Turno
     */
    public static function listado_de_turnos(): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT t.*, u.*
                  FROM turnos AS t INNER JOIN usuarios u
                  ORDER BY fecha_turno ASC";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $lista_turnos = $PDOStatement->fetchAll();

        return $lista_turnos;
    }

    /**
     * Inserta una nuevo turno en la BD
     */
    public static function insert(int $id_usuario, string $fecha_turno, string $creacion)
    {
        $conexion = Conexion::getConexion();

        $query = "INSERT INTO turnos (id, id_usuario, fecha_turno, creacion) 
              VALUES (NULL, :id_usuario, :fecha_turno, :creacion)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'id_usuario' => $id_usuario,
            'fecha_turno' => $fecha_turno,
            'creacion' => $creacion,
        ]);
    }

    public static function comprobarTurno($fecha_turno){
        $conexion = Conexion::getConexion();

        $query = "SELECT COUNT(*) FROM turnos WHERE fecha_turno = :fecha_turno";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->bindParam(':fecha_turno', $fecha_turno);
        $PDOStatement->execute();
        $resultado = $PDOStatement->fetchColumn();

        return $resultado > 0;
}


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of fecha_turno
     */ 
    public function getFecha_turno()
    {
        return $this->fecha_turno;
    }

    /**
     * Set the value of fecha_turno
     *
     * @return  self
     */ 
    public function setFecha_turno($fecha_turno)
    {
        $this->fecha_turno = $fecha_turno;

        return $this;
    }

    /**
     * Get the value of creacion
     */ 
    public function getCreacion()
    {
        return $this->creacion;
    }

    /**
     * Set the value of creacion
     *
     * @return  self
     */ 
    public function setCreacion($creacion)
    {
        $this->creacion = $creacion;

        return $this;
    }

    /**
     * Get the value of id_usuario
     */ 
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    /**
     * Set the value of id_usuario
     *
     * @return  self
     */ 
    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }
}

?>