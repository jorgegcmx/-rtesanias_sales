<?php
require_once '../conexion/Conexion.php';
class Classe
{
    private static $instancia;
    private $con;
    private $idarticulos;
    private $codigo;
    private $nombre;
    private $precio_mayoreo;
    private $precio_menudeo;
    private $idcategoria;
    private $img;
    private $descripcion;
    private $idusuarios;

    public function __construct()
    {
        $this->con = Conexion::singleton_conexion();
    }

    public function set_articulo($id, $codigo, $nombre, $precio_mayoreo, $precio_menudeo, $idcategoria, $img, $descripcion, $idusuarios)
    {
        $this->idarticulos = $id;
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->precio_mayoreo = $precio_mayoreo;
        $this->precio_menudeo = $precio_menudeo;
        $this->idcategoria = $idcategoria;
        $this->img = $img;
        $this->descripcion = $descripcion;
        $this->idusuarios = $idusuarios;

    }

    public function get_articulo($idusuarios)
    {
        try
        {
            $sql = "SELECT A.nombre as nombrearticulo,A.*,C.*
                    FROM articulos A
                    LEFT JOIN categorias C on A.idcategoria=C.idcategorias
                    WHERE A.idusuarios = ? order by A.idcategoria ";

            $consulta = $this->con->prepare($sql);
            if ($idusuarios != null) {
                $consulta->bindParam(1, $idusuarios);
            }
            $consulta->execute();
            $this->con = null;

            if ($consulta->rowCount() > 0) {
                return $consulta;
            } else {
                return $consulta;
            } //fin else
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }

    public function get_articulo_categoria($idusuarios,$idcat)
    {
        try
        {
            $sql = "SELECT A.nombre as nombrearticulo,A.*,C.*
                    FROM articulos A
                    LEFT JOIN categorias C on A.idcategoria=C.idcategorias
                    WHERE A.idusuarios = ? and A.idcategoria = ?  order by A.idcategoria ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idusuarios);
            $consulta->bindParam(2, $idcat);
            
            $consulta->execute();
            $this->con = null;

            if ($consulta->rowCount() > 0) {
                return $consulta;
            } else {
                return $consulta;
            } //fin else
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }

    public function get_stock($idcliente, $idarticulos)
    {
        try
        {
            $sql = "SELECT * FROM inventario WHERE id_cliente = ? AND id_articulo = ? ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idcliente);
            $consulta->bindParam(2, $idarticulos);

            $consulta->execute();
            $this->con = null;

            if ($consulta->rowCount() > 0) {
                return $consulta;
            } else {
                return $consulta;
            } //fin else
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }

    public function get_articulo_filtro($idusuarios, $nombre)
    {
        try
        {
            $sql = "SELECT A.nombre as nombrearticulo,A.*,C.*
                    FROM articulos A join categorias C on A.idcategoria=C.idcategorias
                    WHERE A.idusuarios = ? AND A.nombre like '%$nombre%' AND img<>''
                    ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idusuarios);
            //$consulta->bindParam(2, $nombre);

            $consulta->execute();
            $this->con = null;

            if ($consulta->rowCount() > 0) {
                return $consulta;
            } else {
                return $consulta;
            } //fin else
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }

    public function get_categorias_filtro($idusuarios, $idcategoria)
    {
        try
        {
            $sql = "SELECT A.nombre as nombrearticulo,A.*,C.*
                    FROM articulos A join categorias C on A.idcategoria=C.idcategorias
                    WHERE A.idusuarios = ? AND C.idcategorias = ?
                    ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idusuarios);
            $consulta->bindParam(2, $idcategoria);

            $consulta->execute();
            $this->con = null;

            if ($consulta->rowCount() > 0) {
                return $consulta;
            } else {
                return $consulta;
            } //fin else
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }

    public function add_articulo()
    {
        try {
            if ($this->idarticulos == null) {

                $sql = "INSERT INTO articulos VALUES(0,?,?,?,?,?,?,?,?)";

            } else {
                $sql = "UPDATE  articulos"
                    . " SET codigo = ?,"
                    . " nombre = ?,"
                    . " precio_mayoreo = ?,"
                    . " precio_menudeo = ?,"
                    . " idcategoria = ?,"
                    . " img = ?,"
                    . " descripcion= ?,"
                    . " idusuarios= ?"
                    . " WHERE idarticulos =?";
            }

            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1, $this->codigo);
            $consulta->bindparam(2, $this->nombre);
            $consulta->bindparam(3, $this->precio_mayoreo);
            $consulta->bindparam(4, $this->precio_menudeo);
            $consulta->bindparam(5, $this->idcategoria);
            $consulta->bindparam(6, $this->img);
            $consulta->bindparam(7, $this->descripcion);
            $consulta->bindparam(8, $this->idusuarios);

            if ($this->idarticulos != null) {
                $consulta->bindparam(9, $this->idarticulos);
            }
            $consulta->execute();
            return $sql;
            $this->con = null;

        } catch (PDOEception $ex) {
            print "Error:" . $e->getMessage();
        }
    }

    public function del_articulo($id)
    {
        try {
            $sql = "DELETE FROM articulos WHERE idarticulos = ?";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $id);
            $consulta->execute();
            $this->con = null;
        } catch (PDOException $e) {
            print "Error: " . $e->getMessage();
        }
    }

    public function get_categorias($idusuarios)
    {
        try
        {
            $sql = "SELECT * FROM categorias WHERE idusuarios=?";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idusuarios);

            $consulta->execute();

            if ($consulta->rowCount() > 0) {
                return $consulta;
            } else {
                return $consulta;
            }
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }

    /*******************************************Funciones solo Chrisxel */
    public function get_articulo_codebar($codigo)
    {
        try
        {
            $sql = "SELECT * FROM articulos where concat_ws('', idarticulos, codigo) = ? ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $codigo);

            $consulta->execute();
            $this->con = null;

            if ($consulta->rowCount() > 0) {
                return $consulta;
            } else {
                return $consulta;
            } //fin else
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }

/*******************************************FIN*******************************************************/
    public function get_almacenes($idadmin)
    {
        try
        {
            $sql = "SELECT * FROM almacen";

            if ($idadmin != null) {
                $sql .= " WHERE id_cliente = ?";
            }

            $consulta = $this->con->prepare($sql);
            if ($idadmin != null) {
                $consulta->bindParam(1, $idadmin);
            }
            $consulta->execute();
            $this->con = null;

            if ($consulta->rowCount() > 0) {
                return $consulta;
            } else {
                return $consulta;
            }
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////
    public function get_clientes($idadmin)
    {
        try
        {
            $sql = "SELECT * FROM clientes";

            if ($idadmin != null) {
                $sql .= " WHERE idusuarios_admin = ? ";
            }

            $consulta = $this->con->prepare($sql);
            if ($idadmin != null) {
                $consulta->bindParam(1, $idadmin);
            }
            $consulta->execute();
            $this->con = null;

            if ($consulta->rowCount() > 0) {
                return $consulta;
            } else {
                return $consulta;
            }
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }

   

} //cierra clase
