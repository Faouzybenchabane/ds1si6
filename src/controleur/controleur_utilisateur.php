<?php
function actionUtilisateur($twig, $db){
    $form = array(); 
    $utilisateur = new Utilisateur($db);
    $liste = $utilisateur->select();
    echo $twig->render('Utilisateur.html.twig', array('form'=>$form,'liste'=>$liste));
}

function actionModifUtilisateur($twig, $db){
 $form = array();
 if(isset($_GET['email'])){
 $utilisateur = new Utilisateur($db);
 $unUtilisateur = $utilisateur->selectByEmail($_GET['email']);
 if ($unUtilisateur!=null){
 $form['utilisateur'] = $unUtilisateur;
 $role = new Role($db);
 $liste = $role->select();
 $form['roles']=$liste;
 }
 else{
 $form['message'] = 'Utilisateur incorrect';
 }
 }
 else{
 $form['message'] = 'Utilisateur non précisé';
 }
 echo $twig->render('utilisateur-modif.html.twig', array('form'=>$form));

}


?>