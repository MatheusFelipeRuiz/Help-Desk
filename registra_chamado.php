<pre>
    <?php
        $titulo = $_POST['titulo'];
        $categoria = $_POST['categoria'];
        $descricao = $_POST['descricao'];

        $diretorio = 'chamados';
        $conteudoArquivo = 'chamado.txt';
        $caminhoArquivoLeitura  = $diretorio . '/' . $conteudoArquivo;

        
        if(!file_exists($diretorio)){
            mkdir($diretorio);
            $caminhoAbsoluto = $diretorio . '/' . $conteudoArquivo;
            $arquivo = fopen($caminhoAbsoluto, 'a');
            
            $objeto = array('titulo' => "$titulo", 'categoria' => "$categoria", 'descricao' => "$descricao");
            $JSON = json_encode($objeto) . PHP_EOL;
            
            fwrite($arquivo,$JSON);
            fclose($arquivo);    
        }else {
            $caminhoAbsoluto = $diretorio . '/' . $conteudoArquivo;
            $arquivo = fopen($caminhoAbsoluto, 'a');
            
            $objeto = array('titulo' => "$titulo", 'categoria' => "$categoria", 'descricao' => "$descricao");
            $JSON = json_encode($objeto) . PHP_EOL;

            fwrite($arquivo,$JSON);
            fclose($arquivo);
        }

        header('Location: consultar_chamado.php');
        
    ?>
</pre>