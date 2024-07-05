<?php

namespace App;

class Rotas {
    
    public static $pag;
    
    /**
     * Trata pagina e parametros da URL
     */
   public static function get_Pagina() {

        /**
         * Verifico se passou o parametros url
         */
        if (isset($_GET['pag'])):

            $pagina = $_GET['pag'];
            self::$pag = explode('/', $pagina);
            $barra = DIRECTORY_SEPARATOR;
            $pagina = 'Views'.$barra.self::$pag[0].'.php';

               //verifico se existe pagina com nome passado na url
            if (file_exists($pagina)):
                include $pagina;
            //echo "<br>".$pagina;
            else:
                include 'erro.php';
                exit;
            endif;
            
            else:
              // Redireciona para a página de login se não houver parâmetro
            header('Location: /SGL/login');
            exit;   
        endif;
    }

}
