<?php
    
    $servername = "localhost";
    $username = "root";


    $password = "";
    $dbname = "dbpersone";


    $tblname = "persone";

    $result = readDatabase($servername, $username, $password, $dbname, $tblname);

    loadTblHTML($result);



    



    function loadTblHTML($result){
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
                    <div class=\"titleText\">
                        <form name=\"formAdd\" method=\"post\" action=\"addValue.php\">
                            <div class=\"form-group input-group\">
                                <input type=\"text\" name=\"txtNome\" class=\"form-control\" placeholder=\"Nome\">
                                <input type=\"text\" name=\"txtCognome\" class=\"form-control\" placeholder=\"Cognome\">
                                <input type=\"submit\" name=\"btnAdd\" class=\"form-control\" value=\"aggiungi\">
                            </div>
                        </form>
                    </div>
                    
                    <div class=\"row\">
                        <div class=\"col-sm-12\">    
                            
                            <table class=\"table table-hover\">";
                                while($row = $result->fetch_assoc()){




                                  
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

                    <div class=\"filtro\">
                    <form name=\"formAdd\" method=\"post\" action=\"filtroValue.php\">
                        <div class=\"form-group input-group\">
                            <input type=\"text\" name=\"txtNome\" class=\"form-control\" placeholder=\"Nome\">
                            <input type=\"submit\" name=\"btnFiltra\" class=\"form-control\" value=\"cerca\">
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
                    <div class=\"titleText\">
                        <form name=\"formAdd\" method=\"post\" action=\"addValue.php\">
                            <div class=\"form-group input-group\">
                                <input type=\"text\" name=\"txtNome\" class=\"form-control\" placeholder=\"Nome\">
                                <input type=\"text\" name=\"txtCognome\" class=\"form-control\" placeholder=\"Cognome\">
                                <input type=\"submit\" name=\"btnAdd\" class=\"form-control\" value=\"aggiungi\">
                            </div>
                        </form>
                    </div>
                    
                    <div class=\"row\">





                    
                        <div class=\"col-sm-12\">    
                            
                            <table class=\"table table-hover\">
                            </table>
                        
                        
                        
                        </div>
                        
                    </div>

                    <div class=\"filtro\">
                    <form name=\"formAdd\" method=\"post\" action=\"filtroValue.php\">
                        <div class=\"form-group input-group\">
                            <input type=\"text\" name=\"txtNome\" class=\"form-control\" placeholder=\"Nome\">
                            <input type=\"submit\" name=\"btnFiltra\" class=\"form-control\" value=\"cerca\">
                        </div>
                    </form>

                </div>
                </div>
        
            </body>
        
        </html>";
        }
        
    }








    function readDatabase($servername, $username, $password, $dbname, $tblDbName){

        $con = new mysqli($servername, $username, $password, $dbname);

       
        if($con -> connect_error){
            
            die("connessione fallita: " . $con->connect_error);
        }

        
        $sql = "SELECT * FROM " . $tblDbName;

        
        $result = $con->query($sql);

        
        if($result->num_rows > 0){
            return $result; 
          
        }else{
            
            return $result;
        }

        //chiudo la connessione
        $con->close();