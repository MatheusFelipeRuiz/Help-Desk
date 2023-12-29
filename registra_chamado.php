<pre>
    <?php
        session_start();
        $titulo = $_POST['titulo'];
        $categoria = $_POST['categoria'];
        $descricao = $_POST['descricao'];
        $idUsuario = $_SESSION['id_usuario'];

        $diretorio = 'chamados';
        $conteudoArquivo = 'chamado.txt';
        $caminhoArquivoLeitura  = $diretorio . '/' . $conteudoArquivo;

        
        if(!file_exists($diretorio)){
            mkdir($diretorio);
            $caminhoAbsoluto = $diretorio . '/' . $conteudoArquivo;
            $arquivo = fopen($caminhoAbsoluto, 'a');
            
            $objeto = array('idusuario' => "$idUsuario",'titulo' => "$titulo", 'categoria' => "$categoria", 'descricao' => "$descricao");
            $JSON = json_encode($objeto) . PHP_EOL;
            
            fwrite($arquivo,$JSON);
            fclose($arquivo);    
        }else {
            $caminhoAbsoluto = $diretorio . '/' . $conteudoArquivo;
            $arquivo = fopen($caminhoAbsoluto, 'a');
            
            $objeto = array('idusuario' => "$idUsuario",'titulo' => "$titulo", 'categoria' => "$categoria", 'descricao' => "$descricao");
            $JSON = json_encode($objeto) . PHP_EOL;

            fwrite($arquivo,$JSON);
            fclose($arquivo);
        }

        header('Location: consultar_chamado.php');
        
    ?>
</pre>