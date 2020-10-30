<?php
require_once '../admin/conexion/Conexion.php';
class Usuario
{
    private static $instancia;
    private $con;
    private $idclientes;
    private $email;
    private $contrasena_cliente;
   

    public function __construct()
    {
        $this->con = Conexion::singleton_conexion();
    }

    public function set_user($id, $email, $contrasena_cliente)
    {
        $this->idclientes = $id;
        $this->email = $email;
        $this->$contrasena_cliente = $contrasena_cliente;
       
    }

    public function login_user($email, $contrasena_cliente)
    {
        try {
            $sql = "SELECT * FROM  clientes
             INNER JOIN usuarios on usuarios.idusuarios=clientes.idusuarios_admin
             WHERE email_cliente = ? AND contrasena_cliente = ? ";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $email);
            $consulta->bindParam(2, $contrasena_cliente);
            $consulta->execute();

            if ($consulta->rowCount() == 1) {
                $fila = $consulta->fetch();
                $_SESSION['idclientes'] = $fila['idclientes'];
                $_SESSION['email_cliente'] = $fila['email_cliente'];
                $_SESSION['idusuarios_admin'] = $fila['idusuarios_admin'];
                $_SESSION['telefono_admin'] = $fila['telefono_admin'];              

                return true;
            } else {
                return false;

            }
        } catch (PDOException $e) {
            print "Error:" . $e->getMessage();
        }
    }
    
    public function get_email($email)
    {
        try {
            $sql = "SELECT * FROM  usuarios where email=? ";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $email);
            $consulta->execute();

            if ($consulta->rowCount() == 1) {
                return $consulta;
            } else {
                return $consulta;
            }
        } catch (PDOException $e) {
            print "Error:" . $e->getMessage();
        }
    }

    public function get_user_count()
    {
        try
        {
            $sql = "SELECT email_cliente,municipio,razon_social,email,
                   CASE
                   WHEN email ='checuan@hotmail.com ' 
                    THEN 'https://ceramicachecuan.com/wp-content/uploads/2017/03/cropped-cropped-logochecuan.jpg'
                    ELSE 'https://chrisxel.com/wp-content/uploads/2019/03/logodos.png.webp'
                    END as img
                    FROM clientes C inner join usuarios U on U.idusuarios=C.idusuarios_admin
                    order by rand() LIMIT 1 ";
           
            $consulta = $this->con->prepare($sql);
        //    if ($id != null) {
            //    $consulta->bindParam(1, $id);}
            $consulta->execute();
            $this->con = null;
            if ($consulta->rowCount() > 0) {
                return $consulta;
            } else {
                return $consulta;
            } /*fin else*/
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }

}
