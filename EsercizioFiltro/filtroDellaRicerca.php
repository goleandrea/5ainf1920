<?php
    
    $servername = "localhost";


    $username = "root"; 


    $password = "";
    $dbname = "dbpersone";

    
    $tblname = "persone";

    $searchName = $_REQUEST["txtNome"];

    $result = searchNameDatabase($servername, $username, $password, $dbname, $tblname, $searchName);

    

    loadTblFiltro($result);

    function searchNameDatabase($servername, $username, $password, $dbname, $tblDbName, $searchName){

       
        $con = new mysqli($servername, $username, $password, $dbname);

        

        if($con -> connect_error){
        
            die("connessione fallita: " . $con->connect_error);
        }

        $sql = "SELECT * FROM " . $tblDbName . " WHERE nome = \"" . $searchName . "\"";

        
        $result = $con->query($sql);

        
        if($result->num_rows > 0){
            return $result; 
            
          
            return $result;
        }

       
        $con->close();
    }

    function loadTblFiltro($result){
        if($result->num_rows > 0){
            echo "<!doctype html>
        <html>
            <head>
                <link href=\"vendor/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
                <link href=\"css/custom.css\" rel=\"stylesheet\">
                <!--    script utilizzati per componenti bootstrap e plug-in jquery   -->
                <script type=\"applicaton/javascript\" src=\"vendor/bootstrap/js/bootstrap.js\"></script>
                <script type=\"applicaton/javascript\" src=\"vendor/jquery/jquery-3.4.1.js\"></script>
            </head>
        
            <body>
                <div class=\"container-fluid\">
                    
                    <div class=\"row\">
                        <div class=\"col-sm-12\">    
                            
                            <table class=\"table table-hover\">";
                                while($row = $result->fetch_assoc()){
                                    //stampo ogni riga
                                    echo "
                                    <tr>
                                        <th>
                                            " . $row["nome"] . "
                                        </th>
                                        <th>
                                            " . $row["cognome"] . "
                                        </th>
                                    </tr>";
                                }
                                
                            echo "</table>
                        
                        
                        
                        </div>
                        
                    </div>

                    <div class=\"btn\">
                    <form name=\"formBack\" method=\"post\" action=\"readDB.php\">
                        <div class=\"form-group input-group\">
                            <input type=\"submit\" name=\"btnTornaInDietro\" class=\"form-control\" value=\"torna in dietro\">
                        </div>
                    </form>
                </div>
                </div>
        
            </body>
        
        </html>";
        }else{
            echo "<!doctype html>
        <html>
            <head>
                <link href=\"vendor/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
                <link href=\"css/custom.css\" rel=\"stylesheet\">
                <!--    script utilizzati per componenti bootstrap e plug-in jquery   -->
                <script type=\"applicaton/javascript\" src=\"vendor/bootstrap/js/bootstrap.js\"></script>
                <script type=\"applicaton/javascript\" src=\"vendor/jquery/jquery-3.4.1.js\"></script>
            </head>
        
            <body>
                <div class=\"container-fluid\">
                    
                    
                    <div class=\"row\">
                        <div class=\"col-sm-12\">    
                            
                            <table class=\"table table-hover\">
                            </table>
                        
                        
                        
                        </div>
                        
                    </div>


                    <div class=\"btn\">
                        <form name=\"formBack\" method=\"post\" action=\"readDB.php\">
                            <div class=\"form-group input-group\">
                                <input type=\"submit\" name=\"btnTornaInDietro\" class=\"form-control\" value=\"torna in dietro\">
                            </div>
                        </form>
                    </div>


                </div>
        
            </body>
        
        </html>";
        }

    }



?>