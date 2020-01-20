<?php
    
    //including the file dboperation
    require_once '../includes/DbOperation.php';
    
    //creating a response array to store data
    $response = array();
    
    //creating a key in the response array to insert values
    //this key will store an array iteself
    $response['joueurs'] = array();
    
    //creating object of class DbOperation
    $db = new DbOperation();
    
    //getting the teams using the function we created
    $joueurs = $db->getAllJoueurs();
    
    //looping through all the teams.
    while($joueur = $joueurs->fetch_assoc()){
        //creating a temporary array
        $temp = array();
        
        //inserting the team in the temporary array
        $temp['Id'] = $joueur['Id'];
        $temp['NomJoueur']=$joueur['NomJoueur'];
        
        //inserting the temporary array inside response
        array_push($response['joueurs'],$temp);
    }
    
    //displaying the array in json format
    echo json_encode($response);
