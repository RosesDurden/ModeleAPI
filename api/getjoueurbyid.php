// <?php
    
    //including the file dboperation
    require_once '../includes/DbOperation.php';
    
    //creating a response array to store data
    $response = array();
    
    //creating a key in the response array to insert values
    //this key will store an array iteself
    //$response['joueurs'] = array();
    
    //creating object of class DbOperation
    $db = new DbOperation();
    
    //getting the teams using the function we created
    $joueurs = $db->getJoueurById();
    
    //looping through all the teams.
    while($joueur = $joueurs->fetch_assoc()){
        //creating a temporary array
        $temp = array();
        
        //inserting the team in the temporary array
        $temp['Id'] = $joueur['Id'];
        $temp['NomJoueur']=utf8_encode($joueur['NomJoueur']);
        $temp['NbChampion']=$joueur['NbChampion'];
        $temp['Informations']= utf8_encode($joueur['Informations']);
        $temp['RecompensesIndividuelles']=utf8_encode($joueur['RecompensesIndividuelles']);
        $temp['PerfsIndividuelles']=utf8_encode($joueur['PerfsIndividuelles']);
        $temp['FaitsMarquants']=utf8_encode($joueur['FaitsMarquants']);
        $temp['Photo1']=$joueur['Photo1'];
        $temp['Photo2']=$joueur['Photo2'];
        $temp['Photo3']=$joueur['Photo3'];
        $temp['LienVideo']=$joueur['LienVideo'];
        
        //inserting the temporary array inside response
        array_push($response,$temp);

    }
    //displaying the array in json format
    echo json_encode($response,JSON_UNESCAPED_UNICODE);

