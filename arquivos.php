<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficheiros Partilhados</title>
    <style>

        @media screen and (min-width: 100px) and (max-width: 900px){
                div#descricao span a{
                    font-size: 9pt;
            }            
        }
        div#descricao{
            display: flex;
            justify-content: space-between;
        }

        span#tam{
            position: absolute;
            left: 600px;
        }

        span#dataModif{
            position: absolute;
            left: 735px;
        }
        


    </style>
</head>
<body>


    <?php 
        $dir = "uploads/";
        $c = 0;

        //verificar se é um diretorio com is_dir()
        if (is_dir($dir)){
            
            // pegar os arquivos do diretorio com a função scandir()
            $ficheiros = scandir($dir);
            //Remover os itens "." e ".." que são as raiz, com a função array_diff
            $ficheiros = array_diff($ficheiros, [".", ".."]);
     
            foreach ($ficheiros as $ficheiro) {
                //Pegar o diretorio completo do ficheiro
                $dirFicheiro = "$dir/$ficheiro";

                if (is_file($dirFicheiro)) {
                    $c += 1;
                    //tamanho em bytes
                    $tamFile = filesize($dirFicheiro);
                    //tamanho para MB
                    $tamFile = round($tamFile / (1024 * 1024), 2);
                    //data de modificação
                    $dataModif = date("d/m/y H:i:s", filemtime($dirFicheiro));
    ?>              
                    <!--imprimir os aquivos na pagina-->
                    <div id="descricao">
                        <span><a href="<?=$dirFicheiro?>" rel="noopener noreferrer"><?="$c - ".$ficheiro?></a></span>
                        <span id="tam"><?=$tamFile?>MB</span>
                        <span id="dataModif"><?=$dataModif?></span><br><br>
                       
                    </div>
    <?php 
                }

            }
           
        }
    ?>
    
    
</body>
</html>