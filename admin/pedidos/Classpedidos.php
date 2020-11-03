<?php
require_once '../conexion/Conexion.php';
class Classpedidos
{
    private static $instancia;
    private $con;
    private $idpedidos;
    private $fecha;
    private $total;
    private $ididcliente;
    private $status;
    private $iva;
    private $modulo;
    private $counter;
    private $sucursal;

    private $rfc;
    private $nombrecliente;
    private $email_cliente;
  
    /************************************/
    private $iddetalle_pedidos;
    private $idarticulo;
    private $cantidad;
    private $subtotal;
    private $costouni;
    private $idpedido;
    private $comentario;

    /************************************/
    private $idpagos;
    private $fecha_pago;
    private $importe_pago;
    private $id_pedido;

    /***********************************/

    private $id_articulo;
    private $id_almacen;
    private $cantidad_r;
    private $idinventario;

    public function __construct()
    {
        $this->con = Conexion::singleton_conexion();
    }

    public function set_pago($idpagos, $fecha_pago, $importe_pago, $id_pedido)
    {
        $this->idpagos = $idpagos;
        $this->fecha_pago = $fecha_pago;
        $this->importe_pago = $importe_pago;
        $this->id_pedido = $id_pedido;
    }

    public function add_pago()
    {
        try {

            $sql = "INSERT INTO pagos VALUES(0,?,?,?)";

            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1, $this->fecha_pago);
            $consulta->bindparam(2, $this->importe_pago);
            $consulta->bindparam(3, $this->id_pedido);

            if ($this->idpagos != null) {
                $consulta->bindparam(4, $this->idpagos);
            }
            $consulta->execute();
            return $sql;
            $this->con = null;

        } catch (PDOEception $ex) {
            print "Error:" . $e->getMessage();
        }
    }

   
    public function set_pedidos($id, $fecha, $total, $idcliente, $status, $iva, $modulo, $counter, $sucursal,$rfc,$nombrecliente,$email_cliente)
    {
        $this->idpedidos = $id;
        $this->fecha = $fecha;
        $this->total = $total;
        $this->idcliente = $idcliente;
        $this->status = $status;
        $this->iva = $iva;
        $this->modulo = $modulo;
        $this->counter = $counter;
        $this->sucursal = $sucursal;

        $this->rfc = $rfc;
        $this->nombrecliente = $nombrecliente;
        $this->email_cliente = $email_cliente;

    }

    public function add_pedidos()
    {
        try {

            $sql = "INSERT INTO pedidos VALUES(0,?,?,?,?,?,?,?,?,?,?,?)";

            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1, $this->fecha);
            $consulta->bindparam(2, $this->total);
            $consulta->bindparam(3, $this->idcliente);
            $consulta->bindparam(4, $this->status);
            $consulta->bindparam(5, $this->iva);
            $consulta->bindparam(6, $this->modulo);
            $consulta->bindparam(7, $this->counter);
            $consulta->bindparam(8, $this->sucursal);
            $consulta->bindparam(9, $this->rfc);
            $consulta->bindparam(10, $this->nombrecliente);
            $consulta->bindparam(11, $this->email_cliente);

            if ($this->idpedidos != null) {
                $consulta->bindparam(12, $this->idpedidos);
            }
            $consulta->execute();
            return $sql;
            $this->con = null;

        } catch (PDOEception $ex) {
            print "Error:" . $e->getMessage();
        }
    }

    public function get_pedido($idcliente)
    {
        try
        {
            $sql = "SELECT max(idpedidos) as id FROM pedidos where idcliente =?  ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idcliente);
            $consulta->execute();

            if ($consulta->rowCount() > 0) {
                return $consulta;
            } else {
                return $consulta;
            } //fin else
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }

    public function get_pedido_cunter($idcliente, $modulo)
    {
        try
        {
            $sql = "SELECT count(*) as num FROM pedidos where idcliente =? and modulo= ? ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idcliente);
            $consulta->bindParam(2, $modulo);
            $consulta->execute();

            if ($consulta->rowCount() > 0) {
                return $consulta;
            } else {
                return $consulta;
            } //fin else
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }

    public function get_listapedidos_pedidos($idcliente)
    {
        try
        {
            $sql = "SELECT * FROM pedidos WHERE idcliente =?  and modulo='PD' order by idpedidos desc";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idcliente);

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

    public function get_listapedidos_fecha_pedidos($idcliente, $date1, $date2)
    {
        try
        {
            $sql = "SELECT * FROM pedidos WHERE idcliente =? and fecha between ? and ? and modulo='PD' order by idpedidos desc";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idcliente);
            $consulta->bindParam(2, $date1);
            $consulta->bindParam(3, $date2);

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

    public function get_listapedidos($idcliente)
    {
        try
        {
            $sql = "SELECT * FROM pedidos WHERE idcliente =?  and modulo='V' order by idpedidos desc";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idcliente);

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

    public function get_listapedidos_fecha($idcliente, $date1, $date2)
    {
        try
        {
            $sql = "SELECT * FROM pedidos WHERE idcliente =? and fecha between ? and ? and modulo='V' order by idpedidos desc";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idcliente);
            $consulta->bindParam(2, $date1);
            $consulta->bindParam(3, $date2);

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

    public function get_listapedidos_entrada($idcliente)
    {
        try
        {
            $sql = "SELECT * FROM pedidos WHERE idcliente =?  and modulo='IN'and status='R' order by idpedidos desc";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idcliente);

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

    public function get_listapedidos_fecha_entrada($idcliente, $date1, $date2)
    {
        try
        {
            $sql = "SELECT * FROM pedidos WHERE idcliente =? and fecha between ? and ? and modulo='IN' and status='R' order by idpedidos desc";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idcliente);
            $consulta->bindParam(2, $date1);
            $consulta->bindParam(3, $date2);

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

    public function get_listapedidos_salida($idcliente)
    {
        try
        {
            $sql = "SELECT * FROM pedidos WHERE idcliente =?  and modulo='IN' and status='S' order by idpedidos desc";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idcliente);

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

    public function get_listapedidos_fecha_salida($idcliente, $date1, $date2)
    {
        try
        {
            $sql = "SELECT * FROM pedidos WHERE idcliente =? and fecha between ? and ? and modulo='IN' and status='S' order by idpedidos desc";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idcliente);
            $consulta->bindParam(2, $date1);
            $consulta->bindParam(3, $date2);

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
/*
    public function get_listapedidos_completados($idcliente)
    {
        try
        {
            $sql = "SELECT * FROM pedidos WHERE idcliente =? and status='RC' order by idpedidos DESC";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idcliente);

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
    }*/

    public function get_detalle_pedido($idpedido)
    {
        try
        {
            $sql = "SELECT * FROM detalle_pedidos inner join articulos on articulos.idarticulos=detalle_pedidos.idarticulo
            WHERE idpedido =? ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idpedido);

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

    public function get_listapedidos_print($idcliente, $idpedidos)
    {
        try
        {
            $sql = "SELECT *,P.email_cliente as email FROM pedidos P INNER JOIN clientes C on C.idclientes=P.idcliente
                    WHERE idcliente = ? and idpedidos= ? ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idcliente);
            $consulta->bindParam(2, $idpedidos);

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

    public function get_print($id)
    {
        try
        {
            $sql = " select * FROM detalle
                    join productos on productos.idproductos=detalle.productos_idproductos
                    where pedidos_idpedidos = ? ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $id);

            $consulta->execute();

            if ($consulta->rowCount() == 1) {

                return $consulta;

            } else {
                return $consulta;
            }
        } catch (PDOExeption $e) {
            print "Error: " . $e->getMessage();
        }
    }
    /*
    public function del_v($id)
    {
        try {
            $sql = "DELETE FROM pedidos WHERE idpedidos = ?";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $id);
            $consulta->execute();
            $this->con = null;
        } catch (PDOException $e) {
            print "Error: " . $e->getMessage();
        }
    }
    public function del_detalle($id)
    {
        try {
            $sql = "DELETE FROM detalle WHERE pedidos_idpedidos = ?";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $id);
            $consulta->execute();
            $this->con = null;
        } catch (PDOException $e) {
            print "Error: " . $e->getMessage();
        }
    }*/

    /*********************************DESTALLE PEDIDOS********************************/
    public function set_detalle_pedidos($id, $idarticulo, $cantidad, $subtotal, $costouni, $idpedido, $comentario)
    {
        $this->iddetalle_pedidos = $id;
        $this->idarticulo = $idarticulo;
        $this->cantidad = $cantidad;
        $this->subtotal = $subtotal;
        $this->costouni = $costouni;
        $this->idpedido = $idpedido;
        $this->comentario = $comentario;

    }

    public function add_detalle_pedidos()
    {
        try {

            $sql = "INSERT INTO detalle_pedidos VALUES(0,?,?,?,?,?,?)";

            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1, $this->idarticulo);
            $consulta->bindparam(2, $this->cantidad);
            $consulta->bindparam(3, $this->subtotal);
            $consulta->bindparam(4, $this->costouni);
            $consulta->bindparam(5, $this->idpedido);
            $consulta->bindparam(6, $this->comentario);

            if ($this->iddetalle_pedidos != null) {
                $consulta->bindparam(7, $this->iddetalle_pedidos);
            }
            $consulta->execute();
            return $sql;
            $this->con = null;

        } catch (PDOEception $ex) {
            print "Error:" . $e->getMessage();
        }
    }

////////////////////////////CIERRE DESTALLE PEDIDOS/////////////////////////////////

/////////////////FUNCION DONDE MUESTRA LOS PEDIDOS A USUARIO ADMINISTRADOR ///////////
    public function get_listapedidos_admin($idadmin)
    {
        try
        {
            $sql = "SELECT * FROM pedidos INNER JOIN clientes on clientes.idclientes=pedidos.idcliente
                WHERE idusuarios_admin =? and status<>'RC' order by idpedidos desc";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idadmin);

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

    public function get_listapedidos_admin_complatados($idadmin)
    {
        try
        {
            $sql = "SELECT * FROM pedidos INNER JOIN clientes on clientes.idclientes=pedidos.idcliente
                WHERE idusuarios_admin =? and status='RC' ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idadmin);

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
/////////////FUNCION DONDE MUESTRA LOS PEDIDOS A USUARIO ADMINISTRADOR IMPRIMIR/////////////

    public function get_listapedidos_admin_id($idadmin, $idpedidos)
    {
        try
        {
            $sql = "SELECT * FROM pedidos INNER JOIN clientes on clientes.idclientes=pedidos.idcliente
                 WHERE idusuarios_admin =? and idpedidos=? ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idadmin);
            $consulta->bindParam(2, $idpedidos);
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

//////////////ACTUALIZA EL ESTATUS DEL PEDIDO//////////////////////////////////////

    public function set_pedidos_update_status($id, $status)
    {
        $this->idpedidos = $id;
        $this->status = $status;

    }

    public function add_pedidos_update_status()
    {
        try {
            if ($this->idpedidos != null) {

                $sql = "UPDATE  pedidos"
                    . " SET status = ?"
                    . " WHERE idpedidos =?";
            }

            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1, $this->status);

            if ($this->idpedidos != null) {
                $consulta->bindparam(2, $this->idpedidos);
            }
            $consulta->execute();
            return $sql;
            $this->con = null;

        } catch (PDOEception $ex) {
            print "Error:" . $e->getMessage();
        }
    }

    public function del_pedidos($id)
    {
        try {
            $sql = "DELETE FROM pedidos WHERE idpedidos = ?";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $id);
            $consulta->execute();
            $this->con = null;
        } catch (PDOException $e) {
            print "Error: " . $e->getMessage();
        }
    }

////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////// CAMBIO DE ACTICULOS////////////////////////////////////
    private $pedido_id;

    public function set_pedidos_update_status_cambio($id, $iddetalle, $status)
    {
        $this->pedido_id = $id;
        $this->iddetalle = $iddetalle;
        $this->status = $status;

    }
    public function add_pedidos_update_cambio()
    {
        try {
            if ($this->pedido_id != null) {

                $sql = "UPDATE cambios"
                    . " SET iddetalle = ?,"
                    . " status  = ?"
                    . " WHERE pedido_id =?";
            }

            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1, $this->iddetalle);
            $consulta->bindparam(2, $this->status);

            if ($this->pedido_id != null) {
                $consulta->bindparam(3, $this->pedido_id);
            }
            $consulta->execute();
            return $sql;
            $this->con = null;

        } catch (PDOEception $ex) {
            print "Error:" . $e->getMessage();
        }
    }

    public function get_cambio_nuevo_pedido($iddetalle)
    {
        try
        {
            $sql = "SELECT * FROM cambios
            inner join pedidos
            on pedidos.idpedidos=cambios.pedido_id
            inner join articulos
            on articulos.idarticulos=cambios.articulo_id WHERE iddetalle =? ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $iddetalle);

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

    public function get_numerodepedidos_admin($idadmin)
    {
        try
        {
            $sql = " SELECT COUNT(*)as cantidad FROM pedidos
                     INNER JOIN clientes on clientes.idclientes=pedidos.idcliente
                     INNER JOIN usuarios on usuarios.idusuarios=clientes.idusuarios_admin
                     WHERE usuarios.idusuarios = ?";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idadmin);

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
///////////////////////////////PAGOS//////////////////////////////////////////////////////////////
    public function get_pagos($idpedido)
    {
        try
        {
            $sql = "SELECT * FROM pagos WHERE id_pedido =?";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idpedido);
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

    //METODOS QUE VALIDAN EXISTENCIA DE INVENTARIO Y LO ACTUALIZAN SI NO LO CREAN

    public function valida_existencia($idarticulo, $idalmacen)
    {
        try
        {
            $sql = "SELECT * FROM inventario  WHERE id_articulo =? and id_almacen= ?";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idarticulo);
            $consulta->bindParam(2, $idalmacen);
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

    public function set_recepcion($idinventario, $id_articulo, $id_almacen, $cantidad_r, $idcliente)
    {
        $this->idinventario = $idinventario;
        $this->id_articulo = $id_articulo;
        $this->id_almacen = $id_almacen;
        $this->cantidad = $cantidad_r;
        $this->id_cliente = $idcliente;
    }

    public function insert_recepcion()
    {
        try {
            if ($this->idinventario == null) {
                $sql = "INSERT INTO inventario VALUES(0,?,?,?,?)";
            } else {

                // $sql = "UPDATE inventario SET cantidad= cantidad + ? WHERE id_articulo =? and id_almacen= ?";

                $sql = "UPDATE  inventario"
                    . " SET id_articulo = ?,"
                    . " id_almacen = ?,"
                    . " cantidad = cantidad + ? ,"
                    . " id_cliente = ? "
                    . " WHERE idinventario = ? ";
            }
            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1, $this->id_articulo);
            $consulta->bindparam(2, $this->id_almacen);
            $consulta->bindparam(3, $this->cantidad);
            $consulta->bindparam(4, $this->id_cliente);

            if ($this->idinventario != null) {
                $consulta->bindparam(5, $this->idinventario);
            }
            $consulta->execute();
            return $sql;
            $this->con = null;

        } catch (PDOEception $ex) {
            print "Error:" . $e->getMessage();
        }
    }
    ///////////////////////////////////////////////////////////////////////////////////////////

    public function set_menos_venta($cantidad_r, $idcliente, $id_articulo)
    {
        $this->cantidad = $cantidad_r;
        $this->id_cliente = $idcliente;
        $this->id_articulo = $id_articulo;
    }

    public function insert_menos_venta()
    {
        try {

            $sql = "UPDATE  inventario SET  cantidad = cantidad - ?  WHERE id_cliente = ? and id_articulo = ? ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1, $this->cantidad);
            $consulta->bindparam(2, $this->id_cliente);
            $consulta->bindparam(3, $this->id_articulo);

            $consulta->execute();
            return $sql;
            $this->con = null;

        } catch (PDOEception $ex) {
            print "Error:" . $e->getMessage();
        }
    }

} //fin de la clase
